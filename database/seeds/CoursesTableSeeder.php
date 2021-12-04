<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('courses')->delete();
        
        \DB::table('courses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '语文',
                'full' => 150,
                'teacher_id' => 2,
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '数学',
                'full' => 150,
                'teacher_id' => 3,
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '英语',
                'full' => 150,
                'teacher_id' => 7,
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '物理',
                'full' => 100,
                'teacher_id' => 5,
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '化学',
                'full' => 100,
                'teacher_id' => 3,
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '生物',
                'full' => 100,
                'teacher_id' => 1,
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '地理',
                'full' => 100,
                'teacher_id' => 3,
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '政治',
                'full' => 100,
                'teacher_id' => 7,
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '历史',
                'full' => 100,
                'teacher_id' => 4,
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
        ));
        
        
    }
}