<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


$app->get('auth/log', ['uses' => 'App\Http\Controllers\Auth\AuthController@getLog']);
$app->post('auth/login', ['uses' => 'App\Http\Controllers\Auth\AuthController@postLogin']);
$app->get('auth/logout', ['uses' => 'App\Http\Controllers\Auth\AuthController@getLogout']);
// $app->get('auth/register', ['uses' => 'App\Http\Controllers\Auth\AuthController@getRegister']);
$app->post('auth/register', ['uses' => 'App\Http\Controllers\Auth\AuthController@postRegister']);

$app->get('password/email', ['uses' => 'App\Http\Controllers\Auth\PasswordController@getEmail']);
$app->post('password/email', ['uses' => 'App\Http\Controllers\Auth\PasswordController@postEmail']);
$app->get('password/reset/{token}', ['uses' => 'App\Http\Controllers\Auth\PasswordController@getReset']);
$app->post('password/reset', ['uses' => 'App\Http\Controllers\Auth\PasswordController@postReset']);
$app->post('contactar', ['uses' => 'App\Http\Controllers\UserController@contacto']);
$app->post('mostrarTabla', ['uses' => 'App\Http\Controllers\UserController@mostrarTabla']);

$app->get('producto/finalizado/{id}', ['uses' => 'App\Http\Controllers\ProductoController@productoFinalizado']);

// Ruta para enviar al usuario cuando compra puntos
$app->get('compra_realizada', ['uses' => 'App\Http\Controllers\UserController@compraRealizada']);


$app->get('/', ['middleware' => 'ifAuth', function() {
	return view("index");
}]);

$app->get('/faq', function() use ($app) {
	return view("faq");
});
$app->get('/condiciones', function() use ($app) {
	return view("condicionesGeneralesyPrivacidad");
});

$app->get('/productos', 'App\Http\Controllers\ProductoController@muestraTodosLosProductos');

$app->get('/perfil', ['middleware' => 'needAuth', 'uses' => 'App\Http\Controllers\UserController@mostrarPerfil']);

$app->post('/actualizarPerfil', 'App\Http\Controllers\UserController@actualizarPerfil');

$app->post('/usuario/pujar', 'App\Http\Controllers\UserController@realizarPuja');



$app->get('/producto/{id}', 'App\Http\Controllers\ProductoController@muestraUnProducto');

$app->post('/user', 'App\Http\Controllers\UserController@puja');


$app->get("/prova", function() use($app) {
	//$request = \Illuminate\Http\Request::create('https://serene-refuge-3117.herokuapp.com/update', 'GET', ['param1' => 'value1', 'param2' => 'value2']);
	
});

$app->get('/cookies', function() use ($app) {
	return view("politicaCookies");
});



