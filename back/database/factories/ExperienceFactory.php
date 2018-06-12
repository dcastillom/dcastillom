<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// para rellenar la tabla Experience:
// php artisan tinker
// factory(App\Experience::class, 1)->create();

// sqlite3 ex1

$factory->define(App\Experience::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->randomDigit,
        'position' => $faker->sentence,
        'company' => $faker->sentence,
        'start' => $faker->dateTime,
        'end' => $faker->dateTime,
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'links' => $faker->url, 
        'lang' => $faker->randomElement(['es', 'en'])
    ];
});
