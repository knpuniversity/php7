# PHP7 tutorial

In the tutorial it might be worth mentioning that it only covers the features/changes that are useful for most people, if they are interested in all the changes they should check out the official documentation.

    👍 ! We can tell them there are lots of thrilling documents on php.net to read about this ;)

## Skipping PHP6

https://wiki.php.net/rfc/php6

By now probably a lot of people know that "PHP6 certified engineer" is a joke, but it still might be worth to mention a sentence or two that PHP6 was skipped.

    👍 Btw, if I don't say anything on a point, assume that I'm saying "definitely! Totally agree!"

    These types of things won't show up in the code for the tutorial, but it's really useful to mention them here / in the next stage (High-Level Project Outline) so that they can make it into the recording :)

## PHP7 performance

https://wiki.php.net/phpng

It might be worth to spend a sentence or two informing that PHP7 uses a new engine, the best part of it being increased performance.

## BC: Changes to error and exception handling

http://be2.php.net/manual/en/migration70.incompatible.php#migration70.incompatible.error-handling

Don't think worth adding as most people are probably not dealing with custom error handlers (using frameworks that care of it).

    It seems like mentioning the fact that most errors have been converted to exceptions, and that there's a new Throwable interface. But I agree that the "custom error handlers" thing is not important. So, what would be an example of when the new error stuff would be important for a user? I actually don't know. Instead of catching \Exception, should I now be catching \Throwable? Or not? If not, is there any normal-user use-case for Throwable. I'm just not sure yet... if there is something important here... or if this is just a "free" feature for users, because now when they make bad mistakes, those will typically be handled better.

## NF: Scalar type declarations

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.scalar-type-declarations

Include. Explain that you need to declare strict mode. Explain new added types (bool, string, int, float).

## NF: Return type declarations

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.return-type-declarations

Include. Explain that same types you can use for arguments can be used for return.

## NF: Nullable types

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.nullable-types

Think that it's worth including. For me personally PHP7 was a problem sometimes when you needed the null but could not define it, with this one it feels like it becomes a full feature.

## NF: Void functions

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.void-functions

Think that it's worth including. Well actually together with this one return types finally feel like fully done feature (previous for getters, this for setters/commands).

## NF: Class constant visibility

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.class-constant-visibility

Think that it's worth including. Constants are a good solution in the code, but often they are only needed to be kept private only to the code that uses it.

## NF: iterable pseudo-type

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.iterable-pseudo-type

Think that it might be worth including. The big thing of PHP7 is that it has expanded the types, so it's good to know what you can use more general type to use any argument that looks like an array (be it array or Traversable object).

## NF: Multi catch exception handling

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.mulit-catch-exception-handling

Think that it's worth including. Personally I never run into problems where I would need to use it (often using abstracted framework exception catching), but at least it's really good to know you can do this.

## NF: Spaceship operator

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.spaceship-op

NO. Don't think it's worth including. I still don't get that is hype about it, and can't think of a way that most people making normal web application would find where to use it.

    Thank you! Instead, we will mention that it exists, but instead of showing it, we'll just show a spaceship animation across the screen. I think it's better than the feature :)
