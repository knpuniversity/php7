# PHP7 High-level Project Outline

## Preconditions

I don't have MySQL on my host, so think would add the Homestead development environment as explained in http://www.ifdattic.com/how-to-start-using-laravel-homestead/

[[ WRITE README ]]

## Intro

* Tell that this tutorial is about PHP7
* Explain that it does not cover all the new features (just those that in our opinion would be most useful for most people). Suggest reading documentation for full coverage.
* Explain why it was jumped from PHP5 to PHP7
* Mention the performance improvements
* Explain that internal PHP errors were converted to exceptions. They can be caught through \Throwable interface.
    - Type out `play-exceptions-without-catch.php` file
    - Execute in terminal `php play-exceptions-without-catch.php`
    - Type out `play-exceptions-with-catch.php` file
    - Execute in terminal `php play-exceptions-with-catch.php`

## Scalar types

* Explain that new argument types are available: `bool`, `float`, `int`, `string`
    - Open `src/AppBundle/Entity/Genus.php` file
    - Add `string` to `setName($name)` method
        + `public function setName(string $name)`
    - Create new `typesAction()` method in `GenusController`
        + Create `$genus = new Genus()`
        + Add `$genus->setName(4);`
    - Open the URL in browser
    - Show that it still works
* Explain that there are two types of typing: weak (default), and strict
    - Explain that weak typing means that PHP will try to coerce values of the wrong type into the expected scalar type (if you give integer when string is expected it will convert it to string)
        + The reason why our code works even if it got the wrong type value
    - Explain that strict typing means that only a variable of exact type will be accepted, or a TypeError will be thrown
        + In `Genus` on top of file type: `declare(strict_types=1);`
        + Refresh browser
    - Explain that type declarations only work on a per-file basis. Even if our entity is using strict types, because it's called from the controller which uses weak typing the strict typing of the entity is ignored
        + In `GenusController` on top of file type: `declare(strict_types=1);`
        + Refresh browser, and show that it throws an error
* Fill up all the methods with strict types in the `Genus` class.

## Return types

* Explain that from now on you can define the return type of a function.
* The same types that are used for arguments can be used for return values
* Edit `Genus::getName()`
    - `return 5;` show that you can return integer by default
* In `GenusController` add `var_dump($genus->getName());`
* Refresh page
* Edit `Genus::getName()`
    - `public function getName(): string`
    - Refresh page to show that you can't return integer anymore
    - remove `return 5;`

## Nullable types

* Explain that you might sometimes want to return a `null` value, or give `null` as argument to a function. This can be done by prefixing type name with a question mark.
* Edit `GenusController` with `$genus->setFunFact(null);`
* Refresh the browser to show that it fails
* Edit `Genus` with `public function setFunFact(?string $funFact): ?string`
* Refresh the browser to show that it works

## Void functions

* Explain that you might sometimes have functions what don't need to return any value.
* Most of the time it would be some command type functions that do some work
* Unless you are making a fluid interface your setters will only take some value without returning anything
* Use the `void` as return type to make it clear for everyone reading your code that the function does not return a value
    - Set all setters in `Genus` with `: void` (e.g., `public function setSubFamily(SubFamily $subFamily = null): void`)
* You can still use the `return` statement if you need to stop function execution early
    - It just has to be an empty return statement `return;`
        + It's not necessary, but for example case add `return;` to the end of some setter to show how it would look like. It would be best to use it somewhere in function that quits on `if` statement, but in the current code there is no good method for it.
            * Actually found an example in the current code, `LoginFormAuthenticator` line 34 (`if (!$isLoginSubmit) {`) is a loop that uses the empty return statement
    - `null` is not a valid return value for a void function, so make sure to use an empty return statement

## Class constant visibility

* !! Went over all the code, and can't see a good example. The best one would be to take some "hard-coded" value, and use a constant for that (thought with the current code it's unnecessary).
* Constants are a great way to re-use a value without getting into bad practices like using global variables
    - Show `GenusController::98`
    - `/images/` string is a great example of a value that could be extracted into a constant. That way if we change the location of our images it would require only a single change.
    - in `GenusNote::13` add `const AVATAR_FILE_PREFIX = '/images/';`
    - in `GenusController::98` replace the line with `'avatarUri' => GenusNote::AVATAR_FILE_PREFIX.$note->getUserAvatarFilename(),`
* The new change in PHP7 is that you can change the visibility of constants (like with methods/variables).
    - To make sure what we don't introduce some errors by manually typing the URI, let's introduce the method to get the URI
        + Add `private const BLANK_AVATAR_FILENAME = 'blank.jpg';` in `GenusNote::15`
        + Add `GenusNote::getUserAvatarUri()` after `GenusNote::getUserAvatarFilename()`
        + Replace `GenusController::98` with `'avatarUri' => $note->getUserAvatarUri(),`
        + This way you can re-use the values without exposing more information than is needed (which might lead to code which breaks after changes - there is some fancy word for that, but I never can remember them)

```php
public function getUserAvatarUri(): string
{
    $filename = static::BLANK_AVATAR_FILENAME;

    if ($this->getUserAvatarFilename() !== null) {
        $filename = $this->getUserAvatarFilename();
    }

    return static::AVATAR_FILE_PREFIX.$filename;
}
```

## Iterable pseudo-type

* !!?? Was looking for a possible way to put an example, but there does not look to be any good places. Thinking about adding to `GenusController::show` something like `$food` array, call `Genus::feed(array $food)` which would provide concatenated string (`$genusName + recently ate + list of array values` and display it in `genus/show.html.twig`). When change `$food` to be an iterator from `ArrayObject` (http://be2.php.net/manual/en/class.arrayobject.php) which behaves similar to simple array, but would break the function because it's not an array. When change the function type hint from `array` to `iterable`, and show that it works (I guess, have not tried yet). Not the best example, but still stays in the same theme and shows how the feature works. Otherwise the alternative would be similar idea but in separate file (`iterate` function, simple array, simple array object iterator and show what just with array/Traversable only one of the calls works, while with `iterable` calling function with both variables works).

## Multi catch exception handling

* !!?? Can't see any good place to introduce the feature. I see two choices for that. One would be to extend exception listener which catches two different exceptions with putting different texts on screen (to show the old way), say what if you want re-use the same catch code you can catch multiple exceptions without copy-pasting the code (show the new way). Then make some action which at random throws one of two exceptions. The other way would be using the same example (random exception, catching it), but done using the separate PHP script (like was done with errors as exceptions).

## Misc

* ?? Some functions have changed their name like `rand()` to `mt_rand()`, not sure if it's worth explaining anything about it. During the planning we decided that it's not worth it. But as during modifying `GenusController` that function (e.g., in `$genus->setName('Octopus'.rand(1, 100));`) would be crossed over I think it might be good to mention something like "some functions changed, and have a better replacements in PHP7, use your IDE to update your code"
* I will let you decide at that point to show a spaceship animation across the screen :D
