<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('u/{id}', function($id){
    $user = User::find($id);
    if ($user) {
        return View::make('u')->with('user', $user);
    } else {
        App::abort(404, 'Page not found');
    }
})->where('id', '[0-9]+');

Route::controller('accounts', 'AccountsController');