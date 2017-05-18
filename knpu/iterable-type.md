# The iterable Pseudo-Type

I want to talk about yet *another* PHP 7.1 feature. I know, most of this tutorial
is actually about PHP 7.1 features... not PHP 7.0. What can I say? They killed it
with 7.1.

To show off this feature, open your `Genus` class and find the bottom. Add a fun
new function called `feed()` with an array` $food` argument. Set the return type
to a string.

I'm going to paste in some code. Basically, we pass an array with some food, and
this returns a message. And if we pass *no* food, our genus looks at us funny...

Let's go use this! In `showAction()`, create a `$food` array set to, how about,
shrimp, clams, lobsters, and a shark! Pass a new `recentlyAte` variable into the
template set to `$genus->feed($food)`. Then, open the `genus/show.html.twig` template,
add a new "Diet" key, and print `recentlyAte`.

Nice! Go back and refresh the show page. There it is! Aurelia recently ate shrimp,
clams, lobsters, shark.

## Creating an Iterable Object

Now, here's the challenge. Imagine that this `feed()` function is part of a re-usable
library that we're creating, and we want to make it as flexible as possible. Right
now, we are *requiring* the `$foods` argument be an array. But... is that necessary?
Really, if you passed me *anything* that I could loop over, we could make this function
work.

Let's try it! In `GenusController`, rename the `$food` variable to `$foodArray`.
Then, add `$food = new \ArrayObject()` and pass it `$foodArray`. 

If you're not familiar with `ArrayObject`, it's a PHP core object, but it looks
and acts like an array. Most importantly, you can foreach over it. So in theory,
our `feed()` function should be able to use this, right?

If you refresh... huge error!

## The iterable Pseudo-type

> Argument one passed to feed() must be an array, object given

Of course: we're requiring an array with the type-hint. Well... that's kind of lame.
Change this to `iterable`: a new pseudo-type - like `array` - from PHP 7.1. This
is *perfect* when *all* you care about is that an argument can be used in `foreach`.

Notice, PHPStorm doesn't like this at all. My version of PHPStorm still doesn't think
that `iterable` exists. But, it *is* valid, and this will probably, hopefully be
fixed soon.

Of course, if you refresh now, a new error!

> Warning, implode, invalid arguments passed

Our function now allows an array or any iterable object. But... the second
argument to `implode()` *must* be an array. Remember, when you type-hint with iterable,
the *only* thing you know is that you can foreach over that value. It's not even
legal to use `count()` like this!

If I want this to be more flexible, we need to do some refactoring. Create a new
variable called `$foodItems` set to an empty array. Then, foreach over `$food as $foodItem`.
This is legal! Inside, put each item into the `$foodItems` array.

Finally, update the count to use `$foodItems` and the same for `implode()`.

And just like that, this function can accept *any* value that we can loop over.

Now, I wouldn't necessarily do this in *my* code unless I needed it. If you're always
going to pass an array, just type-hint with array! But, you *will* start seeing this
more and more in libraries that you use.
