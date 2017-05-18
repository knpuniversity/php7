# Scalar Type Hints

Of course the big big features of PHP 7 are scalar type-hinting and return types.
Let's play with scalar type-hinting first.

Open up `src/AppBundle/Controller/GenusController.php`. Let's create a new page to
play with: `public function typesExampleAction()`. Above that, I'll use
`@Route("/types")` to map a URL to this.

I already have a normal PHP class called `Genus`... which is a type of animal classification.
It has an `id`, `name`, `speciesCount`, `funFact` and a few other things.

Back in the controller, let's create a new genus: `$genus = new Genus()`. The genus's
name should obviously be a string. But, let's be difficult and set it to an integer:
`$genus->setName(4)`. Below, `var_dump($genus);` and then `die;`.

Cool! In the browser, head to `/types` to check it out. It works! Even though *we*
think `name` should be a string, PHP lets us pass whatever we want. Right now,
`name` is actually an int.

In PHP 5, we *could* type-hint arguments... but only with either `array`, `closure`
or a class name. Well, no more! In PHP 7, we can type-hint with `string`... or `int`,
`float`, `bool` or `pizza`. Wait, not `pizza`.

But, woh! PhpStorm is *super* mad about this. That's because my PHPStorm is living
in the past! It's still configured to parse things as PHP 5. Open the PHP Storm settings
and search for PHP. Under "Languages and Frameworks", set the version to 7.1 We'll
also be showing off some 7.1 features.

So much happier! With *just* this one small change, go back, refresh and watch closely.
Specifically, watch the "name integer 4" part. Woh! Now it's a *string* 4.

## Weak Mode versus Strict Mode

You see, PHP 7 types now have two modes: weak mode and strict mode. When you
use weak mode - which is the default - PHP will try to "coerce" the argument into
whatever the type-hint is. In this case, it turns the integer 4 into a string 4.
And we're totally accustomed to this in PHP: if you try to echo an integer or treat
it like a string in any way, PHP automatically makes it a string.

## Strict Mode (strict_types=1)

But if you use strict mode, things are much different. Instead of changing the
value from an integer to a string, it will throw an error: a `TypeError`. How do we
activate strict mode?

At the top of `Genus`, make the *very* first thing in the file say `declare(strict_types=1);`.
This *must* be the first line in the file.

But check this out: when we refresh... still no error! What's the deal? Copy
that line, open `GenusController` and paste it here.

*Now* refresh again.

Boom!

This is the error we expected:

> `TypeError` Argument 1 passed to `setName()` must be type string, integer given.

This... is a bit confusing. The important thing is that `strict_types` is added to
the file where we *pass* the value... not actually the file where we add the type-hint.
When you add `strict_types=1`, you're saying:

> I want "strict" type-checking to be applied to all function calls I *make* from
> this file.

It's done this way on purpose: if you download an external library that uses scalar
type-hints, *you* get to decide whether or not you want arguments you pass to its
functions to be strictly type-checked. *You*, the developer, get to opt into strict
mode.

## Strict Mode or Weak Mode?

So... which should you use? It's up to you... just remember that you've been using
PHP for *years* in "weak mode". If it's never bothered you that PHP automatically
changes integers to strings instead of throwing an error, you might choose to keep
using weak mode. When you enable strict mode, your code *will* be more predictable...
but you'll also see - and need to correct - a lot more errors.

And remember! You can use scalar type-hints in either mode. There's also one more
thing to consider when choosing between weak or strict mode: return types.
