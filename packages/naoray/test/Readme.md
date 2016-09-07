# TestPackage

This is a Test Package for demonstrating a general package development.

# package functionality

To see the functionalities of this package in action go to route **/test**. 

# Structure

You can structure your own packages as you like, just make sure you use the right *namespaces* in all files!

This is the basic structure of this package:
```
composer.json
readme.md

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
          
  resources/
      views/
          test.blade.php
          
  routes/
      web.php
```