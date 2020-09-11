<?php

use Illuminate\Database\Seeder;
use App\Models\TeachersModel;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TeachersModel::class, 10)->create();
        /*$faker = new Faker();
        TeachersModel::truncate();
        TeachersModel::insert(
            [
                [
                    'name' => $faker->name,
                    'sex' => Arr::random(['男', '女']),
                    'phone' => $faker->phoneNumber,
                    'qq' => $faker->randomNumber(8, true),
                ],
            ]
        );*/
    }
}
