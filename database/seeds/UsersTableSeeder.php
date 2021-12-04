<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'admin',
                'name' => '系统管理员',
                'password' => '$2y$10$2jDad/OvKO9Q6sqow1KCmOQJ8eKhEDZVL6gWosUqbhRWIBkFSh7s.',
                'remember_token' => 'L6A6quHoYk2URjSmbbmvuSxRnWJDrLIyPl1jZ2LAFCBenx6zfDdTDuTWPckY',
                'created_at' => '1971-11-20 08:23:59',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'test',
                'name' => '测试用户',
                'password' => '$2y$10$0jNucr8dLICHDcSvXiXQyumw7f.Z3egKqHLfiJH33eJIbSFRqw9fC',
                'remember_token' => 'egiEa335QzIXaeUzk36idwvGhtcYEYWG7vTMCnKdqgoIv79hSEiOQTgxXhkV',
                'created_at' => '2013-03-30 09:17:26',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            2 => 
            array (
                'id' => 3,
                'username' => 'teacher',
                'name' => '老师',
                'password' => '$10$0jNucr8dLICHDcSvXiXQyumw7f.Z3egKqHLfiJH33eJIbSFRqw9fC',
                'remember_token' => 'egiEa335QzIXaeUzk36idwvGhtcYEYWG7vTMCnKdqgoIv79hSEiOQTgxXhkV',
                'created_at' => '2021-12-04 22:05:25',
                'updated_at' => '2021-12-04 22:05:28',
            ),
        ));
        
        
    }
}