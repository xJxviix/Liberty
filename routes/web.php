<?php

use Illuminate\Http\Request;
use Liberty\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
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

/*
* WELCOME
*/
Route::get('/', function () {
    return view('bienvenida');
});

/*
* Contactanos - OK
*/
Route::get('/contactanos', 'ContactMailController@index');
Route::post('/contactanos', 'ContactMailController@create');

/**
 * Productos - OK
 */
Route::get('/productos', 'ProductController@index')->name('productoss');

Auth::routes();
//Route::get('/', 'HomeController@index')->name('welcome');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

/*
Perfil Usuario - Registrado - OK
*/
Route::get('/perfilUsuario/{id}', 'UserController@editUser')->middleware('auth');
Route::post('/perfilUsuario/{id}', 'UserController@updateUser')->middleware('auth');

/**
 * Reservar Mesa 
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


/**                 **
 *   Administrador  **
 *                  **/

//Admin Dashboard
Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
Route::get('/administrar', 'UserController@dashboard')->name('administrar')->middleware('auth');

// Mostrar Listado
Route::get('/administrador/usuarios', 'UserController@adminIndex')->name('mostrarUsuario')->middleware('auth');
Route::get('/administrador/categorias', 'CategoryController@adminIndex')->name('mostrarCategoria')->middleware('auth');
Route::get('/administrador/reservas', 'ReservationController@adminIndex')->name('mostrarReserva')->middleware('auth');
Route::get('/administrador/productos', 'ProductController@adminIndex')->name('mostrarProducto')->middleware('auth');


Route::get('/administrador/actividades', 'ActivityController@listarActividadesAdmin')->name('listarActividadesAdmin')->middleware('auth');

// CRUD USUARIOS - OK
Route::get('/administrador_createUser', 'UserController@create')->name('AñadirUsuario')->middleware('auth');
Route::post('/administrador_addUser', 'UserController@store')->name('crearUsuario')->middleware('auth');
Route::get('/administrador_editUsers/{id}', 'UserController@edit')->name('editarUsuario')->middleware('auth');
Route::post('/administrador_editUsers/{id}', 'UserController@update')->name('actualizarUsuario')->middleware('auth');
Route::get('users/{id}/destroy',
[
    'uses' => 'UserController@destroy',
    'as' => 'eliminarUsuario'
])->middleware('auth');


// CRUD CATEGORIAS - OK
Route::get('/administrador_createCategory', 'CategoryController@create')->name('AñadirCategoria')->middleware('auth');
Route::post('/administrador_addCategory', 'CategoryController@store')->name('crearCategoria')->middleware('auth');
Route::get('/administrador_editCategory/{id}', 'CategoryController@edit')->name('editarCategoria')->middleware('auth');
Route::post('/administrador_editCategory/{id}', 'CategoryController@update')->name('actualizarCategoria')->middleware('auth');
Route::get('categories/{id}/destroy',
[
    'uses' => 'CategoryController@destroy',
    'as' => 'eliminarCategoria'
])->middleware('auth');

// CRUD PRODUCTOS
Route::get('/administrador_createProduct', 'ProductController@create')->name('AñadirProducto')->middleware('auth');
Route::post('/administrador_addProduct', 'ProductController@store')->name('crearProducto')->middleware('auth');
Route::get('/administrador_editProduct/{id}', 'ProductController@edit')->name('editarProducto')->middleware('auth');
Route::post('/administrador_editProduct/{id}', 'ProductController@update')->name('actualizarProducto')->middleware('auth');
Route::get('products/{id}/destroy',
[
    'uses' => 'ProductController@destroy',
    'as' => 'eliminarProducto'
])->middleware('auth');

//CRUD RESERVAS - OK
Route::post('/administrador_editReservation/{id}', 'ReservationController@status')->name('confirmarReserva')->middleware('auth');
Route::get('reservations/{id}/destroy',
[
    'uses' => 'ReservationController@destroy',
    'as' => 'eliminarReserva'
])->middleware('auth');

// CRUD ACTIVIDAD - EMPEZAR ADAPTAR A LA VISTA DEL ADMIN CENTER
Route::get('/administrador_editActivity/{id}', 'ActivityController@edit')->name('editarActividad')->middleware('auth');
Route::post('/administrador_createActivity', 'ActivityController@store')->name('crearActividad')->middleware('auth');
Route::post('/administrador_editActivity/{activity}', 'ActivityController@update')->name('actualizarActividad')->middleware('auth');
Route::get('/administrador_deleteActivity/{id}', 'ActivityController@destroy')->name('eliminarActividad')->middleware('auth');