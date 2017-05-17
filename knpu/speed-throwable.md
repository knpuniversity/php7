# 1 <3 Speed & Throwable

Hey guys! I hate to start a tutorial off on a depressing note but... look... PHP
5 is *dead*. WAY dead. Like, it's not even supported anymore. PHP 5 is like that
old, bad relationship that you just can't get out of. Hey, it's time to move on.
You're better than PHP 5.

Also... did you know that PHP 7 is a full *2* numbers higher than PHP 5? I heard
they skipped PHP 6 because 7 was just *too* awesome to fit into such a low number.
Or... maybe because they messed up PHP 6. Anyways, let's pretend that it's because
PHP 7 is so great... because it is.

This tutorial is about learning the *important* stuff... only. Look, you can spend
*hours* reading the PHP 7 CHANGELOG. Believe us... we did it. I get it, they made
*a lot* of stuff better... cool... but most of it isn't that critical. This means
that we will *not* be talking about the spaceship operator... because it is apparently
*not* a person who drives a flying saucer. Nope, it's an edge-case way to compare
numbers and strings. So disappointing.

## Speed Sells

So what *is* important in PHP 7? Honestly... the *biggest* selling point for upgrading
is speed. PHP 7 performance is on point. To show it off, Zend made a cute infographic.
Summary: PHP 7 equals zoooooom!

And that means you can take this to your manager and say:

> Hey buddy! When we upgrade to PHP 7, our pages will be faster and we can turn
> off like 10 servers.

And then they'll throw you a parade and promote you to CEO. Enjoy.

## Setting up the Project

And now that we know how to *sell* the upgrade to management, let's get into the
cool technical stuff.

As always, you should definitely enjoy a snack during the tutorial... and code along
with me! Download the course code from this page and unzip it. Inside, you'll find
a fancy `start/` directory with the same code you see here. Follow the `README.md`
file to get things set up. The last step will be to find your favorite terminal,
go to the project directory, and run:

```terminal
php bin/console server:run
```

to start the built-in web server. Open up the project in your browser: http://localhost:8000.

Welcome to AquaNote! A project we've been building in our Symfony series. For this
tutorial, it'll be a nice skeleton to start with.

## Proper Error Handling

Ok, the *first* feature of PHP 7 that gets me excited is... proper error handling.
Stay with me: I promise this *is* exciting!

At the root of the project, create a new file called `play-exceptions.php`. Inside,
let's do something fun: like, write some really bad code! We'll call an `undefinedFunction()`.
And below, I'll write "continue processing file", even though we know that's crazy!
This script will blow up *way* before that line.

Find your terminal, open up a new tab, and run:

```terminal
php play-exceptions.php
```

Fatal error! Woohoo! 

## Catching Errors

In PHP 5, we could catch *exceptions*... but not errors. Sure, you could try to work
with the error handler... but that's confusing stuff! In PHP 7... they fixed things!
We can finally catch *errors*.

Start with a normal try-catch block. But instead of catching `Exception`, catch
`\Throwable`. Yes! In PHP 7, you can write bad code, catch it, and even print out
the error message!

Try the file again:

```terminal
php play-exceptions.php
```

Haha! It *actually* runs. 

## About Throwable

About this `Throwable` thingy: it's actually a core *interface*. Here's the deal:
we still have the core `Exception` class. And now, there is also an `Error` class.
And both `Exception` and `Error` implement the `Throwable` interface. So if you want
to catch both exceptions *and* errors, `catch \Throwable`. If you want to only catch
exceptions, then `catch \Exception`. And if you want to only catch errors, use
`catch \Error`. It's quite elegant.

*And*, just like with exceptions, there are different *types* of errors, each with
its own class. For example, `TypeError` is thrown when you're passing an argument
of a wrong *type* to a function. And actually, that's our next topic: the new scalar
type system and strict mode!
