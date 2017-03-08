## Example package development build

*If you have questions, try to find the answers in the [official documentation](https://laravel.com/docs/5.4/packages)*

I had some troubles getting started with package development in **laravel 5.4**, that's why this repository was created.

This repo is for helping you to have a quick and easy start with package development in *laravel 5.3*. It was inspired 
by [jaiwalker](https://github.com/jaiwalker)'s [jaiwalker/setup-laravel5-package](https://github.com/jaiwalker/setup-laravel5-package)

Take a look at the build in package: [Naoray/Test](https://github.com/Naoray/package-dev/tree/master/packages/naoray/test)!

## start developing your own package

### Step 1 : clone repo and install dependencies

`git clone https://github.com/Naoray/package-dev.git`

and install the dependencies through composer:

`composer install`
this will also generate a `key` for your application and copy the `.env.example` file into an `.env` file

### Step 2 :  Create your package sub folder, service provider and facades
 
In root directory create a folder called `packages/your_github_name/your_package_name/src/`
e.g. `root/packages/Naoray/Test/src`
 
Now navigate to the `src` folder and create a file for your service provider, e.g. `TestServiceprovider.php`.
 
To create a ServiceProvider simply run `php artisan make:provider Your_Package_nameProvider` and cut the file from 
`app/providers` to your packages `src/` directory.

Take a look at this [file](https://github.com/Naoray/package-dev/blob/master/packages/naoray/test/src/TestServiceProvider.php) as an example.
   
---
#### Creating Routes

In your `src` folder create a new `routes` folder in which you create your webroutes file named `web.php`.
e.g. like [here](https://github.com/Naoray/package-dev/blob/master/packages/naoray/test/src/routes/web.php)
 
---
#### Creating Controllers

In your `Http` folder create a new directory called `Controllers`. In this folder you can create your controller.
e.g. like [here](https://github.com/Naoray/package-dev/blob/master/packages/naoray/test/src/Http/Controllers/TestController.php)
 
---
#### Creating Config

In your `src` folder create a new directory and call it `config`. In it create a new file (e.g. `test.php`) like [this](https://github.com/Naoray/package-dev/blob/master/packages/naoray/test/src/config/test.php)
   
---
#### Creating Views
 
In your `src` folder create a new directory and call it `resources/` and in this folder create a new folder named `views/`. In the `views/` folder you can create your own custom blade views.
([example file](https://github.com/Naoray/package-dev/blob/master/packages/naoray/test/src/resources/views/test.blade.php)
 
---
#### Creating Commands

Run `php artisan make:command CommandName`, go to `app/Console/` and cut out the `Commands/` folder. Now go to your packages
`src` folder and paste it.

Add the command to the *ServiceProvider*'s *command* array and register the command like in this [file](https://github.com/Naoray/package-dev/blob/master/packages/naoray/test/src/TestServiceProvider.php))
```php
                
    public function register()
    {
        /**
         * some other code ...
         */

        if ($this->app->runningInConsole()) {
            $this->commands([
                commands\TestCommand::class
            ]);
        }
    }
```
 
---
#### Creating Facades

In your `src` folder create a `facades/` folder. Within the `facades/` folder create your facade files.
([example file](https://github.com/Naoray/package-dev/blob/master/packages/naoray/test/src/facades/Test.php)

In your `src` folder create a file named like the *facade* you created before.
([example file](https://github.com/Naoray/package-dev/blob/master/packages/naoray/test/src/Test.php))

**Note:** you have to bind your facade with the 'facade file' in your **ServiceProvider** like:
```
    $this->app->bind('naoray-test', Test::class);
```
The value you use to bind your *facade* has to be the same value like in the `facade`s `getFacadeAccessor()` method. 

### Step 3: init composer

Change to your packages directory and run `composer init`.

Add the following to your packages *composer.json* file:
```
    "autoload": {
        "psr-4": {
            "your_github_name\\your_package_name\\": "src/"
        }
    },
```

### Step 4: Add package path in root composer.json
  
In your root composer.json file add `"Naoray\\Test\\": "packages/naoray/test/src/"` to `psr-4`, like:
```
    "psr-4": {
        "App\\": "app/",
        "your_github_name\\your_package_name\\": "packages/your_github_name/your_package_name/src"
    }
```

### Step 5: add service provider and facade (optional)in app config.

Add `your_github_name\your_package_name\your_packages_service_provider::class,` to the `config/app.php` *providers* 
and to the *aliases* array (optional)array like this:
```
        // providers array
        /*
         * Package Service Providers...
         */

        Naoray\Test\TestServiceProvider::class,
        
       //...
       
       // aliases array
       'Test' => Naoray\Test\Facades\Test::class,
```

### Step 6: load your package

Run `composer dump-autoload` - make sure there are no errors.

Now you are ready to test your package!

## Functionality

This package boilerplate demonstrates some basic functionality usage which you can reuse for your own package development.
Such as using... 

- routes
- config files
- controllers
- views
- facades

## Something missing?

If you want me to add something just open an issue and describe your desire!
