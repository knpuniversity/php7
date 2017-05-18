# Return Types

PHP 7 added scalar type-hinting. But it *also* added - *finally* - return types.
These didn't exist at *all* in PHP 5, not even for objects. This gives us the ability
to say that this method returns a string and that method returns some object. I
love return types.

Start in `GenusController`: let's fix our code first. Say `$genus->setName('Octopus')`.
Now, dump `$genus->getName()`.

*We* know that this should return a string... but technically... it could return
anything. Like, what if we get crazy and just `return 5`.

What happens? Well, no surprise... it returns 5, an *integer*. Yep, we have a method
that should return a string, but is instead returning an integer. Lame!

## Adding a Return Type

To fix this, add a return type. After the method name, add `: string`. Of course,
this could be *any* type: a class name, `int`, `bool`, `float`, `array`, `callable`
or even the new `traversable`. More on that later.

As *soon* as we do this, PhpStorm is furious all over again! And so is PHP: refresh!

> TypeError: Return value of getName() must be of the type string, integer returned

## Return Types & Weak Versus Strict Mode

Yes! There is one *really* important thing happening behind the scenes: this
throws an error *only* because this class is in *strict* mode.

What I mean is, if we changed `Genus` back to weak mode, then instead of throwing
an error, PHP would try to turn the integer 5 into a string. The strict or weak mode
affects argument type-hints *and* return types.

But here's the tricky part: in this case, the `strict_types`, that's important is
the one in `Genus`. If you remove the `declare(strict_types=1)` on `Genus` and then
refresh the page... it works!

Wait, wait, wait. When we type-hinted the *argument* in `setName()`, that caused
an error when we put the *controller* in strict mode. But when we added the *return type*,
suddenly it was important to use strict mode in the `Genus` class.

Here's the real, full explanation. When you add `strict_types=1`, it says:

> I want "strict" type-checking to be applied to all function calls I make *from*
> this file and all return types *in* this file.

Or, to be even more brief:

> I want "strict" type-checking to be applied to all values I control in this file.

The return value of `getName()` is something that *we* control and calculate in `Genus`.
Thanks to the `strict_types` in `Genus`, PHP forces us to write good code and return
the correct type.

But, with `setName()`, the argument value is being created *outside* of this class
in `GenusController`. For that, the `strict_types` needs to be added there.

Actually, scalar type hinting and return types are *really* easy... except for the
`strict_types` part. My advice is this: start adding a few `strict_types` to your
code and see how you like it. It's a great feature, but your code will work fine
with or without it.

In `Genus`, let's fix our code by returning `$this->name`. Now, life is good.

But what if `Genus` did *not* have a name yet? In that case, `getGenus()` would return
`null`. Is that allowed? Nope! null is *not* a string... and this can be really annoying.
Fortunately, PHP 7.1 gives us nullable types.
