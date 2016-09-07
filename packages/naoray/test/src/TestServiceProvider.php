<?php

namespace Naoray\Test;

use Illuminate\Support\ServiceProvider;
use Naoray\Test\Commands\TestCommand;

class TestServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Naoray\Test\Http\Controllers';

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [
        'Test' => 'command.test.test',
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            $this->mapWebRoutes();
        }

        $this->publishes([
            __DIR__.'/Config/test.php' => config_path('test.php'),
        ]);

        $this->loadViewsFrom(__DIR__.'/resources/views', 'test');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Config
        $this->mergeConfigFrom( __DIR__.'/Config/test.php', 'test');

        $this->app->bind('naoray-test', function() {
            return new Test;
        });

        $this->registerCommands();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        \Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require __DIR__.'/routes/web.php';
        });
    }

    /**
     * Register the given commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        foreach (array_keys($this->commands) as $command) {
            $method = "register{$command}Command";
            call_user_func_array([$this, $method], []);
        }

        $this->commands(array_values($this->commands));
    }

    /**
     * Register the test command
     */
    protected function registerTestCommand()
    {
        $this->app->singleton('command.test.test', function () {
            return new TestCommand();
        });
    }
}
