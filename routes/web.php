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
Route::get('/experiences','HomeController@show_experiences')->name('experience.show');
Route::get('/experiences-delete/{id}','HomeController@delete_experiences')->name('experience.delete');
Route::post('/education','HomeController@create_education')->name('education.add');
Route::get('/education','HomeController@show_education')->name('education.show');
Route::get('/education-delete/{id}','HomeController@delete_education')->name('education.delete');
Route::get('/add-more','HomeController@add_more_info')->name('add.more');
Route::post('/add/skills','HomeController@add_skills');
Route::post('/add/awards','HomeController@add_awards');
Route::get('/skills-awards','HomeController@fetch_skills_awards');
Route::get('/fetch-interesrts','HomeController@fetch_interests');
Route::post('/add-interests','HomeController@add_interests');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
    
})->name('logout');





