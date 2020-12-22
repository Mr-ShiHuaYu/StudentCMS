<?php

use Illuminate\Database\Seeder;
use App\Models\TeachersModel;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeachersModel::truncate();
        factory(TeachersModel::class, 10)->create();
    }
}
