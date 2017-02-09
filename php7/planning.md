# PHP7 tutorial

In the tutorial it might be worth mentioning that it only covers the features/changes that are useful for most people, if they are interested in all the changes they should check out the official documentation.

## Skipping PHP6

https://wiki.php.net/rfc/php6

By now probably a lot of people know that "PHP6 certified engineer" is a joke, but it still might be worth to mention a sentence or two that PHP6 was skipped.

## PHP7 performance

https://wiki.php.net/phpng

It might be worth to spend a sentence or two informing that PHP7 uses a new engine, the best part of it being increased performance.

## BC: Changes to error and exception handling

http://be2.php.net/manual/en/migration70.incompatible.php#migration70.incompatible.error-handling

Don't think worth adding as most people are probably not dealing with custom error handlers (using frameworks that care of it).

## BC: Changes to variable handling

http://be2.php.net/manual/en/migration70.incompatible.php#migration70.incompatible.variable-handling

Don't think worth adding as this is something that is more complex, and most people will avoid using it rather choosing to write simpler code.

The list order would be rarely used case (only arrays), and it suggests that its behavior might change it might just add more confusion.

The remaining changes to list() also look like something that would be never used (except maybe in bad code).

## BC: Array ordering, global, parenthesis

http://be2.php.net/manual/en/migration70.incompatible.php#migration70.incompatible.variable-handling.array-order

Don't think worth adding as the examples provided appears to be used only in bad code, and would not impact most of the users.

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.array-order appears to be reversing PHP7 ordering back to PHP5 ordering, still not worth including.

## BC: Changes to foreach

http://be2.php.net/manual/en/migration70.incompatible.php#migration70.incompatible.foreach

Don't think it's worth mentioning any of the changes. Maybe something that might be worth mentioning is that foreach does not change original array anymore (http://be2.php.net/manual/en/migration70.incompatible.php#migration70.incompatible.foreach.by-value), but in my opinion changing the array you're iterating is a bad practice in the first place.

## BC: Changes to integer handling

http://be2.php.net/manual/en/migration70.incompatible.php#migration70.incompatible.integers

Don't think worth mentioning of the changes. Most would deal with bad code, and it provides errors/warnings about it.

## BC: Changes to string handling

http://be2.php.net/manual/en/migration70.incompatible.php#migration70.incompatible.strings

Don't think worth mentioning of the changes. Most of them deal with bad code, and provides some kind of warning/error.

## BC: Removed functions

http://be2.php.net/manual/en/migration70.incompatible.php#migration70.incompatible.removed-functions

Don't think worth mentioning as most deal with deprecated functions that should not have been used in the long time.

## BC: Removed INI directives

http://be2.php.net/manual/en/migration70.incompatible.php#migration70.incompatible.removed-ini-directives

Don't think worth mentioning as deals with something that should now have been used in the long time.

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.removed-ini-directives

Don't think worth mentioning as mostly some session configurations.

## BC: Throw on passing too few function arguments

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.too-few-arguments-exception

Not sure. It would mostly deal with bad written code which would just fail with error.

## BC: Forbid dynamic calls to scope introspection functions

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.forbid-dynamic-calls-to-scope-introspection-functions

Don't think it's worth including. Deals mostly with bad code which you probably should not be writing in the first place.

## BC: Numerical string conversions now respect scientific notation

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.numerical-strings-scientific-notation

Don't think it's worth including. Might be due to me trying to avoid math whenever I can, but I have hard time finding use cases for most people.

## BC: Fixes to mt_rand() algorithm

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.fixes-to-mt_rand-algorithm

Don't think it's worth including. Sounds like this fix is for some edge cases, and most people won't care about.

## BC: rand() aliased to mt_rand() and srand() aliased to mt_srand()

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.rand-srand-aliases

Don't think it's worth including. It affects some shuffling/random functions, but doubt that effect is something that anyone would care about.

## BC: Disallow the ASCII delete control character in identifiers

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.delete-control-character-in-identifiers

Don't think it's worth including. Sounds like a fix for some edge case that most people would not care about.

## BC: error_log changes with syslog value

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.error_log-syslog

Don't think it's worth including. Sounds like a fix for some small amount of people that need better logging, would not affect most people.

## BC: Do not call destructors on incomplete objects

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.dont-call-destructors

Don't think it's worth including. Sounds like a fix for some edge cases, in the end it sounds like you application would still fatal quit in the end.

## BC: call_user_func() handling of reference arguments

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.call_user_func-with-ref-args

Don't think it's worth including. Appears to only affect bad code that no one cares to fix (not continues the call but provides an error).

## BC: The empty index operator is not supported for strings anymore

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.empty-string-index-operator

Don't think it's worth including. Appears to only affect lazy/bad code which does not convert to arrays normally, now fatal error.

## BC: Sort order of equal elements

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.sort-order

Don't think it's worth including. Appears to just change how same elements are ordered (and if some code relies on some ordering of same elements it probably just means that is a bad code).

## BC: Error message for E_RECOVERABLE errors

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.e-recoverable

Don't think it's worth mentioning. Most people won't care that it's now called "Recoverable fatal error" (instead of "Catchable ...").

## BC: $options parameter of unserialize()

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.unserialize

Don't think it's worth mentioning. Most probably won't care that `allowed_classes` is now strictly typed (array or boolean) as it just means bad code. Provides warning.

## BC: DateTime constructor incorporates microseconds

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.datetime-microseconds

Not sure. It sounds like it would be an important thing to mention as a lot of people might be affected by this. The only problem I see is that documentation does not mention the best way to compare two days now (alternative). Below is some code execution with results:

```php
php > $a = new DateTime(); $b = new DateTime();
php > var_dump($a, $b);
object(DateTime)#2 (3) {
  ["date"]=>
  string(26) "2017-02-06 12:44:26.530478"
  ["timezone_type"]=>
  int(3)
  ["timezone"]=>
  string(3) "UTC"
}
object(DateTime)#1 (3) {
  ["date"]=>
  string(26) "2017-02-06 12:44:26.530497"
  ["timezone_type"]=>
  int(3)
  ["timezone"]=>
  string(3) "UTC"
}
php > var_dump($a == $b);
bool(false)
```

## BC: Fatal errors to Error exceptions conversions

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.fatal-errors-to-error-exceptions

Don't think it's worth including. Appears to be dealing with throwing Error exception instead of fatal error. Would probably me mostly abstracted behind frameworks.

## BC: Lexically bound variables cannot reuse names

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.lexical-names

Don't think it's worth including. It appears to just not allow you to intentionally write bad code.

## BC: JSON encoding and decoding

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.json

Don't think it's worth including. Might affect some code that is badly written (that uses empty property names).

## BC: Changes to mb_ereg() and mb_eregi() parameter semantics

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.mbstring

Don't think it's worth including. Just appears to be a change that makes sure you write good code, might actually impact some users.

## BC: Drop support for the sslv2 stream

http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.openssl

Don't think it's worth including.

## BC: Other changes

http://be2.php.net/manual/en/migration70.incompatible.php#migration70.incompatible.other

Don't think that most of them are worth mentioning. Most deal with bad code, and provide errors about it.

One that might be worth mentioning is that you can use class names like `bool`, `string`, etc (http://be2.php.net/manual/en/migration70.incompatible.php#migration70.incompatible.other.classes). Most of the people would probably won't deal with it, and most of the libraries should have been updated to not use them. Extension on this is http://be2.php.net/manual/en/migration71.incompatible.php#migration71.incompatible.invalid-class-names

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

## NF: Symmetric array destructuring

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.symmetric-array-destructuring

Not sure. I personally always try to avoid using list() and be explicit about the assignments. It does look like a good feature which many could use so it might be worth including it.

## NF: Class constant visibility

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.class-constant-visibility

Think that it's worth including. Constants are a good solution in the code, but often they are only needed to be kept private only to the code that uses it.

## NF: Null coalescing operator

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.null-coalesce-op

Think that it might be worth to include this. It helps in those cases where you use isset() with return value, but in my opinion it starts to get confusing once you start chaining them.

## NF: iterable pseudo-type

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.iterable-pseudo-type

Think that it might be worth including. The big thing of PHP7 is that it has expanded the types, so it's good to know what you can use more general type to use any argument that looks like an array (be it array or Traversable object).

## NF: Multi catch exception handling

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.mulit-catch-exception-handling

Think that it's worth including. Personally I never run into problems where I would need to use it (often using abstracted framework exception catching), but at least it's really good to know you can do this.

## NF: Support for keys in list()

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.support-for-keys-in-list

Not sure. Think it would be mostly depending on the choice if we include the list() changes when including all of them, if not including them then not including any of them to keep the confusion down.

## NF: Support for negative string offsets

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.support-for-negative-string-offsets

Not sure it's worth including. Just don't know how useful it would be (very few times I used accessing character from string, and most string manipulation functions have negative as accessing from the back so you don't even think about it). Even if it's a simple feature, had to read about it a couple of times making sure I got it correctly, so just think it might bring more confusion than good.

## NF: Support for AEAD in ext/openssl

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.support-for-aead-in-ext-openssl

Don't think it's worth including. Not something that most people would be using.

## NF: Convert callables to Closures with Closure::fromCallable()

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.convert-callables-to-closures

Not sure. It does sound like a good feature, but just could not think of a single use case there it would have come in hand for me. Don't think like it would be something that would be used by most (more like for framework/library makers).

## NF: Asynchronous signal handling

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.asynchronous-signal-handling

Don't think it's worth including. Just can't see it being used by most people, mostly for some framework/library makers, and even in that case it would be mostly one time use.

## NF: HTTP/2 server push support in ext/curl

http://be2.php.net/manual/en/migration71.new-features.php#migration71.new-features.http2-server-push-support-in-ext-curl

Not sure. It sounds like a good feature, the big question is how useful it would be for most people. HTTP2 is still not that often used, and even it that case this would probably just be abstracted by some library used in project.

## NF: Spaceship operator

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.spaceship-op

Don't think it's worth including. I still don't get that is hype about it, and can't think of a way that most people making normal web application would find where to use it.

## NF: Constant arrays using define()

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.define-array

Don't think it's worth including. Just don't see it's that useful, and think defining a constant using `const` keyword is less confusing.

## NF: Anonymous classes

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.anonymous-classes

Don't think it's worth including. In my opinion it just makes things more confusing, and other than some specific libraries don't think it would be that useful for most people.

## NF: Unicode codepoint espace syntax

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.unicode-codepoint-escape-syntax

Don't think it's worth including. Just can't see that much of use cases where you would want to use it (expect maybe for printing some emoticons).

## NF: Closure::call()

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.closure-call-method

Don't think it's worth including. Other than some specific libraries I doubt most of the people are would be using this.

## NF: Filtered unserialize()

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.filtered-unserialize

Not sure, how often someone would be using it. The only reason why I would think might be worth mentioning it is that this is for having more secure applications, so I'm all for security, but just doubt how often it might be used.

## NF: IntlChar

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.intlchar

Don't think it would be worth including. Can't think of use cases where most people would be using it.

## NF: Expectations

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.expectations

Don't think it's worth including, because as far as I know it's not really a popular decision to use `assert()` in the code (most of the time some custom library is used).

## NF: Group use declarations

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.group-use-declarations

Don't think it's worth including. In my opinion for some it start making it confusing when grouping use statements, and if you're using a normal IDE most of the time namespaces are being managed automatically.

## NF: Generator return expressions

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.generator-return-expressions

Not sure. The feature itself sounds like something useful (being able to return final value), but where is raving about generators for years, but personally I have not yet seen them anywhere else than articles explaining that generators are.

## NF: Generator delegation

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.generator-delegation

Not sure. Same problem with previous one. Have not seen generators used, even more a generator being called from another generator.

## NF: Integer division with intdiv()

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.intdiv

Not sure. The feature itself sounds good (avoiding things like division by zero), the only problem is that I doubt most people remember it's available (one of those functions that are cool, but you never remember they exist when you could use it).

## NF: Session options

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.session-options

Not sure. It sounds like a good addition, but sessions is one of the things that is abstracted by most frameworks so not something that you ever use.

## NF: preg_replace_callback_array()

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.session-options

Not sure. Sounds like a useful feature, but I just doubt a lot of people are calling multiple regular expressions (regular expressions are complicated enough that a lot of people would try to avoid doing them in the first place).

## NF: CSPRNG functions

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.csprng-functions

Not sure. I'm all for security so being able to generate secure random bytes or integer sounds great, the only problem how often someone would use it (leading to just forgetting this function exists as you don't use it often).

## NF: list() being able to unpack ArrayAccess object

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.csprng-functions

Not sure. Sounds like a good fix, but not something I personally had ever need to use (actually list() is a good function, but I often try to avoid using it as it often makes things more complicated).

## NF: Other features

http://be2.php.net/manual/en/migration70.new-features.php#migration70.new-features.others

Don't think it's worth including. Some feature about accessing class members on cloning (don't think it's something that would be used often).

## DF: PHP 4 style constructors

http://be2.php.net/manual/en/migration70.deprecated.php#migration70.deprecated.php4-constructors

Don't think it's worth mentioning. I doubt that many applications which would be upgrading to PHP7 would be using PHP4 style constructor, so it would be best choice to avoid pushing useless information about how constructors worked a long time ago (because when I started learning PHP almost no one was mentioning PHP4 constructors).

## DF: Static calls to non-static methods

http://be2.php.net/manual/en/migration70.deprecated.php#migration70.deprecated.static-calls

Not sure. It sounds like something that would be used in bad/old code. Might be best to not even mention as most would probably would not even know you could do that (don't know KnpU audience but I'm assuming that KnpU members might be newbies to programming/PHP, but because they are investing in learning more they are someone who tries to write "correct" code).

## DF: password_hash() salt option

http://be2.php.net/manual/en/migration70.deprecated.php#migration70.deprecated.static-calls

Don't think it's worth including. Not sure how many people might have been providing their own salt for password generation (as this is probably abstracted by frameworks/libraries). It would still give deprecation error for those who does that.

## DF: capture_session_meta SSL context option

http://be2.php.net/manual/en/migration70.deprecated.php#migration70.deprecated.capture-session-meta

Don't think it's worth including. Not sure how many people might be using this option (or how many work with streams), but it's something that should only have few cases and those could be dealt with using deprecation warnings.

## DF: LDAP deprecations

http://be2.php.net/manual/en/migration70.deprecated.php#migration70.deprecated.ldap

Don't think it's worth including. Doubt there are many cases where sorting being deprecated would be a problem, and those who use it could deal with it using deprecation notices.

## DF: ext/mcrypt

http://be2.php.net/manual/en/migration71.deprecated.php#migration71.deprecated.ext-mcrypt

Not sure. It might be worth mentioning that mcrypt is now deprecated, but don't think it would affect a lot of people.

## DF: Eval option for mb_ereg_replace() and mb_eregi_replace()

http://be2.php.net/manual/en/migration71.deprecated.php#migration71.deprecated.eval-option-for-mb-ereg-replace

Don't think it's worth including. Sounds like it would only affect bad code.

## Changed functions

http://be2.php.net/manual/en/migration70.changed-functions.php

http://be2.php.net/manual/en/migration71.changed-functions.php

Don't think there is anything worth including. Below a few functions that sound might be worth mentioning, but still think could be easily skipped without missing much.

setlocale() only accept strings from now on for category, but doubt it would affect many people (it would probably be mostly abstracted by frameworks/libraries).

substr()/iconv_substr() returns empty string if start is the length of string

getenv() will return an array with all variables in no parameter provided

## New functions

http://be2.php.net/manual/en/migration70.new-functions.php

http://be2.php.net/manual/en/migration71.new-functions.php

Don't think anything worth including.

## New classes and interfaces

http://be2.php.net/manual/en/migration70.classes.php

Don't think anything worth including. Mostly it's just new Throwable/Error exceptions.

## New global constants

http://be2.php.net/manual/en/migration70.constants.php

http://be2.php.net/manual/en/migration71.constants.php

Don't think anything worth including.

## Removed extensions and sapis

http://be2.php.net/manual/en/migration70.removed-exts-sapis.php

Don't think anything worth including.

## OC: loosening reserved word restrictions

http://be2.php.net/manual/en/migration70.other-changes.php#migration70.other-changes.loosening-reserved-words

Don't think it's worth mentioning. Being able to use some reserved words in classes sound really cool, but it's one of those features that I think if you don't really know what you're doing is best not knowing about (in the end can just lead to more confusion than good).

## OC: Removal of date.timezone warning

http://be2.php.net/manual/en/migration70.other-changes.php#migration70.other-changes.remove-date-timezone-warning

Not sure. Don't think that it would be very helpful to a lot of people, in the end it was often a problem of Ops, not the development.

## OC: Notices and warnings on arithmetic with invalid strings

http://be2.php.net/manual/en/migration71.other-changes.php#migration71.other-changes.apprise-on-arithmetic-with-invalid-strings

Don't think it's worth including. Additional errors won't affect many people (especially those that don't care about errors).

## OC: Warn on octal escape sequence overflow

http://be2.php.net/manual/en/migration71.other-changes.php#migration71.other-changes.warn-on-octal-overflow

Don't think it's worth including. Additional errors won't affect many people (especially those that don't care about errors).

## OC: Inconsistency fixes to $this

http://be2.php.net/manual/en/migration71.other-changes.php#migration71.other-changes.inconsistency-fixes-to-this

Don't think it's worth including. Protects against writing bad code (`$this` can be reasigned, etc).

## OC: Session ID generation without hasing

http://be2.php.net/manual/en/migration71.other-changes.php#migration71.other-changes.session-id-generation-without-hashing

Don't think it's worth including. Won't affect most people as this would probably be abstracted by frameworks.

## OC: Changes to INI file handling

http://be2.php.net/manual/en/migration71.other-changes.php#migration71.other-changes.session-id-generation-without-hashing

Don't think it's worth including. Won't affect most people.

## OC: Session ID generation with CSPRNG only

http://be2.php.net/manual/en/migration71.other-changes.php#migration71.other-changes.session-id-csprng-gen

Don't think it's worth including. Abstracted by frameworks.

## OC: More informative TypeError messages when NULL is allowed

http://be2.php.net/manual/en/migration71.other-changes.php#migration71.other-changes.typeerror-error-messages

Don't think it's worth including. Improves the message of some errors, automatic improvement without needing to know about it.

