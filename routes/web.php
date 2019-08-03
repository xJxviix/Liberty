<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('bienvenida');
});

Auth::routes();
Route::get('/welcome', 'HomeController@index')->name('welcome');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//Usuario Privado
//Route::get('/administrador_editUsers/{id}', 'UserController@edit')->name('editarUsuario')->middleware('auth')->middleware('admin');
//Route::post('/administrador_editUsers/{id}', 'UserController@update')->name('actualizarUsuario')->middleware('auth');
//Route::get('/user_profile', 'UserController@show')->name('perfilDeUsuario')->middleware('auth');

Route::get('/perfilUsuario/{id}', 'UserController@editUser')->name('usuario');
Route::post('/perfilUsuario/{id}', 'UserController@updateUser')->name('usuario');

/**
 * Contactanos
 */
Route::get('/contactanos', function() {
    return view('contactanos');
});


//Administrador - Pagina principal
Route::get('/administrador', 'UserController@administrar')->name('administrar')->middleware('auth');

// Rutas Admin Mostrar Listado
Route::get('/administrador/usuarios', 'UserController@index')->middleware('auth');

// Rutas Admin Create


// Rutas Admin Edit
Route::get('/administrador_editUsers/{id}', 'UserController@edit')->name('editarUsuario')->middleware('auth');
Route::post('/administrador_editUsers/{id}', 'UserController@update')->name('actualizarUsuario')->middleware('auth');

// Rutas Admin Delete

//Usuario
Route::get('users/{id}/destroy',
[
    'uses' => 'UserController@destroy',
    'as' => 'eliminarUsuario'
])->middleware('auth');



