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
    $posts = Post::orderBy('created_at', 'desc')->paginate(10);
    return View::make('index', array('posts'=>$posts));
});

Route::get('u/{id}', array('as'=>'u', function($id){
    $user = User::findOrFail($id);
    /* @var $user User */
    $posts = Post::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->paginate(10);
    return View::make('u', array('user'=>$user, 'posts'=>$posts));
}))->where('id', '[0-9]+');

Route::get('pet/{id}', array('as'=>'pet', function($id){
    $pet = Pet::findOrFail($id);
    /* @var $pet Pet */
    $posts = Post::where('pet_id', '=', $pet->id)->orderBy('created_at', 'desc')->paginate(10);
    return View::make('pet', array('pet'=>$pet, 'posts'=>$posts));
}))->where('id', '[0-9]+');

Route::controller('pet', 'PetController');

Route::controller('accounts', 'AccountsController');

Route::controller('post', 'PostController');