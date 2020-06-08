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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Additional Resource Controller Routes

// Category Controllers
Route::get('/categories/disable/{id}', 'CategoriesController@disable');
Route::get('/categories/restore/{id}', 'CategoriesController@restore');
Route::get('/categories/disabled', 'CategoriesController@disabled');

// Blog Controllers
Route::get('/blog/archive/{id}', 'BlogController@archive');
Route::get('/blog/restore/{id}', 'BlogController@restore');
Route::get('/blog/archived', 'BlogController@archived');
Route::get('/blog/all', 'BlogController@all');

// Products Controllers
Route::get('/products/disable/{id}', 'ProductsController@disable');
Route::get('/products/restore/{id}', 'ProductsController@restore');
Route::get('/products/disabled', 'ProductsController@disabled');

// Resource Controllers
Route::resource('categories', 'CategoriesController');
Route::resource('about', 'AboutController');
Route::resource('artist', 'ArtistController');
Route::resource('blog', 'BlogController');
Route::resource('company-details', 'CompanyDetailsController');
Route::resource('contact', 'ContactsController');
Route::resource('gallery', 'GalleryController');
Route::resource('home-page', 'HomePageController');
Route::resource('products', 'ProductsController');
