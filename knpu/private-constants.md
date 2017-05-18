# Private Constants

Okay enough with type hints and return types! PHP 7.1 added another cool feature
for class constants: we can finally make them private!

In `GenusController` find, `getNotesAction()`. This is used by an AJAX call to load
notes that appear at the bottom of the genus show page. For example, go to `/genus`
and click on one of them. Bam! At the bottom, an AJAX call loads a list of
notes, complete with an avatar. That comes from the `avatarUri` field that's returned.

Look at the `/images/` part: that looks funny to me. All of our images are stored
in that directory, and that's fine. But I hate having random strings like this in
my code. This is a perfect place to use... drum roll... a constant!

Open `GenusNote`, which is the object we're rendering on this page. Add a new constant:
`const AVATAR_FILE_PREFIX = '/images';`. Then, in the controller, use this:
`GenusNote::AVATAR_FILE_PREFIX`.

So far, this is *all* stuff we've seen before. And when we refresh... yep! Everything
still loads.

## Private Constants

This is an improvement... but it would be even *better* if I could call a method
on `GenusNote` to get the complete `avatarUri` string, instead of calculating it
here in my controller. In other words, I *don't* want anyone to use our constant
anymore: we're going to add a public *method* instead.

In PHP 7.1, we can say `private const`. Now, accessing that constant from outside
this class is illegal! That means, if we refresh, our AJAX calls are failing! On
the web debug toolbar, yep! You can see the 500 errors! If I open the profiler and
click "Exception", we see

> Cannot access private const from the controller

Awesome! So now that I can't use the constant anymore, I'll be looking for a public
function to use instead. In `GenusNote`, add a `public function getUserAvatarUri()`.
Hey! We're PHP 7 pros now, so add a `string` return type.

Before we add the logic, let's make things fancier. Suppose that *sometimes* there
is *not* a `userAvatarFilename` value for a note. If that's true, let's show a default
avatar image.

Back at the top, add another `private const BLANK_AVATAR_FILENAME = 'blank.jpg'`.
We'll pretend that we have a `blank.jpg` file that should be used when there's no
avatar.

Back in the new method, add `$filename = $this->getUserAvatarFilename();`. And,
`if (!$filename)`, then `$filename = self::BLANK_AVATAR_FILENAME`... because we
*can* access the private constant from inside the class. Finish the method with
`return self::AVATAR_FILE_PREFIX.'/'.$filename;`.

Nice! Back in the controller, we're still accessing the private constant, which is
*super* obvious. That'll push me to use the public function `getUserAvatarUri()`.

Refresh one more time! Love it!
