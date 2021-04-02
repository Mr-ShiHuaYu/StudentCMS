<?php

use App\Models\CoursesModel;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CoursesModel::truncate();
        $courses = [
            ['name' => '语文', 'teacher_id' => rand(1, 10), 'full' => 150],
            ['name' => '数学', 'teacher_id' => rand(1, 10), 'full' => 150],
            ['name' => '英语', 'teacher_id' => rand(1, 10), 'full' => 150],
            ['name' => '物理', 'teacher_id' => rand(1, 10)],
            ['name' => '化学', 'teacher_id' => rand(1, 10)],
            ['name' => '生物', 'teacher_id' => rand(1, 10)],
            ['name' => '地理', 'teacher_id' => rand(1, 10)],
            ['name' => '政治', 'teacher_id' => rand(1, 10)],
            ['name' => '历史', 'teacher_id' => rand(1, 10)],
        ];
        foreach ($courses as $course) {
            CoursesModel::create($course);
        }
    }
}
