<?php

require_once __DIR__.'/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    realpath(__DIR__.'/../')
);

//$app->withFacades();
//
//$app->withEloquent();
//
//$app->configure('database');

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

// $app->middleware([
//    App\Http\Middleware\ExampleMiddleware::class
// ]);

// $app->routeMiddleware([
//     'auth' => App\Http\Middleware\Authenticate::class,
// ]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

/**
 * Has to come first.
 */
//$app->register(LaravelDoctrine\ORM\DoctrineServiceProvider::class);
//$app->register(LaravelDoctrine\Extensions\GedmoExtensionsServiceProvider::class);
//$app->register(LaravelDoctrine\Extensions\BeberleiExtensionsServiceProvider::class);

/**
 *
 */
$app->register(App\Providers\AppServiceProvider::class);
$app->register(App\Providers\AuthServiceProvider::class);
$app->register(App\Providers\EventServiceProvider::class);


/**
 * Facades
 */
//class_alias('LaravelDoctrine\ORM\Facades\EntityManager', 'EntityManager');
//class_alias('LaravelDoctrine\ORM\Facades\Registry', 'Registry');
//class_alias('LaravelDoctrine\ORM\Facades\Doctrine', 'Doctrine');



/**
 *
 */
//$app['Dingo\Api\Auth\Auth']->extend('oauth', function ($app) {
//    return new Dingo\Api\Auth\Provider\JWT($app['Tymon\JWTAuth\JWTAuth']);
//});
//
//$app['Dingo\Api\Http\RateLimit\Handler']->extend(function ($app) {
//    return new Dingo\Api\Http\RateLimit\Throttle\Authenticated;
//});
//
//$app['Dingo\Api\Transformer\Factory']->setAdapter(function ($app) {
//    $fractal = new League\Fractal\Manager;
//
//    $fractal->setSerializer(new League\Fractal\Serializer\JsonApiSerializer);
//
//    return new Dingo\Api\Transformer\Adapter\Fractal($fractal);
//});
//
//$app['Dingo\Api\Exception\Handler']->setErrorFormat([
//    'error' => [
//        'message' => ':message',
//        'errors' => ':errors',
//        'code' => ':code',
//        'status_code' => ':status_code',
//        'debug' => ':debug'
//    ]
//]);

//$app->register(Dingo\Api\Provider\LumenServiceProvider::class);
//
//
//app('Dingo\Api\Transformer\Factory')->register(\Domain\Entities\User::class, \Domain\Transformers\UserTransformer::class);


/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->group(['namespace' => 'App\Http\Controllers'], function ($app) {
    require __DIR__.'/../app/Http/routes.php';
});

return $app;
