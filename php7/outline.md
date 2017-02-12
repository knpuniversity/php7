# PHP7 High-level Project Outline

## Preconditions

I don't have MySQL on my host, so think would add the Homestead development environment as explained in http://www.ifdattic.com/how-to-start-using-laravel-homestead/

## Intro

* Tell that this tutorial is about PHP7
* Explain that it does not cover all the new features (just those that in our opinion would be most useful for most people). Suggest reading documentation for full coverage.
* Explain why it was jumped from PHP5 to PHP7
* Explain that internal PHP errors were converted to exceptions. They can be caught through \Throwable interface.
    - ?? Do we just finish with that statement, or do we show some example in PHP interactive shell?

```php
php > b();
PHP Warning:  Uncaught Error: Call to undefined function b() in php shell code:1

php > try { b(); } catch (Throwable $t) { echo 'erroras: '.$t->getMessage(); };
erroras: Call to undefined function b()
```

## Scalar types

* Explain that new argument types are available: `bool`, `float`, `int`, `string`
    - Open `src/AppBundle/Entity/Genus.php` file
    - Add `int` to `setName($name)` method
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
* ?? Fill in the remaining methods with strict types. Should we also add types to other entity classes, or just on a single one to display how it works?

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
