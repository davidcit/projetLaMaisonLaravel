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
/*  Route::get('/', function () {
    return view('welcome');
});
 */
Route::get('/','FrontController@index');//route pour le FrontController
Route::get('product/{id}','FrontController@show')->where(['id'=>'[0-9]+']);//route pour montrer un produit avec son id
Route::get('categorie/{id}','FrontController@productByCategorie')->where(['id'=>'[0-9]+']); //route vers la categorie Homme ou Femme
Route::get('soldes','FrontController@showByCode');//route vers la page soldes
Route::resource('admin/product','ProductController')->middleware('auth');//route vers l'administrateur
Auth::routes();//authentification

Route::get('/home', 'HomeController@index')->name('home');
