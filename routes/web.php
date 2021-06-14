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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');
Route::post('/', 'App\Http\Controllers\HomeController@sorteio')->name('sorteio');

Route::resource('/jogadores', 'App\Http\Controllers\JogadorController');
Route::get('/erro/{msg}', 'App\Http\Controllers\HomeController@sorteioIndefinido')->name('erro');

Route::get('/sorteio/{times}', 'App\Http\Controllers\HomeController@sorteado')->name('sorteado');
