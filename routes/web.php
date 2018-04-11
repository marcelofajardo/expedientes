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
    return view('welcome');
});
Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@store');

Route::group(['middleware' => 'web'], function () {

});


Route::group(['middleware' => 'auth'], function () {

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['prefix' => 'rol'], function () {

    Route::get('listado', 'RolController@index')->name('rol.index');
    Route::get('nueva', 'RolController@create')->name('rol.create');
    Route::post('nueva', 'RolController@store')->name('rol.store');
    Route::get('editar/{rol}', 'RolController@edit')->name('rol.edit');
    Route::get('ver/{rol}', 'RolController@show')->name('rol.show');
    Route::patch('editar/{rol}', 'RolController@update')->name('rol.update');
    Route::get('eliminar/{rol}', 'RolController@destroy')->name('rol.delete');
    Route::get('restaurar', 'RolController@eliminated')->name('rol.eliminated');
    Route::get('restore/{rol}', 'RolController@restore')->name('rol.restore');

});


Route::group(['prefix' => 'expediente'], function () {

    Route::get('listado', 'ExpedienteController@index')->name('expediente.index');
    Route::get('nueva', 'ExpedienteController@create')->name('expediente.create');
    Route::post('nueva', 'ExpedienteController@store')->name('expediente.store');
    Route::get('editar/{expediente}', 'ExpedienteController@edit')->name('expediente.edit');
    Route::get('ver/{expediente}', 'ExpedienteController@show')->name('expediente.show');
    Route::patch('editar/{expediente}', 'ExpedienteController@update')->name('expediente.update');
    Route::get('eliminar/{expediente}', 'ExpedienteController@destroy')->name('expediente.delete');
    Route::get('restaurar', 'ExpedienteController@eliminated')->name('expediente.eliminated');
    Route::get('restore/{expediente}', 'ExpedienteController@restore')->name('expediente.restore');
});


Route::group(['prefix' => 'tipoexpediente'], function () {

    Route::get('listado', 'TipoExpedienteController@index')->name('tipoexpediente.index');
    Route::get('nueva', 'TipoExpedienteController@create')->name('tipoexpediente.create');
    Route::post('nueva', 'TipoExpedienteController@store')->name('tipoexpediente.store');
    Route::get('editar/{tipoExpediente}', 'TipoExpedienteController@edit')->name('tipoexpediente.edit');
    Route::get('ver/{tipoExpediente}', 'TipoExpedienteController@show')->name('tipoexpediente.show');
    Route::patch('editar/{tipoExpediente}', 'TipoExpedienteController@update')->name('tipoexpediente.update');
    Route::get('eliminar/{tipoExpediente}', 'TipoExpedienteController@destroy')->name('tipoexpediente.delete');
    Route::get('restaurar', 'TipoExpedienteController@eliminated')->name('tipoexpediente.eliminated');
    Route::get('restore/{tipoExpediente}', 'TipoExpedienteController@restore')->name('tipoexpediente.restore');

});

Route::group(['prefix' => 'task'], function () {

    Route::get('listado', 'TaskController@index')->name('task.index');
    Route::get('nueva', 'TaskController@create')->name('task.create');
    Route::post('nueva', 'TaskController@store')->name('task.store');
    Route::get('editar/{task}', 'TaskController@edit')->name('task.edit');
    Route::get('ver/{task}', 'TaskController@show')->name('task.show');
    Route::patch('editar/{task}', 'TaskController@update')->name('task.update');
    Route::get('eliminar/{task}', 'TaskController@destroy')->name('task.delete');
    Route::get('restaurar', 'TaskController@eliminated')->name('task.eliminated');
    Route::get('restore/{task}', 'TaskController@restore')->name('task.restore');

});

Route::group(['prefix' => 'user'], function () {

    Route::get('listado', 'UserController@index')->name('user.index');
    Route::get('nueva', 'UserController@create')->name('user.create');
    Route::post('nueva', 'UserController@store')->name('user.store');
    Route::get('editar/{user}', 'UserController@edit')->name('user.edit');
    Route::get('ver/{user}', 'UserController@show')->name('user.show');
    Route::patch('editar/{user}', 'UserController@update')->name('user.update');
    Route::get('eliminar/{user}', 'UserController@destroy')->name('user.delete');
    Route::get('restaurar', 'UserController@eliminated')->name('user.eliminated');
    Route::get('restore/{user}', 'UserController@restore')->name('user.restore');

});

Route::group(['prefix' => 'notificacion'], function () {

    Route::get('listado', 'NotificacionController@index')->name('notificacion.index');
    Route::get('nueva', 'NotificacionController@create')->name('notificacion.create');
    Route::post('nueva', 'NotificacionController@store')->name('notificacion.store');
    Route::get('editar/{notificacion}', 'NotificacionController@edit')->name('notificacion.edit');
    Route::get('ver/{notificacion}', 'NotificacionController@show')->name('notificacion.show');
    Route::patch('editar/{notificacion}', 'NotificacionController@update')->name('notificacion.update');
    Route::get('eliminar/{notificacion}', 'NotificacionController@destroy')->name('notificacion.delete');
    Route::get('restaurar', 'NotificacionController@eliminated')->name('notificacion.eliminated');
    Route::get('restore/{notificacion}', 'NotificacionController@restore')->name('notificacion.restore');

});

});
/*
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
