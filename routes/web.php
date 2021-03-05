<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', function () {return redirect('admin');});

Route::group(['prefix' => 'admin/auth'], function () {
    Route::match(['get', 'post'], 'login', 'admin\AuthController@login');
    Route::match(['get', 'post'], 'reset', 'admin\AuthController@reset');
    Route::match(['get', 'post'], 'register', 'admin\AuthController@register');
    Route::get('logout', 'admin\AuthController@logout');
});

Route::group(['prefix' => 'admin', 'middleware' => 'App\Http\Middleware\BasicAuth'], function () {

    Route::get('/', function () {return redirect('/admin/user/index');});

    //Changer de mot de passe 
    Route::match(['get', 'post'], 'auth/change-password', 'admin\AuthController@changePassword');

    Route::group(['prefix' => 'profilUser'], function () {
        Route::match(['get', 'post'], '/', 'admin\ProfilUserController@show');
        Route::match(['get', 'post'], 'edit', 'admin\ProfilUserController@edit');
        Route::match(['get', 'post'], 'delete',  'admin\ProfilUserController@delete');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'admin\UserController@index');
        Route::get('index', 'admin\UserController@index');
        Route::get('create', 'admin\UserController@create');
        Route::post('store', 'admin\UserController@store');
        Route::get('edit/{id}', 'admin\UserController@edit');
        Route::post('update/{id}', 'admin\UserController@update');
        Route::get('delete/{id}', 'admin\UserController@delete');
    });

    Route::group(['prefix' => 'projet'], function () {
        Route::get('/', 'admin\ProjetController@index');
        Route::get('index', 'admin\ProjetController@index');
        Route::get('create', 'admin\ProjetController@create');
        Route::post('store', 'admin\ProjetController@store');
        Route::get('edit/{id}', 'admin\ProjetController@edit');
        Route::post('update/{id}', 'admin\ProjetController@update');
        Route::get('delete/{id}', 'admin\ProjetController@delete');
    });

    Route::group(['prefix' => 'log'], function () {
        Route::get('/', 'admin\LogController@index');
        Route::get('index', 'admin\LogController@index');
        Route::get('create', 'admin\LogController@create');
        Route::post('store', 'admin\LogController@store');
        Route::get('edit/{id}', 'admin\LogController@edit');
        Route::post('update/{id}', 'admin\LogController@update');
        Route::get('delete/{id}', 'admin\LogController@delete');
    });

});

