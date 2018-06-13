<?php

Route::get('experience', 'ExperienceController@index');
Route::get('experience/{id}', 'ExperienceController@show');
Route::post('experience', 'ExperienceController@store');
Route::put('experience/{id}', 'ExperienceController@update');
Route::delete('experience/{id}', 'ExperienceController@delete');

Route::get('introduction', 'IntroductionController@index');
Route::get('introduction/{id}', 'IntroductionController@show');
Route::post('introduction', 'IntroductionController@store');
Route::put('introduction/{id}', 'IntroductionController@update');
Route::delete('introduction/{id}', 'IntroductionController@delete');