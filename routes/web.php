<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])
    ->namespace('Hersan\CrudExample\Http\Controllers')
    ->group(function(){
        Route::resource('users', 'UserController');
    });