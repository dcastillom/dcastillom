<?php

Route::get('experience', 'ExperienceController@index');
Route::get('experience/{id}', 'ExperienceController@show');
Route::post('experience', 'ExperienceController@store');
Route::put('experience/{id}', 'ExperienceController@update');
Route::delete('experience/{id}', 'ExperienceController@delete');


