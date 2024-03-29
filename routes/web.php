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
Route::get('/', 'FrontController@index');

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

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/*
Perfil Usuario - Registrado - OK
*/
Route::get('/perfilUsuario/{id}', 'UserController@editUser')->middleware('auth');
Route::post('/perfilUsuario/{id}', 'UserController@updateUser')->middleware('auth');
Route::get('/user_profile_reservations/{id}', 'UserController@userReservation')->middleware('auth');

/**
 * Reservar Mesa 
 */
Route::get('/reserva', 'ReservationController@index');
Route::post('/crearReserva', 'ReservationController@store')->name('crearReserva');
Route::post('/crearReserva_user', 'ReservationController@userReservation')->name('addReserva');

/**
 * Actividades
 */
Route::get('/actividades','ActivityController@index')->name('actividades')->middleware('auth');
Route::get('/actividades/Inscribirse/{id}', 'InscriptionController@reserva')->name('inscribir_actividad')->middleware('auth');

Route::post('/actividades/reservaActividad/{id}', 'InscriptionController@inscriptionToActivity')->name('reserva_actividad')->middleware('auth');
Route::post('/actividades/reservaActividad/{id}/{email}', 'InscriptionController@inscriptionToActivity')->name('reservar_actividad')->middleware('auth');


/**
 * PERFIL USUARIO REGISTRADO
 */
Route::get('/user_profile/{id}', 'UserController@index')->name('userProfile')->middleware('auth');


/**                 **
 *   Administrador  **
 *                  **/

//Admin Dashboard
Route::get('/administrar', 'UserController@dashboard')->name('administrar')->middleware('auth')->middleware('admin');

// Mostrar Listado
Route::get('/administrador/usuarios', 'UserController@adminIndex')->name('mostrarUsuario')->middleware('auth')->middleware('admin');
Route::get('/administrador/categorias', 'CategoryController@adminIndex')->name('mostrarCategoria')->middleware('auth')->middleware('admin');
Route::get('/administrador/reservas', 'ReservationController@adminIndex')->name('mostrarReserva')->middleware('auth')->middleware('admin');
Route::get('/administrador/productos', 'ProductController@adminIndex')->name('mostrarProducto')->middleware('auth')->middleware('admin');
Route::get('/administrador/actividades', 'ActivityController@adminIndex')->name('listarActividadesAdmin')->middleware('auth')->middleware('admin');

// CRUD USUARIOS - OK
Route::get('/administrador_createUser', 'UserController@create')->name('AñadirUsuario')->middleware('auth')->middleware('admin');
Route::post('/administrador_addUser', 'UserController@store')->name('crearUsuario')->middleware('auth')->middleware('admin');
Route::get('/administrador_editUsers/{id}', 'UserController@edit')->name('editarUsuario')->middleware('auth')->middleware('admin');
Route::post('/administrador_editUsers/{id}', 'UserController@update')->name('actualizarUsuario')->middleware('auth')->middleware('admin');
Route::get('users/{id}/destroy',
[
    'uses' => 'UserController@destroy',
    'as' => 'eliminarUsuario'
])->middleware('auth')->middleware('admin');


// CRUD CATEGORIAS - OK
Route::get('/administrador_createCategory', 'CategoryController@create')->name('AñadirCategoria')->middleware('auth')->middleware('admin');
Route::post('/administrador_addCategory', 'CategoryController@store')->name('crearCategoria')->middleware('auth')->middleware('admin');
Route::get('/administrador_editCategory/{id}', 'CategoryController@edit')->name('editarCategoria')->middleware('auth')->middleware('admin');
Route::post('/administrador_editCategory/{id}', 'CategoryController@update')->name('actualizarCategoria')->middleware('auth')->middleware('admin');
Route::get('categories/{id}/destroy',
[
    'uses' => 'CategoryController@destroy',
    'as' => 'eliminarCategoria'
])->middleware('auth')->middleware('admin');

// CRUD PRODUCTOS - OK
Route::get('/administrador_createProduct', 'ProductController@create')->name('AñadirProducto')->middleware('auth')->middleware('admin');
Route::post('/administrador_addProduct', 'ProductController@store')->name('crearProducto')->middleware('auth')->middleware('admin');

Route::get('/administrador_editProduct/{id}', 'ProductController@edit')->name('editarProducto')->middleware('auth')->middleware('admin');
Route::post('/administrador_editProduct/{id}', 'ProductController@update')->name('actualizarProducto')->middleware('auth')->middleware('admin');
Route::get('products/{id}/destroy',
[
    'uses' => 'ProductController@destroy',
    'as' => 'eliminarProducto'
])->middleware('auth')->middleware('admin');

//CRUD RESERVAS - OK
Route::post('/administrador_editReservation/{id}', 'ReservationController@status')->name('confirmarReserva')->middleware('auth')->middleware('admin');
Route::get('reservations/{id}/destroy',
[
    'uses' => 'ReservationController@destroy',
    'as' => 'eliminarReserva'
])->middleware('auth')->middleware('admin');

// CRUD ACTIVIDAD

Route::get('/administrador_createActivity', 'ActivityController@create')->name('AñadirActividad')->middleware('auth');
Route::post('/administrador_addActivity', 'ActivityController@store')->name('crearActividad')->middleware('auth');
Route::get('/administrador_editActivity/{id}', 'ActivityController@edit')->name('editarActividad')->middleware('auth');
Route::post('/administrador_editActivity/{activity}', 'ActivityController@update')->name('actualizarActividad')->middleware('auth');
Route::get('/administrador_deleteActivity/{id}', 'ActivityController@destroy')->name('eliminarActividad')->middleware('auth');