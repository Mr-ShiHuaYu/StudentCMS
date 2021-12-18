<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TeachersModel;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

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

$factory->define(
    TeachersModel::class,
    function (Faker $faker) {
        return [
            'name' => $faker->name,
            'sex' => Arr::random(['男', '女']),
            'phone' => $faker->phoneNumber,
            'qq' => $faker->randomNumber(8, true),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        ];
    }
);
