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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/comunas/addComuna/{region}','ComunaController@addComuna')->name('comunas.addComuna');
Route::post('/comunas/setComuna/{region}','ComunaController@setComuna')->name('comunas.setComuna');

Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController');
Route::resource('regions','RegionController');
Route::resource('comunas','ComunaController');


