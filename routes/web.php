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
Route::get('/dashboard','HomeController@dashboard')->name('dashboard');
Route::post('/update-about','HomeController@updateAbout')->name('about.update');
Route::post('/add-experience','HomeController@add_experience')->name('experience.add');
Route::get('/experiences','HomeController@show_ecperiences')->name('experience.show');
