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

Route::get('/admin123', function () {
    return view('welcome');
});

Route::get('/back', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/auth0/callback', function() {
   dd(Auth0::getUser());
});

Route::any('/auth/register','HomeController@index');


Route::get('/experiences', 'ExperienceController@index');
Route::get('experiences/{id}/delete', ['uses' => 'ExperienceController@delete', 'as' => 'experience.delete']);


