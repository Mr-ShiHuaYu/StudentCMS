<?php

use App\Models\ExamsModel;
use Illuminate\Database\Seeder;
use Faker\Generator;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);
        ExamsModel::truncate();
        $exams = [
            ['name' => '第一次月考', 'time' => $faker->date()],
            ['name' => '第二次月考', 'time' => $faker->date()],
            ['name' => '第三次月考', 'time' => $faker->date()],
            ['name' => '第四次月考', 'time' => $faker->date()],
            ['name' => '第一学期半期考', 'time' => $faker->date()],
            ['name' => '第一学期期末考', 'time' => $faker->date()],
        ];
        foreach ($exams as $exam) {
            ExamsModel::create($exam);
        }
    }
}
