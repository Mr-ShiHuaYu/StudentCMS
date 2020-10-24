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
        UserModel::truncate();
        factory(UserModel::class, 57)->create();
        UserModel::find(1)->update(
            [
                'uid' => 'admin',
                'password' => Hash::make('admin'),
                'name' => '系统管理员',
                'is_admin' => true,
                'sex' => '男',
                'phone' => '110120119',
            ]
        );
        UserModel::find(2)->update(
            [
                'uid' => 'test',
                'password' => Hash::make('test'),
                'name' => '测试学生',
                'is_admin' => false,
                'sex' => '男',
                'phone' => '110120119',
            ]
        );
    }
}
