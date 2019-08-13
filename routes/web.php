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

/*
Perfil Usuario
*/
Route::get('/perfilUsuario/{id}', 'UserController@editUser')->middleware('auth');
Route::post('/perfilUsuario/{id}', 'UserController@updateUser')->middleware('auth');


/**
 * Contactanos
 */
Route::get('/contactanos', function() {
    return view('contactanos');
});

/**
 * Productos
 */
Route::get('/productos', 'ProductController@index');

/**
 * Reservar Mesa 
 * Route::get('/reserva', 'ReservationController@index');
*  Route::get('/reservation','ReservationController@reserve')->name('reserve');

 */
Route::get('/reserva', 'ReservationController@index');
Route::post('/crearReserva', 'ReservationController@store')->name('crearReserva');

/**
 * Actividades
 */
Route::get('/actividades','ActivityController@index');
Route::get('/actividades/reservaActividad/{id}', 'InscriptionController@reserva')->name('reserva_actividad')->middleware('auth');
Route::post('/actividades/reservaActividad/{id}', 'InscriptionController@inscriptionToActivity')->name('reserva_actividad')->middleware('auth');
Route::post('/actividades/reservaActividad/{id}/{email}', 'InscriptionController@inscriptionToActivity')->name('reservar_actividad')->middleware('auth');

//Administrador - Pagina principal
Route::get('/administrador', 'UserController@administrar')->name('administrar')->middleware('auth');
Route::get('/administrar', 'UserController@dashboard')->name('administrar')->middleware('auth');

// Rutas Admin Mostrar Listado
Route::get('/administrador/usuarios', 'UserController@adminIndex')->name('mostrarUsuario')->middleware('auth');
Route::get('/administrador/actividades', 'ActivityController@listarActividadesAdmin')->name('listarActividadesAdmin')->middleware('auth');
Route::get('/administrador/productos', 'ProductController@adminIndex')->middleware('auth');
Route::get('/administrador/categorias', 'CategoryController@adminIndex')->name('mostrarCategoria')->middleware('auth');
Route::get('/administrador/reservas', 'ReservationController@adminIndex')->middleware('auth');

// Usuarios
Route::get('/administrador_createUser', 'UserController@create')->name('AñadirUsuario')->middleware('auth');
Route::post('/administrador_addUser', 'UserController@store')->name('crearUsuario')->middleware('auth');
Route::get('/administrador_editUsers/{id}', 'UserController@edit')->name('editarUsuario')->middleware('auth');
Route::post('/administrador_editUsers/{id}', 'UserController@update')->name('actualizarUsuario')->middleware('auth');
Route::get('users/{id}/destroy',
[
    'uses' => 'UserController@destroy',
    'as' => 'eliminarUsuario'
])->middleware('auth');

//Productos

Route::post('/administrador_createProduct', 'ProductController@store')->name('crearProducto')->middleware('auth');

//Categorias
Route::get('/administrador_createCategory', 'CategoryController@create')->name('AñadirCategoria')->middleware('auth');
Route::post('/administrador_createCategory', 'CategoryController@store')->name('crearCategoria')->middleware('auth');
Route::get('/administrador_editCategory/{id}', 'CategoryController@edit')->name('editarCategoria')->middleware('auth');
Route::post('/administrador_editCategory/{id}', 'CategoryController@update')->name('actualizarCategoria')->middleware('auth');
Route::get('categories/{id}/destroy',
[
    'uses' => 'CategoryController@destroy',
    'as' => 'eliminarCategoria'
])->middleware('auth');


//Reservas

Route::post('/administrador_createReservation', 'ReservationController@reserve')->name('añadirReservas')->middleware('auth');
Route::get('/administrador_editReservation/{id}', 'ReservationController@edit')->name('editarReserva')->middleware('auth');
Route::post('/administrador_editReservation/{id}', 'ReservationController@update')->name('actualizarReserva')->middleware('auth');
Route::get('reservations/{id}/destroy',
[
    'uses' => 'ReservationController@destroy',
    'as' => 'eliminarReserva'
])->middleware('auth');



// Actividad - CRUD - Actividad
Route::get('/administrador_editActivity/{id}', 'ActivityController@edit')->name('editarActividad')->middleware('auth');
Route::post('/administrador_createActivity', 'ActivityController@store')->name('crearActividad')->middleware('auth');
Route::post('/administrador_editActivity/{activity}', 'ActivityController@update')->name('actualizarActividad')->middleware('auth');
Route::get('/administrador_deleteActivity/{id}', 'ActivityController@destroy')->name('eliminarActividad')->middleware('auth');




