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

Auth::routes();

Route::get('/changePassword', 'Auth\ChangePasswordController@index')->name('password.change');
Route::post('/changePassword', 'Auth\ChangePasswordController@changepassword')->name('password.update');

Route::group([ 'as'=>'cliente.', 'prefix'=>'cliente', 'namespace'=>'Cliente', 'middleware'=>['auth', 'cliente'] ],
    function() {
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('create', 'DashboardController@create')->name('create');
        Route::post('create', 'DashboardController@store')->name('store');
        Route::get('edit/{id}', 'DashboardController@edit')->name('edit');
        Route::post('update/{id}', 'DashboardController@update')->name('update');
        Route::delete('delete/{id}', 'DashboardController@delete')->name('delete');
        Route::get('createCoche', 'DashboardController@createCoche')->name('createCoche');
        Route::post('createCoche', 'DashboardController@storeCoche')->name('storeCoche');
        Route::get('editCoche/{id}', 'DashboardController@editCoche')->name('editCoche');
        Route::post('updateCoche/{id}', 'DashboardController@updateCoche')->name('updateCoche');
        Route::delete('deleteCoche/{id}', 'DashboardController@deleteCoche')->name('deleteCoche');
        Route::get('createCita', 'DashboardController@createCita')->name('createCita');
        Route::post('createCita', 'DashboardController@storeCita')->name('storeCita');
        Route::get('editCita/{id}', 'DashboardController@editCita')->name('editCita');
        Route::post('updateCita/{id}', 'DashboardController@updateCita')->name('updateCita');
        Route::delete('deleteCita/{id}', 'DashboardController@deleteCita')->name('deleteCita');
    }
);

Route::group([ 'as'=>'taller.', 'prefix'=>'taller', 'namespace'=>'Taller', 'middleware'=>['auth', 'taller'] ],
    function() {
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('create', 'DashboardController@create')->name('create');
        Route::post('create', 'DashboardController@store')->name('store');
        Route::get('edit/{id}', 'DashboardController@edit')->name('edit');
        Route::post('update/{id}', 'DashboardController@update')->name('update');
        Route::delete('delete/{id}', 'DashboardController@delete')->name('delete');
        Route::get('createEmpleado', 'DashboardController@createEmpleado')->name('createEmpleado');
        Route::post('createEmpleado', 'DashboardController@storeEmpleado')->name('storeEmpleado');
        Route::get('editEmpleado/{id}', 'DashboardController@editEmpleado')->name('editEmpleado');
        Route::post('updateEmpleado/{id}', 'DashboardController@updateEmpleado')->name('updateEmpleado');
        Route::delete('deleteEmpleado/{id}', 'DashboardController@deleteEmpleado')->name('deleteEmpleado');
    }
);