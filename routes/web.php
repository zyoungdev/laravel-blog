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

// Home Page
Route::get('/', 'PublicController@index');

// Show a list of articles
Route::get('/blog', 'PublicController@showBlog');

// Show a list of articles based on tag
Route::get('/blog/{tag}', 'PublicController@showTag');

// Show a list of images with attribution
Route::get('/attribution', 'PublicController@showImages');

/**
 * Custom Authorization
 *     Replaces Route::auth()
 */
// Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Administer the articles
Route::resource('/admin/articles', 'AdminBlogController');

// Administer the article images
Route::resource('/admin/images', 'AdminImagesController');

// Show a specific article
Route::get('/{article}', 'PublicController@showArticle');

