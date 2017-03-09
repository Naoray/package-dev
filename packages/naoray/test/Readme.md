# TestPackage

This is a Test Package for demonstrating a general package development.

# package functionality

There is not much to say about the package functionality. It just spits out some config and facade method output to the view.

*To see the functionalities of this package in action go to route **/test**.*

However this package is not meant to have many functionalities, it should only serve as an example on how to implement basic functionalities in packages.

# Testing

You can test the Naoray/Test package switching to the packages directory and running tests via composer scripts:

```
  cd packages/naoray/test;

  composer run test
```

If you take a look at the package's composer.json, you'll notice I've pulled in phpunit as a testing framework, but also two other *kind of helper* packages to easily test the package functionality.

```
    "require-dev": {
        "phpunit/phpunit": "~5.7",
        "orchestra/testbench": "~3.4",
        "illuminated/testing-tools": "^0.5.5"
    },
```

With [orchestra/testbench](https://github.com/orchestral/) using laravels testing synthax is super easy.

The [illuminated/testing-tools](https://github.com/dmitry-ivanov/laravel-testing-tools) might be an overkill, cause it's only used for artisan commands. However it has far more use cases in real life packages.

# Structure

You can structure your own packages as you like, just make sure you use the right *namespaces* in all files!

This is the basic structure of this package:
```
composer.json
readme.md

resources/
  views/
      test.blade.php


src/

  TestServiceProvider.php
  Test.php
  
  config/
      test.php
      
  facades/
      Test.php
      
  Http/
      Controllers/
          TestController.php
          
          
  routes/
      web.php


tests/

  CommandTest.php
  ConfigTest.php
  FacadeTest.php
  RouteTest.php
  TestCase.php
```