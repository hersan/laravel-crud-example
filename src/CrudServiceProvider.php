<?php

namespace Hersan\CrudExample;

use Illuminate\Support\ServiceProvider;

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
        $this->app->make('Hersan\CrudExample\Http\Controllers\UserController');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'crud');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
