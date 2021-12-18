<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserModel;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    \App\Models\StudentModel::class,
    function (Faker $faker) {
        return [
            'uid' => $faker->randomNumber(8, true),
            'password' => Hash::make('123456'),
            'name' => $faker->name,
            'sex' => Arr::random(['男', '女']),
            'phone' => $faker->phoneNumber,
            'sysid' => $faker->randomNumber(8, true),
            'birth' => $faker->date(),
            'minzu' => Arr::random(['汉', '畲']),
            'biye' => $faker->company,
            'remember_token' => Str::random(10),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        ];
    }
);
