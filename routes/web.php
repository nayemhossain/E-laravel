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
//frontend route
Route::get('/', 'homeController@index');

Route::get('/product_by_caregory/{id}', 'homeController@product_by_category');
Route::get('/product_by_manufacture/{id}', 'homeController@product_by_manufacture');
Route::get('/product_details/{id}', 'homeController@product_details');

//add to cart raout
Route::get('/show_cart','CartController@show_cart');
Route::post('/add_to_cart', 'CartController@add_to_cart');











//backend route
Route::get('/admin', 'adminController@index');
Route::get('/dashboard', 'superAdminController@index');
Route::post('/admin_dashboard', 'adminController@dashboard');
Route::get('/logout', 'superAdminController@logout');



//category related route
//Route::get('/cat','categoryController@index');
//Route::get('/add_category','categoryController@create');
//Route::post('/save_category','categoryController@store');
//Route::get('/edit/{id}','categoryController@edit');
//Route::get('/delete_cat/{id}','categoryController@destroy');
//Route::get('/unactive_category/{category_id}','categoryController@unactive_category');
//Route::get('/active_category/{category_id}','categoryController@active_category');
Route::resource('/category','categoryController');
Route::get('/inactive/{id}', 'categoryController@category_inactive');
Route::get('/active/{id}', 'categoryController@category_active');

//manufacture rotes are here
Route::resource('/manufacture','manufactureController');
Route::get('/inactive/{id}', 'manufactureController@manufacture_inactive');
Route::get('/active/{id}', 'manufactureController@manufacture_active');

//product route
Route::resource('/product','productController');
Route::get('/inactive/{id}', 'productController@product_inactive');
Route::get('/active/{id}', 'productController@product_active');


Route::resource('/slider','sliderController');
Route::get('/inactive/{id}', 'sliderController@slider_inactive');
Route::get('/active/{id}', 'sliderController@slider_active');