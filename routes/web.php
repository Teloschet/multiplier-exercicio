<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::resource('/books', 'App\Http\Controllers\HomeController');
Route::resource('/create', 'App\Http\Controllers\HomeController');
Route::resource('/produtos', 'App\Http\Controllers\ProdutosController');
Route::resource('/categoria', 'App\Http\Controllers\CategoriaController');
Route::resource('/usuario', 'App\Http\Controllers\UsuarioController');