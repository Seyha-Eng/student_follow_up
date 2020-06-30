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

Route::get('/home'
, 'HomeController@index')->name('home');
Route::get('/', function(){
    return view('auth.login');
});


// Route::get('/index', 'indexController@index')->name('index');

Route::resource('student', 'studentController');
Route::get('/return_followup','studentController@return_followup')->name('return_followup');
Route::get('/outfollowup/{id}','studentController@outfollowup')->name('outfollowup');
Route::post('/addComment/{id}','commentController@addComment')->name('addComment');
Route::get('/showComment','commentController@showComment')->name('showComment');
Route::put('/updateComments/{id}','commentController@updateComments')->name('updateComments');
Route::delete('/deleteComments/{id}','commentController@deleteComments')->name('deleteComments');
// Route::get('/followup/{id}','studentController@followup')->name('followup');
Route::get('/followup/{id}','studentController@followup')->name('followup');