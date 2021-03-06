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
Route::get('/languages/create', ['uses' => 'LanguageController@create', 'as' => 'language.create']);

Route::get('/introductions', 'IntroductionController@index');
Route::get('/introductions/filter/{lang?}', 'IntroductionController@filter');
Route::get('/introductions/{id}/delete', ['uses' => 'IntroductionController@delete', 'as' => 'introduction.delete']);
Route::get('/introductions/{id}/show', ['uses' => 'IntroductionController@show', 'as' => 'introduction.show']);

// Route::get('/introductions/{id}/update', ['uses' => 'IntroductionController@update', 'as' => 'introduction.update', 'files' => true]);

Route::match(['get', 'post'], '/introductions/{id}/update', [
    'as' => 'introduction.update',
    'uses' => 'IntroductionController@update',
    'files' => true
]);

Route::get('/introductions', ['uses' => 'IntroductionController@index', 'as' => 'introductions']);
Route::post('/introductions/store', ['uses' => 'IntroductionController@store', 'as' => 'introduction.store']);
Route::get('/introductions/create', ['uses' => 'IntroductionController@create', 'as' => 'introduction.create']);

Route::get('/experiences', 'ExperienceController@index');
Route::get('/experiences/filter/{lang?}', 'ExperienceController@filter');
Route::get('/experiences/{id}/delete', ['uses' => 'ExperienceController@delete', 'as' => 'experience.delete']);
Route::get('/experiences/{id}/show', ['uses' => 'ExperienceController@show', 'as' => 'experience.show']);
Route::get('/experiences/{id}/update', ['uses' => 'ExperienceController@update', 'as' => 'experience.update']);
Route::get('/experiences', ['uses' => 'ExperienceController@index', 'as' => 'experiences']);
Route::post('/experiences/store', ['uses' => 'ExperienceController@store', 'as' => 'experience.store']);
Route::get('/experiences/create', ['uses' => 'ExperienceController@create', 'as' => 'experience.create']);

Route::get('/slides/{id}/delete', ['uses' => 'SlideController@delete', 'as' => 'slide.delete']);
Route::get('/slides', ['uses' => 'SlideController@index', 'as' => 'slides']);
Route::post('/slides/store', ['uses' => 'SlideController@store', 'as' => 'slide.store']);
Route::get('/slides/create', ['uses' => 'SlideController@create', 'as' => 'slide.create']);
Route::get('/slides/filter/{lang?}', 'SlideController@filter');

Route::get('/skills', 'SkillController@index');
Route::get('/skills/{id}/delete', ['uses' => 'SkillController@delete', 'as' => 'skill.delete']);
Route::get('/skills/{id}/show', ['uses' => 'SkillController@show', 'as' => 'skill.show']);
Route::get('/skills/{id}/update', ['uses' => 'SkillController@update', 'as' => 'skill.update']);
Route::get('/skills', ['uses' => 'SkillController@index', 'as' => 'skills']);
Route::post('/skills/store', ['uses' => 'SkillController@store', 'as' => 'skill.store']);
Route::get('/skills/create', ['uses' => 'SkillController@create', 'as' => 'skill.create']);