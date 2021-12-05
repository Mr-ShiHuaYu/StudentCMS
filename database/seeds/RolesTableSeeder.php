<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'nickname' => '超级管理员',
                'guard_name' => 'web',
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'teacher',
                'nickname' => '老师',
                'guard_name' => 'web',
                'created_at' => '2021-04-03 00:28:11',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'student',
                'nickname' => '学生',
                'guard_name' => 'web',
                'created_at' => '2021-12-04 16:16:57',
                'updated_at' => '2021-12-04 16:17:00',
            ),
        ));
        
        
    }
}