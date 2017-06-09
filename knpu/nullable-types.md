# Nullable Types

Let's try an experiment: In `GenusController`, change our `var_dump()` to `$genus->getFunFact()`:
another property on `Genus` that *should* be a string. If you refresh now... it's
null! No surprise: we haven't set this yet and that method doesn't have a return type.

[[[ code('4aecc478bd') ]]]

Now, add one: `: string`. Refresh again.

[[[ code('2452d33446') ]]]

Explosion! This method returns *null*... which apparently is *not* a string. This
actually made return types a pain in PHP 7... so in PHP 7.1, they fixed it! With
"nullable" types. It works like this: if a return type can be null, add a `?` in
front of the type.

[[[ code('80791d876b') ]]]

Yep, this method can return a string *or* null. And once again, life is good!

## Nullable Type Arguments

Let's go further! In the controller, add `$genus->setFunFact('This is fun')` then
`var_dump($genus->getFunFact())`. After, do `$genus->setFunFact(null)`... because
null *should* be allowed.

[[[ code('8f303253fc') ]]]

Will this work? Totally! It prints the string, then it prints `null`. Unless... you
type-hint the argument. Right now the argument to `setFunFact()` can be anything.
Add the `string` type-hint.

[[[ code('ec5cbe3c1f') ]]]

No problem, right? Refresh! Ah! The first dump works, but `setFunFact(null)` *fails*.
Duh, null is *not* a string.

With scalar type-hints, we suddenly need to think about things that were never a
problem before. That's mostly good, but it's a bit more work. To make this argument
nullable, add that same `?` before the type. Without this, passing ``null`` as an
argument is illegal... in both strict *and* weak modes.

[[[ code('3a7ade8908') ]]]

Refresh again. Beautiful!

## ?string versus string = null

Now, you might be thinking:

> Wait, wait wait. How is `?string` different than `string $funFact = null`?

Hmm, good question! Because if I say `string $funFact = null`, that *does* allow
a null value to be passed. In reality, these two syntaxes are *almost* the same.
The difference is that when you default the argument to null, I'm allowed to
call `setFunFact()` without *any* arguments: the argument is optional.

But with the nullable, `?string` syntax, the argument *is* still required... it's simply
that `null` is a valid value. That makes `?string` better... unless you *actually*
want the argument to be optional.

And by the way, the nullable `?` works for *any* type, like classes. We'll see that
in action next!
