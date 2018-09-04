<?php

namespace Hersan\CrudExample;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->publishTests();
        $this->publishViews();
        $this->publishConfig();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/crud.php', 'crud');
        //dd(config('crud.authentication'));
        $this->registerRouteMacro();
        $this->resolvingControllers();
    }

    public function publishTests()
    {
        $this->publishes([
            __DIR__.'/../tests' => base_path('tests'),
        ], 'crudtests');
    }

    public function publishViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'crud');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/crud'),
        ], 'crud');
    }

    public function publishConfig()
    {
        $this->publishes([__DIR__.'/../config/crud.php' => config_path('crud.php')], 'crud');
    }

    public function resolvingControllers()
    {
        $this->app->make('Hersan\CrudExample\Http\Controllers\UserController');
    }

    public function registerRouteMacro()
    {
        Route::macro('crudRoutes', function(){

            Route::middleware(config('crud.authentication'))
                ->namespace('Hersan\CrudExample\Http\Controllers')
                ->group(function(){
                    Route::resource('users', 'UserController');
                });

        });
    }
}
