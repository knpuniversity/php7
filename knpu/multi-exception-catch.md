# Multi Exception Catch

Alright, from the last thing we're going to talk about, which is also a PHP 7.1 feature, we're going to have some fun.

So, imagine there's this guy at our office, Crazy Dave, who always brings in amazing smelling cookies, but he never shares them. Basically, Crazy Dave sucks. So we're going to write a really annoying function that acts like Crazy Dave. We're gonna do it in MainController, and I'm gonna make a new public function: cookiesAction. And we're gonna add an @Route to this /CAZY-dave.

Alright, if you download the code from this project, you should have a tutorial directory within an acception directory inside of that. I'm gonna copy that and then actually put it into my AppBundle. This directory has two exceptions, there's the NoCookiesLeft exception and the NoCookieForYou exception.

And Crazy Dave sucks so much that he denies me for random reasons. So: if random_int(0,1). Then he tells me "No cookie for you": throw_new NoCookieForYou. Otherwise, he throws new NoCookiesLeft, because Dave sucks.

[inaudible 00:01:41] if we change the URL to /crazy-dave, we get all these awful errors and we get no cookies most importantly.

So we don't appreciate Dave shouting about it, or throwing random things. Instead, we're at least going to ask Dave to whisper to us that we can't have cookies. So now what I'm going to do is I'm going to wrap this entire thing in a try-catch. And we're gonna catch both of those errors. So first we're going to catch NoCookieForYou. Now if that error happens, we'll set a new whisper variable to 'Crazy Dave whispered', and it will say e->getMessage().

Here's the problem, then we'll catch the NoCookieForYou but it won't catch the other exception. I mean if you look at these, they don't extend a common exception class. If they did, we could just catch that one exception. The only way to catch them both at once is to catch exception, but I don't want to do that cause it's too strong. I don't wanna just catch all exceptions in case something else weird happens. So the only thing I can do right now is I can also catch NoCookiesLeft, which sucks because I need to duplicate this entire whisper line. But at least now at the bottom I can say return new Response, and I can put a tiny little html page and we can put our whisper in there. So this does fix the problem; when I refresh, Dave is now whispering his annoying messages to us. Still no cookies though. Dave still sucks.

So if you find yourself in this situation in, there's two ways to solve it. One: if you are able to change these exceptions, you should make these exceptions extend a common base class or implement a common interface so that you can just catch perhaps the generic cookie exception. But if you can't, in PHP 7 you can catch them both at once. So I'm going to delete the second catch and instead I'm going to say NoCookieForYou | NoCookiesLeft, the multi-catch statement. Thanks to that, I can refresh and it still works without the duplication.

Alright guys, that is everything I want to show you from PHP 7. Yes, there is a lot more, you can read all about the Spaceship Operator everywhere on the interest. There's also cool things like the Rand function. Automatically behind the scenes now actually calls MT_Rand, which is a more random, a better, more cryptographically secure Random function. Now that's not something you even need to care about, but that's the kind of cool stuff that comes with PHP 7. The language is evolving into good stuff. And remember, free performance! So that's really why you should go deploy. Make sure you have new relic on your site so you can see all of your memory consumption go down as soon as you deploy.

Alright guys, that's it for me. I'll see you next time.

