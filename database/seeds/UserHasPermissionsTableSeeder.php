<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_has_permissions')->delete();
        
        
        
    }
}