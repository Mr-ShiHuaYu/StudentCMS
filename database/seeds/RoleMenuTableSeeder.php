<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_menu')->delete();
        
        \DB::table('role_menu')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'menu_id' => 8,
            ),
            1 => 
            array (
                'role_id' => 2,
                'menu_id' => 8,
            ),
            2 => 
            array (
                'role_id' => 1,
                'menu_id' => 13,
            ),
        ));
        
        
    }
}