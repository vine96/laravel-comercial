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

Route::namespace('Site')->group(function () {

    //Principal
    Route::get('/', 'HomeController@index')->name('site.home');

    //Produtos
    Route::get('produtos', 'CategoryController@index')->name('site.products');
    Route::get('produtos/{slug}', 'CategoryController@show')->name('site.products.category');

    //Blog
    Route::get('blog', 'BlogController@index')->name('site.blog');

    //Sobre
    Route::view('sobre', 'site.about.index')->name('site.about');

    //Contato
    Route::get('contato', 'ContactController@index')->name('site.contact');
    Route::post('contato', 'ContactController@form')->name('site.contact.form');

});
