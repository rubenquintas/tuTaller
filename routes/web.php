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
    }
);

Route::group([ 'as'=>'taller.', 'prefix'=>'taller', 'namespace'=>'Taller', 'middleware'=>['auth', 'taller'] ],
    function() {
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('create', 'DashboardController@create')->name('create');
        Route::post('create', 'DashboardController@store')->name('store');
        Route::get('edit/{id}', 'DashboardController@edit')->name('edit');
        Route::post('update/{id}', 'DashboardController@update')->name('update');
    }
);

Route::group([ 'as'=>'concesionario.', 'prefix'=>'concesionario', 'namespace'=>'Concesionario', 'middleware'=>['auth', 'concesionario'] ],
    function() {
        Route::get('dashboard','DashboardController@index')->name('dashboard');
    }
);

Route::group([ 'as'=>'compraventa.', 'prefix'=>'compraventa', 'namespace'=>'Compraventa', 'middleware'=>['auth', 'compraventa'] ],
    function() {
        Route::get('dashboard','DashboardController@index')->name('dashboard');
    }
);

Route::group([ 'as'=>'recambios.', 'prefix'=>'recambios', 'namespace'=>'Recambios', 'middleware'=>['auth', 'recambios'] ],
    function() {
        Route::get('dashboard','DashboardController@index')->name('dashboard');
    }
);