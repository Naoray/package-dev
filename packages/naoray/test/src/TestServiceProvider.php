<?php

namespace Naoray\Test;

use Illuminate\Support\ServiceProvider;
use Naoray\Test\Commands\TestCommand;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->publishes([
            __DIR__.'/Config/test.php' => config_path('test.php'),
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'test');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/test'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                commands\TestCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/config/test.php', 'test');

        $this->app->bind('naoray-test', Test::class);
    }
}
