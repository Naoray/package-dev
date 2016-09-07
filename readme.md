# Example package development build

I had some troubles getting started with package development in **laravel 5.3**, that's why this repository was created.

Take a look at the build in package: [Naoray/Test](https://github.com/Naoray/package-dev/tree/master/packages/naoray/test)!

# Functionality

This package boilerplate demonstrates some basic functionality usage which you can reuse for your own package development.
Such as using... 

- routes
- config files
- controllers
- views
- facades

# start with your own package development

1. clone this repo
2. add a new folder to `packages/` with `packages/your_github_name/your_package_name/src/`
3. change to `your_package_name/` and run `init composer`
4. add the following to your packages *composer.json* file:
```
    "autoload": {
        "psr-4": {
            "your_github_name\\your_package_name\\": "src/"
        }
    },
```
5. create the packages *ServiceProvider* , *Class* and *facade* (take a look at *naoray/test/src/*)
6. add `your_github_name\your_package_name\your_packages_service_provider::class,` to the `config/app.php` *providers* 
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
7. open your projects *composer.json* file and make it look like this:
```
    "psr-4": {
        "App\\": "app/",
        "your_github_name\\your_package_name\\": "packages/your_github_name/your_package_name/src"
    }
```
8. run `composer dump-autoload`

Now you are ready to start developing your package!

# Something missing?

If you want me to add something just open an issue and describe your desire!
