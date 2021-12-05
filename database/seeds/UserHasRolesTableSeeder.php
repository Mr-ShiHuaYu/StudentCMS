<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserHasRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_has_roles')->delete();
        
        \DB::table('user_has_roles')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'model_type' => 'App\\Models\\UserModel',
                'user_id' => 1,
            ),
            1 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\UserModel',
                'user_id' => 2,
            ),
            2 => 
            array (
                'role_id' => 3,
                'model_type' => 'App\\Models\\UserModel',
                'user_id' => 3,
            ),
        ));
        
        
    }
}