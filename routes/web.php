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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoriesController@index');
Route::get('/products/{slug}', 'CategoriesController@show');
Route::get('/category/add', 'CategoriesController@addGet');
Route::post('/category/add', 'CategoriesController@addPost');
Route::get('/category/edit/{slug}', 'CategoriesController@editGet');
Route::post('/category/edit/{slug}', 'CategoriesController@editPost');
Route::get('/category/delete/{slug}', 'CategoriesController@delete');

Route::get('/products', 'ProductsController@index');
Route::post('/products', 'ProductsController@indexFilters');
Route::get('/product/show/{id}', 'ProductsController@show');
Route::get('/product/add', 'ProductsController@addGet');
Route::post('/product/add', 'ProductsController@addPost');
Route::get('/product/edit/{id}', 'ProductsController@editGet');
Route::post('/product/edit/{id}', 'ProductsController@editPost');
Route::get('/product/delete/{id}', 'ProductsController@delete');
