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


//administrar categorías de productos
Route::get('administrateProductCategories', 'AdministrateProductCategoriesController@index')->name('administrateProductCategories')->middleware('auth')->middleware('admin');
//agregar categoría de producto
Route::get('addProductCategory', 'AdministrateProductCategoriesController@create')->name('addProductCategory')->middleware('auth')->middleware('admin');
Route::post('addProductCategory', 'AdministrateProductCategoriesController@save')->name('addProductCategory');
//editar categoría de producto
Route::get('editProductCategory/{id}', 'AdministrateProductCategoriesController@edit')->name('editProductCategory')->middleware('auth')->middleware('admin');
Route::put('editProductCategory/{id}', 'AdministrateProductCategoriesController@update')->name('editProductCategory');


//administrar productos
Route::get('administrateProducts', 'AdministrateProductsController@index')->name('administrateProducts')->middleware('auth')->middleware('admin');
//agregar producto
Route::get('addProduct', 'AdministrateProductsController@create')->name('addProduct')->middleware('auth')->middleware('admin');
Route::post('addProduct', 'AdministrateProductsController@save')->name('addProduct');
//editar producto
Route::get('editProduct/{id}', 'AdministrateProductsController@edit')->name('editProduct')->middleware('auth')->middleware('admin');
Route::put('editProduct/{id}', 'AdministrateProductsController@update')->name('editProduct');
//detalles producto
Route::get('detailsProduct/{id}', 'AdministrateProductsController@show')->name('detailsProduct')->middleware('auth')->middleware('admin');


//administrar preguntas frecuentes
Route::get('administrateFrequentQuestions', 'AdministrateFrequentQuestionsController@index')->name('administrateFrequentQuestions')->middleware('auth')->middleware('admin');
//agregar pregunta frecuente
Route::get('addFrequentQuestion', 'AdministrateFrequentQuestionsController@create')->name('addFrequentQuestion')->middleware('auth')->middleware('admin');
Route::post('addFrequentQuestion', 'AdministrateFrequentQuestionsController@save')->name('addFrequentQuestion');
//editar pregunta frecuente
Route::get('editFrequentQuestion/{id}', 'AdministrateFrequentQuestionsController@edit')->name('editFrequentQuestion')->middleware('auth')->middleware('admin');
Route::put('editFrequentQuestion/{id}', 'AdministrateFrequentQuestionsController@update')->name('editFrequentQuestion');
//detalles pregunta frecuente
Route::get('detailsFrequentQuestion/{id}', 'AdministrateFrequentQuestionsController@show')->name('detailsFrequentQuestion')->middleware('auth')->middleware('admin');
//eliminar pregunta frecuente
Route::delete('deleteFrequentQuestion', 'AdministrateFrequentQuestionsController@destroy')->name('deleteFrequentQuestion');


//administrar administradores
Route::get('administrateAdministrators', 'AdministrateAdministratorsController@index')->name('administrateAdministrators')->middleware('auth')->middleware('main.admin');
//agregar administrador
Route::get('addAdministrator', 'AdministrateAdministratorsController@create')->name('addAdministrator')->middleware('auth')->middleware('main.admin');
Route::post('addAdministrator', 'AdministrateAdministratorsController@save')->name('addAdministrator');
//editar administrador
Route::get('editAdministrator/{id}', 'AdministrateAdministratorsController@edit')->name('editAdministrator')->middleware('auth')->middleware('main.admin');
Route::put('editAdministrator/{id}', 'AdministrateAdministratorsController@update')->name('editAdministrator');
//detalles administrador
Route::get('detailsAdministrator/{id}', 'AdministrateAdministratorsController@show')->name('detailsAdministrator')->middleware('auth')->middleware('main.admin');
