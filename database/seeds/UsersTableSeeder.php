<?php

use App\Models\UserModel;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UserModel::class, 50)->create();
        UserModel::find(1)->update(
            [
                'uid' => 'admin',
                'name' => '系统管理员',
                'is_admin' => true,
                'sex' => '男',
                'phone' => '18179871320',
            ]
        );
    }
}
