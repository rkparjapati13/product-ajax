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
    return redirect()->route('product.index');
});

Route::get('/product','ProductController@index')->name('product.index');
Route::post('/product','ProductController@store')->name('product.store');
Route::post('product/delete/{id}','ProductController@delete')->name('product.delete');
