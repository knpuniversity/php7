# Scalar Type Hints

Of course the big big feature of php7 is scaler type hinting and return types. And these are actually really cool, but there is a little bit pf complexity to them. Let's try out scaler type hinting.  Inside SFC, Appplebundle, Controller, Genus Controller; I am just going to crate a new page for us to play with.

Okay, the public function types example action ... And above that I will add an @route ... or /types.

In one of the classes, normal php7 classes that I have is called in this proxy Genus. And it just holds a bunch of data by genu which is a type of animal classification. It has an ID, it has a name, it has a species count, fun fact, etc.

So since we are here, let's create a new genus. Genus equals new genus ... and I'll say genus set name, which we know should be a string but instead I am going to pass the number four and down below I am going to [inaudible 00:01:22] genus and say "Die."

Cool.

So in our browser, lets go to to/types and see what happens. Not surprisingly, php allows us to do this. Even though we think a name is a string, we can pass whatever we want. And notice that it does show up as an INT so the name property is in fact an INT.

In php7, we can now go into any of our methods, like "set name" and we can type hint the argument with a scaler. A scaler. Now notice php [inaudible 00:02:13] are angry about this. So say scaler type hints are only available on php7, if you get this you go into your settings and comma in MAC. I'll search php up here ... Down below in languages and frameworks, we can put this all the way up to 7.1, so we will be using 7.1 features, as well.

Perfect!

Now with just that one change, go back and refresh and watch closely. Watch the name integer four. Now it's a string four.

You see, the new type system has two modes. The weak mode and the strict mode and the weak mode is used by default. When you use the weak mode it means that php will try to coerce the value into this type so we pass integer and it tries to cast that to be a string. And we are used to this. This is how php works. We can very easily see what happens when you print and integer, when you are trying print an integer, php changes it to a string and then prints it, so that's what happens.

If you use strict mode, however, then instead of it changing from an integer to a sting, it will throw an error. A type error. How do we activate strict mode? At the top of genus make the very very first thing in the file say "Declare use strict types=1". It looks weird, but that is the key. It has to be the first thing in the file.

Now check this out. If we refresh still no error. So, what's the deal? We'll copy that line and go to genus controller and put it at the top of genus controller. Now hit refresh.

Boom!

This is the error we expected. Type error. Argument one, "path to set name must be type string integer gamma."

So the importance here is that the strict type is added to the file where we passed the value not actually the file where do the type hint.  An this is one of the weird things about type hint, you have to opt into in this strange way. It's done that way on purpose. Because imagine if you are using weak type hint in your applications so you don't really care if name is a string or an integer and you want to use some external library and they are using strict type hinting in that library. Well that is going to cause you a lot of problems because you are going to get a lot of errors when you deal with that library. So it gives the developer the ability to opt in to strict mode for whatever code that they are using.  So it is a little strange, but works really well in practice.

Now the on thing you can remember about strict mode versus weak mode is that is whether or not you have a problem with weak mode. If you have been using php for years and you have not had problems with php automatically changing your integers to strings, then you might not need strict mode. When you enable strict mode, it is going to make your code more predictable. Its not going to carry your code tighter but you are going to see a lot more errors that you're going to need to correct yourself so use strict mode wisely.

