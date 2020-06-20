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
    return view('public.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/artist/dashboard', 'PagesController@index')->name('artist.dashboard');

// Additional Resource Controller Routes

// Art Services Route Groups
Route::prefix('art-services')->group(function () {
    Route::get('/disable/{id}', 'ArtServicesController@disable');
    Route::get('/restore/{id}', 'ArtServicesController@restore');
    Route::get('/disabled', 'ArtServicesController@disabled');
    Route::get('/all', 'ArtServicesController@all');
    Route::get('/{link}', 'ArtServices@displayByLink');
});

// Cards Route Groups
Route::prefix('cards')->group(function () {
    Route::get('/disable/{id}', 'CardsController@disable');
    Route::get('/restore/{id}', 'CardsController@restore');
    Route::get('/disabled', 'CardsController@disabled');
    Route::get('/all', 'CardsController@all');
    Route::get('/{link}', 'CardsController@displayByLink');
});

// Tutorials Route Groups
Route::prefix('tutorials')->group(function () {
    Route::get('/disable/{id}', 'TutorialsController@disable');
    Route::get('/restore/{id}', 'TutorialsController@restore');
    Route::get('/disabled', 'TutorialsController@disabled');
    Route::get('/all', 'TutorialsController@all');
    Route::get('/{link}', 'TutorialsController@displayByLink');
});

// Ebooks Route Groups
Route::prefix('ebooks')->group(function () {
    Route::get('/disable/{id}', 'EbooksController@disable');
    Route::get('/restore/{id}', 'EbooksController@restore');
    Route::get('/disabled', 'EbooksController@disabled');
    Route::get('/all', 'EbooksController@all');
    Route::get('/{link}', 'EbooksController@displayByLink');
});

// Blog Route Groups
Route::prefix('blog')->group(function () {
    Route::get('/archived/{id}', 'BlogController@archive');
    Route::get('/restore/{id}', 'BlogController@restore');
    Route::get('/archived', 'BlogController@archived');
    Route::get('/all', 'BlogController@all');
    Route::get('/{link}', 'BlogController@displayByLink');
});

// Categories Route Groups
Route::prefix('categories')->group(function () {
    Route::get('/disable/{id}', 'CategoriesController@disable');
    Route::get('/restore/{id}', 'CategoriesController@restore');
    Route::get('/disabled', 'CategoriesController@disabled');
});

// Products Route Groups
Route::prefix('products')->group(function () {
    Route::get('/disable/{id}', 'ProductsController@disable');
    Route::get('/restore/{id}', 'ProductsController@restore');
    Route::get('/disabled', 'ProductsController@disabled');
});

// Featured Works Route Groups
Route::prefix('featured-works')->group(function () {
    Route::get('/disable/{id}', 'FeaturedWorksController@disable');
    Route::get('/restore/{id}', 'FeaturedWorksController@restore');
    Route::get('/approve/{id}', 'FeaturedWorksController@approve');
    Route::get('/disapprove/{id}', 'FeaturedWorksController@disapprove');
    Route::get('/{link}', 'FeaturedWorks@displayByLink');
    Route::prefix('/admin')->group((function () {
        Route::get('/all', 'FeaturedWorksController@admin_all');
        Route::get('/pending', 'FeaturedWorksController@admin_pending');
        Route::get('/disabled', 'FeaturedWorksController@AdminDisabled');
        Route::get('/approved', 'FeaturedWorksController@AdminApproved');
        Route::get('/disapproved', 'FeaturedWorksController@AdminDisapproved');
    }));
    Route::prefix('/artist')->group((function () {
        Route::get('/all', 'FeaturedWorksController@all');
        Route::get('/disabled', 'FeaturedWorksController@ArtistDisabled');
        Route::get('/approved', 'FeaturedWorksController@ArtistApproved');
        Route::get('/disapproved', 'FeaturedWorksController@ArtistDisapproved');
    }));
});


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
Route::resource('art-services', 'ArtServicesController');
Route::resource('cards', 'CardsController');
Route::resource('ebooks', 'EbooksController');
Route::resource('tutorials', 'TutorialsController');
Route::resource('featured-works', 'FeaturedWorksController');

// Artist Home Route
// Route::get('/artist/dashboard', 'PagesController@index')->name('artist.dashboard');


Route::namespace('admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
