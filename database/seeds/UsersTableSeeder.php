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
                'bind_user_id' => 1,
                'remember_token' => 'AxGEdfgaVRpw8r6KpYh0ecUgQob8Do6UTuI0NnbKVsnBnkEmXjaCdusYvq7e',
                'created_at' => '1971-11-20 08:23:59',
                'updated_at' => '2021-04-03 00:28:11',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'teacher',
                'name' => '老师',
                'password' => '$2y$10$SrE4Ns8b/h.Bvq8b9WRdBe3SRBcR6yFYmJ50NG4B9ubkB.Az5p1wK',
                'bind_user_id' => 2,
                'remember_token' => 'LczYNivpBUj5zdOf9P4tILE1gOWxT4AQaPCS0azm1PiMRcOOFgey4LkYs7UM',
                'created_at' => '2013-03-30 09:17:26',
                'updated_at' => '2021-12-05 12:29:27',
            ),
            2 => 
            array (
                'id' => 3,
                'username' => 'student',
                'name' => '学生',
                'password' => '$2y$10$JZ0u6DzqpcWFNRCgr/PKxeWYF8vXf3JZX3wRBaMkmXJhFTNtFPzZG',
                'bind_user_id' => 2,
                'remember_token' => 'FYxVJ3rn0HlOeHZMOvDurS0xz6PQKjowHEgZnFLrLashZOgAKG0uLHQndewk',
                'created_at' => '2021-12-04 22:05:25',
                'updated_at' => '2021-12-05 12:29:12',
            ),
        ));
        
        
    }
}