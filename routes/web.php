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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/files','FilesController@index')->name('files');
Route::get('/profile','ProfileController@index')->name('profile');
Route::get('/admin','AdminController@index')->name('admin');


Route::get('/files/add','FilesController@viewAdd')->name('files.add');
Route::post('/files/add','FilesController@add')->name('files.add');

Auth::routes();

