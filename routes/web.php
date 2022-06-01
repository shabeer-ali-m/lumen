<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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



$router->get('/createToken', [
    'uses' => 'AdminController@createToken',
]);

$router->get('/v1/hello', [
        'uses' => 'ApiController@hello',
    ]);

/*
* middleware [auth:cache, auth:token]
*/
$router->group(['middleware' => 'auth:token'], function () use ($router) {
    
    $router->get('/api/hello', [
        'uses' => 'ApiController@hello',
    ]);
});