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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'FrontendController@index')->name('home');
Route::get('aboutus', 'FrontendController@about_us')->name('aboutus');
Route::get('contactus', 'FrontendController@contact_us')->name('contactus');
Route::post('create-contact', 'FrontendController@form_contact')->name('create-contact');
Route::get('gallery', 'FrontendController@gallery')->name('gallery');
Route::get('/booking', 'FrontendController@booking')->name('booking');
Route::post('create-book', 'FrontendController@create_book')->name('create-book');
Route::post('create-comment', 'FrontendController@create_comment')->name('create-comment');
Route::post('create-newslatter', 'FrontendController@create_newslatter')->name('create-newslatter');

Route::get('/service/{slug}', 'FrontendController@serviceList')->name('servic-list');

Route::get('/clear', function(){
   \Artisan::call('optimize:clear');
   \Artisan::call('config:clear');
   return 'done';
});