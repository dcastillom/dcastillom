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
// factory(App\Introduction::class, 1)->create();
// sqlite3 ex1

$factory->define(App\Introduction::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->randomDigit,
        'greeting' => $faker->sentence,
        'intro' => $faker->sentence,
        'avatar' => $faker->imageUrl($width = 640, $height = 480),
        'lang' => $faker->randomElement(['es', 'en'])
    ];
});
