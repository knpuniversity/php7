# Void Types & Refactoring an Entire Class

There's *one* last feature with return types: void return types. `setFunFact()` is
a function... but it doesn't return anything. You can advertise that with `: void`.
This literally means that the method returns... nothing. And not surprisingly, when
we refresh, it works great... because we are in fact *not* returning anything.

[[[ code('3a7ade8908') ]]]

But now, try to return `null`. This will *not* work! When your return type is
`void`, it literally means you do not return *anything*. Even null is not allowed.

[[[ code('9d08844731') ]]]

The void return type isn't that important, but it's useful because (A), it documents
that this method does not return anything and (B) it guarantees that we don't get
crazy and accidentally return something.

Oh, but you *can* use the `return` statement - as long as it it's just `return` with
nothing after.

[[[ code('e42e8c6a21') ]]]

## Updating all of Genus

Great news! We now know *everything* about scalar type hints and return types. And
we can use our new super powers to update *everything* in `Genus`.

Let's do it! Start with `getId()`, this will return an `int`, but it should be nullable:
there is no `id` at first. For `getName()`, the same thing, `?string`. For `setName()`,
it's up to you: this accepts a string, but I *am* going to allow it to be null. But
if you never want that to happen, don't allow it! And of course, the method should
return `void`.

[[[ code('4cc30f76a4') ]]]

For `getSubFamily()`, this is easy: it will return a `SubFamily` object or null.
The *cool* part is that we don't need the PHP doc anymore! We have a return type!
Amazing!

[[[ code('5a2b410a85') ]]]

For `setSubFamily()`, mark this to return `void`. Notice that the argument is
`SubFamily $subFamily = null`. If we want that argument to be required, we could
change that to `?SubFamily`. Your call!

[[[ code('81b599b102') ]]]

Let's keep going! `getSpeciesCount()` returns a nullable `int`, though we could give
that a default value of 0 if we want, and remove the question mark. `setSpeciesCount()`
accepts a nullable `int` and returns `void`. Again, the nullable part is up to you.

[[[ code('f980f95fa8') ]]]

For `getUpdatedAt()`, set its return type to a nullable `DateTimeInterface`, because
this starts as `null`. But notice... I'm returning a `DateTime` object... so why make
the return-type `DateTimeInterface`? Well, it's up to you. With this type-hint, I could
update my code later to return a `DateTimeImmutable` object. But more importantly,
the return type is what you're "advertising" to outsiders. Choose whatever makes
the most sense.

[[[ code('e965e89680') ]]]

Ok, let's get this done! `setIsPublished` takes a `bool` that is *not* nullable,
and it returns `void`. `getIsPublished` will definitely return a `bool` - we initialized
it to a `bool` when we defined the property. 

[[[ code('e132347d9d') ]]]

For `getNotes()`, return a `Collection` and then update the PHPDoc to match. There
are two interesting things happening. First, `ArrayCollection` implements this
`Collection` interface, so using the interface is a bit more flexible. Normally,
that's just a choice you can make: set your return type to the class you *know* you're
returning... or use the more flexible interface. But actually, for Doctrine collections,
you *must* use `Collection`. Depending on the situation, this property might be an
`ArrayCollection` *or* a `PersistentCollection`... both of which implement the
`Collection` interface. In other words, the *only* guarantee we can make is that
this returns the `Collection` interface.

[[[ code('53aa0f4a60') ]]]

Second, this returns a collection of `GenusNote` objects. In other words, if you
call `getNotes()` and then loop over the results, each item will be a `GenusNote`.
But there's no way to denote that with return types. That's why we're keeping the
`|GenusNote[]`. That helps my editor when looping.

`getFirstDiscoveredAt()` returns a nullable `DateTimeInterface` and `setFirstDiscoveredAt()`
returns `void`. `getSlug()` will be a nullable string, `setSlug()` will accept a nullable
string argument and return `void`. `addGenusScientists()` will return void and `removeGenusScientist()`
the same. For `getGenusScientists()`, like before, I'll set the return type to `Collection`
and update the PHP doc. Do the same for `getExpertScientists()`: return `Collection`.
This PHPDoc is already correct... but I'll shorten it.

[[[ code('de677753ec') ]]]

Phew! That makes our class a lot *tighter*: it's now more readable and more difficult
to make mistakes. But it also took some work! The cool thing is that you have the
power to add return types and type-hint arguments wherever you want. But you
don't need to do it *everywhere*.

After *all* those changes... did we break anything? Find your browser and go to
`/genus/new`. This is a "dummy" URL that creates and saves a `Genus` behind the
scenes. So apparently, that still works! Click the Genus to go to its show page.
Then, login using `weaverryan+1@gmail.com` and password `iliketurtles`. Once you
do that, click to edit the genus.

Let's see... change the species to 5000, keep the fun fact empty and change the
name. Hit enter!

Yay! Everything still works! And our `Genus` class is awesome!
