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
//fronend routes
Route::get('/', function () {
    return view('welcome');
});

//Aut routes
Auth::routes();

//backend routes
//pagina inicial
Route::get('/home', 'HomeController@index')->name('home');
//rotas de produtos
Route::get('/produtos', 'ProductController@index')->name('produtos');
Route::post('/produtos/novo', 'ProductController@create')->name('novoprodutos');
//rotas de taxas
Route::get('/taxas', 'TaxController@index')->name('taxas');
Route::post('/taxas/nova', 'TaxController@create')->name('novataxa');
