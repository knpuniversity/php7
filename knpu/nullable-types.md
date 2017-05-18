# Nullable Types

Let's try an experiment: In `GenusController`, change our `var_dump()` to `$genus->getFunFact()`:
another property on `Genus` that *should* be a string. If you refresh now... it's
null! No surprise: we haven't set this yet and that method doesn't have a return type.

Now, add one: `: string`. Refresh again.

Explosion! This method returns *null*... which apparently is *not* a string. This
actually made return types a pain in PHP 7... so in PHP 7.1, they fixed it! With
"nullable" types. It works like this: if a return type can be null, add a `?` in
front of the type.

Yep, this method can return a string *or* null. And once again, life is good!

## Nullable Type Arguments

Let's go further! In the controller, add `$genus->setFunFact('This is fun')` then
`var_dump($genus->getFunFact())`. After, do `$genus->setFunFact(null)`... because
null *should* be allowed.

Will this work? Totally! It prints the string, then it prints `null`. Unless... you
type-hint the argument. Right now the argument to `setFunFact()` can be anything.
Add the `string` type-hint.

No problem, right? Refresh! Ah! The first dump works, but `setFunFact(null)` *fails*.
Duh, null is *not* a string.

In "strict mode", we suddenly need to think about things that were never a problem
before. That's mostly good, but strict mode is a bit more work. To make this argument
nullable, add that same `?` before the type.

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
