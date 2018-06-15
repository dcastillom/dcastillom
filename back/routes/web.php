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

Route::get('/languages', 'LanguageController@index');
Route::get('/languages/filter/{lang?}', 'LanguageController@filter');
Route::get('/languages/{id}/delete', ['uses' => 'LanguageController@delete', 'as' => 'language.delete']);
Route::get('/languages/{id}/show', ['uses' => 'LanguageController@show', 'as' => 'language.show']);
Route::get('/languages/{id}/update', ['uses' => 'LanguageController@update', 'as' => 'language.update']);
Route::get('/languages', ['uses' => 'LanguageController@index', 'as' => 'languages']);
Route::post('/languages/store', ['uses' => 'LanguageController@store', 'as' => 'language.store']);
Route::get('/languages/new', function () {
    return view('/languages/new');
});

Route::get('/experiences', 'ExperienceController@index');
Route::get('/experiences/filter/{lang?}', 'ExperienceController@filter');
Route::get('/experiences/{id}/delete', ['uses' => 'ExperienceController@delete', 'as' => 'experience.delete']);
Route::get('/experiences/{id}/show', ['uses' => 'ExperienceController@show', 'as' => 'experience.show']);
Route::get('/experiences/{id}/update', ['uses' => 'ExperienceController@update', 'as' => 'experience.update']);
Route::get('/experiences', ['uses' => 'ExperienceController@index', 'as' => 'experiences']);
Route::post('/experiences/store', ['uses' => 'ExperienceController@store', 'as' => 'experience.store']);
Route::get('/experiences/new', function () {
    return view('/experiences/new');
});