# The Multi Exception Catch

Ok, let's talk about *one* more fun feature! And, surprise! This is also new in PHP
7.1.

For this example, let's have some fun. Imagine there's a guy at your office - Crazy
Dave who always brings in amazing smelling cookies. But... he *never* shares them.
Basically, Crazy Dave is a jerk.

So we're going to write a really annoying function that acts just like Crazy Dave.
Open `MainController` and add a new `public function cookiesAction()`. Above, add
`@Route("/crazy-dave")`.

If you downloaded the code for this project, you should have a `tutorial/` directory
with an `Exception` directory inside. Copy that `Exception` directory into `src/AppBundle`.

This contains two new classes for the two reasons that Crazy Dave always gives us
for *not* sharing his cookies: the `NoCookiesLeft` exception and the `NoCookieForYou`
exception. That last one is particularly rude.

See, Crazy Dave is such a jerk that he denies me reasonable cookie requests with
random reasons. So, if `random_int(0, 1)`, then he says `throw new NoCookieForYou`.
Otherwise, he throws a `new NoCookiesLeft` exception. So disappointing.

Find your browser and change the URL to `/crazy-dave`. Yep, random awful errors.
And *no* cookies.

## Catching Exceptions the Old Way

Ya know, we don't appreciate Dave shouting or throwing random things at us. So, let's at least
ask Dave to whisper his denials. To do that, wrap all of the logic in a try-catch
block. We need to catch *both* errors. No problem! First, catch `NoCookieForYou`.
If that happens, set a new `$whisper` variable to `Crazy Dave whispered` and then
`$e->getMessage()`.

Here's the problem: the two exception classes do *not* extend a common exception
class or interface... except for the *base* `Exception` class... and I don't want
to catch *all* exceptions.

Yep, to responsibly catch both errors, we need to also catch `NoCookiesLeft`. And
that's a bummer, because we need to duplicate the entire `$whisper` line. But, on
the bright side, we can finally return a new `Response()` with the message inside.

When we refresh, this *does* fix the problem: Dave is now whispering. Still no cookies
though... because Dave is still a jerk.

## Catching Multiple Exceptions

If you find yourself in this situation, you should just go buy your own cookies.
And if you find yourself catching multiple exceptions, there are two solutions.
First, if you are able to modify these exceptions, you should make them extend a
common base class or implement a common interface. Then, you can catch *that* exception
instance. That's the proper solution.

But if you can't update the classes, in PHP 7, you can catch them both at once. Delete
the second catch and instead, say `NoCookieForYou | NoCookiesLeft $e`. Say hello
to the multi-catch syntax.

Thanks to that, I can refresh and it still works.

Alright guys, that is everything I want to show you from PHP 7. Yes yes, there *are*
other things, like the spaceship operator... but they're not that important. And
other improvements happen automatically. For example, the `rand()` function is now
an alias to `mt_rand()`, which is a more secure way of generating random numbers.
You get that for free. Thanks PHPeople!

And of course, free performance! Deploy it to your production server and watch your
New Relic graphs get awesome! After all, isn't seeing performance graphs suddenly
improve basically the best thing ever? Well, the best thing after cookies at least?

Alright guys, that's it for me. I'll seeya next time.
