<?php

use App\Models\MenuModel;
use App\Models\RoleModel as Role;
use App\Models\UserModel;
use Illuminate\Database\Seeder;

class SystemMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_menu')->truncate();
        $menus = [
            [
                'id' => 1,
                'pid' => 0,
                'title' => '基本信息管理',
                'icon' => '',
                'href' => '',
            ],
            [
                'id' => 2,
                'pid' => 0,
                'title' => '成绩管理',
                'icon' => 'fa fa-book',
                'href' => '',
            ],
            [
                'id' => 3,
                'pid' => 0,
                'title' => '成绩分析',
                'icon' => 'fa fa-line-chart',
                'href' => '',
            ],
            [
                'id' => 4,
                'pid' => 10,
                'title' => '学生列表',
                'icon' => 'fa fa-graduation-cap',
                'href' => 'user.index',
            ],
            [
                'id' => 5,
                'pid' => 10,
                'title' => '老师列表',
                'icon' => 'fa fa-user-plus',
                'href' => 'teacher.index',
            ],
            [
                'id' => 6,
                'pid' => 2,
                'title' => '成绩查询',
                'icon' => 'fa fa-search',
                'href' => 'score.index',
            ],
            [
                'id' => 7,
                'pid' => 2,
                'title' => '成绩录入',
                'icon' => 'fa fa-upload',
                'href' => 'score.create',
            ],
            [
                'id' => 8,
                'pid' => 3,
                'title' => '总体分析',
                'icon' => 'fa fa-pie-chart',
                'href' => 'analyze.index',
            ],
            [
                'id' => 9,
                'pid' => 3,
                'title' => '个人分析',
                'icon' => 'fa fa-line-chart',
                'href' => 'analyze.gerenfx',
            ],
            [
                'id' => 10,
                'pid' => 1,
                'title' => '用户管理',
                'icon' => 'fa fa-user-circle-o',
                'href' => '',
            ],
            [
                'id' => 11,
                'pid' => 1,
                'title' => '课程列表',
                'icon' => 'fa fa-list-ol',
                'href' => 'course.index',
            ],
            [
                'id' => 12,
                'pid' => 1,
                'title' => '考试列表',
                'icon' => 'fa fa-etsy',
                'href' => 'exam.index',
            ],
        ];
        DB::table('system_menu')->insert($menus);
        $this->initPermission();
    }

    public function initPermission()
    {
        // 给is_admin为1的人添加超级管理员的角色
        try {
            // 如果找不到超级管理员这个角色,会报错,通过try-catch捕获错误,在catch里面创建角色
            Role::findByName('超级管理员');
        } catch (Exception $e) {
            Role::create(['name' => '超级管理员']);
        } finally {
            $user = UserModel::where('is_admin', '=', 1)->first();
            $adminRole = Role::findByName('超级管理员');
            $user->assignRole($adminRole);
            // 给管理员添加全部菜单列表
            $allMenusId = MenuModel::pluck('id')->toArray();
            $adminRole->menus()->sync($allMenusId);
        }

        // 给其他人添加学生的角色
        try {
            Role::findByName('学生');
        } catch (Exception $e) {
            Role::create(['name' => '学生']);
        } finally {
            $otherUser = UserModel::where('id', '<>', 1)->get();
            $studentRole = Role::findByName('学生');
            foreach ($otherUser as $ouser) {
                $ouser->assignRole($studentRole);
            }
            // 给学生添加能访问的菜单列表,attach是添加,sync是同步
            // $studentRole->menus()->attach([1, 2, 3, 4, 5, 6, 7, 9, 10, 11, 12]);
            $stuMenusId = MenuModel::where('id', '<>', 8)->pluck('id')->toArray();
            $studentRole->menus()->sync($stuMenusId);
        }
    }
}
