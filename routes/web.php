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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'HomeController@index')->name('home'); //lo cambie por myProfile


//rutas para la autenticación
Auth::routes();


//sección inicio
Route::get('/', 'RootController@index');


//seccion de categorías(productos)
Route::get('categories/{id}', 'CategoriesController@index');


//sección mi perfil
Route::get('myProfile', 'MyProfileController@index')->name('myProfile');
//editar cliente
Route::get('editUser', 'MyProfileController@edit')->name('editUser')->middleware('auth');
Route::put('editUser', 'MyProfileController@update')->name('editUser');
//detalles User
Route::get('detailsUser', 'MyProfileController@show')->name('detailsUser')->middleware('auth');


//sección mi carrito
Route::get('myCart', 'MyCartController@index')->name('myCart')->middleware('auth');
//confirmar carrito
Route::post('confirmCart', 'MyCartController@confirm')->name('confirmCart');
//mercado pago
Route::get('mp/success', 'MercadoPagoController@success');
//Route::get('mp/failure', 'MercadoPagoController@failure');
//Route::get('mp/pending', 'MercadoPagoController@pending');


//administrar categorías de productos
Route::get('administrateProductCategories', 'AdministrateProductCategoriesController@index')->name('administrateProductCategories')->middleware('auth')->middleware('admin');
//agregar categoría de producto
Route::get('addProductCategory', 'AdministrateProductCategoriesController@create')->name('addProductCategory')->middleware('auth')->middleware('admin');
Route::post('addProductCategory', 'AdministrateProductCategoriesController@save')->name('addProductCategory');
//editar categoría de producto
Route::get('editProductCategory/{id}', 'AdministrateProductCategoriesController@edit')->name('editProductCategory')->middleware('auth')->middleware('admin');
Route::put('editProductCategory/{id}', 'AdministrateProductCategoriesController@update')->name('editProductCategory');
//buscar categorías de productos
Route::get('searchProductCategories', 'AdministrateProductCategoriesController@search')->name('searchProductCategories')->middleware('auth')->middleware('admin');


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
//buscar productos
Route::get('searchProducts', 'AdministrateProductsController@searchSP')->name('searchProducts')->middleware('auth')->middleware('admin');
//seccion mi busqueda de productos (navbar)
Route::get('mySearch', 'AdministrateProductsController@searchMS')->name('mySearch');


//administrar preguntas frecuentes
Route::get('administrateFrequentQuestions', 'AdministrateFrequentQuestionsController@indexAFQ')->name('administrateFrequentQuestions')->middleware('auth')->middleware('admin');
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
//buscar preguntas frecuentes
Route::get('searchFrequentQuestions', 'AdministrateFrequentQuestionsController@search')->name('searchFrequentQuestions')->middleware('auth')->middleware('admin');
//sección preguntas frecuentes
Route::get('frequentQuestions', 'AdministrateFrequentQuestionsController@indexFQ')->name('frequentQuestions');


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
//buscar administradores
Route::get('searchAdministrators', 'AdministrateAdministratorsController@search')->name('searchAdministrators')->middleware('auth')->middleware('main.admin');


//administrar clientes
Route::get('administrateClients', 'AdministrateClientsController@index')->name('administrateClients')->middleware('auth')->middleware('admin');
//agregar cliente
Route::get('addClient', 'AdministrateClientsController@create')->name('addClient')->middleware('auth')->middleware('admin');
Route::post('addClient', 'AdministrateClientsController@save')->name('addClient');
//editar cliente
Route::get('editClient/{id}', 'AdministrateClientsController@edit')->name('editClient')->middleware('auth')->middleware('admin');
Route::put('editClient/{id}', 'AdministrateClientsController@update')->name('editClient');
//detalles cliente
Route::get('detailsClient/{id}', 'AdministrateClientsController@show')->name('detailsClient')->middleware('auth')->middleware('admin');
//buscar clientes
Route::get('searchClients', 'AdministrateClientsController@search')->name('searchClients')->middleware('auth')->middleware('admin');


/*uso de fetch*/
//mostrar categorías de productos
Route::get('productCategories', 'FetchController@indexPC');
//contar los productos del carrito cada vez que cargue una página
Route::get('countCart', 'FetchController@indexCC');
//añadir producto al carrito
Route::post('addToCart', 'FetchController@saveATC');
//modificar cantidad de un producto del carrito
Route::put('changeQuantity', 'FetchController@updateCQ');
//eliminar producto del carrito
Route::delete('deleteOrder', 'FetchController@destroyDO');
