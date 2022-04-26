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


$app->get('/', function () use ($app) {
    return 'blog';
});

$app->post('/user', adr(CreateUserAction))
resource('/user', 'UserController');


function resource($uri, $controller)
{
    global $app;
    $pre = ''; //App\Http\Controllers\\

    $app->get($uri, $pre . $controller.'@index');
    $app->post($uri, $pre.$controller.'@store');
    $app->get($uri.'/{id}', $pre.$controller.'@show');
    $app->put($uri.'/{id}', $pre.$controller.'@update');
    $app->patch($uri.'/{id}', $pre.$controller.'@update');
    $app->delete($uri.'/{id}', $pre.$controller.'@destroy');
}

function adr($class)
{
    global $app;

    return function() use($app, $class){
        return $app->call([$app->make($class), 'handle']);
    };
}
