<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function($router){
  $router->group(['prefix' => 'posts'], function($router){
    $router->get('', 'PostsController@index');
    $router->post('add', 'PostsController@create');
    $router->get('show/{id}', 'PostsController@show');
    $router->put('update/{id}', 'PostsController@update');
    $router->delete('delete/{id}', 'PostsController@delete');
  });
  $router->group(['prefix' => 'users'], function($router){
    $router->get('', 'UsersController@index');
    $router->post('add', 'UsersController@create');
    $router->get('show/{id}', 'UsersController@show');
    $router->put('update/{id}', 'UsersController@update');
    $router->delete('delete/{id}', 'UsersController@delete');
  });
});
