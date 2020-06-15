<?php


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
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

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->realText(1000),
        'timestamp' => $faker->dateTimeBetween('yesterday', '+2 months'),
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude
    ];
});
