<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('exams')->delete();
        
        \DB::table('exams')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '第一次月考',
                'time' => '2020-01-01',
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '第二次月考',
                'time' => '2020-02-01',
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '第三次月考',
                'time' => '2020-03-01',
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '第四次月考',
                'time' => '2020-04-01',
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '第一学期半期考',
                'time' => '2020-05-01',
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '第一学期期末考',
                'time' => '2020-06-01',
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
        ));
        
        
    }
}