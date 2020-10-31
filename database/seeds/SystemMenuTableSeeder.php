<?php

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
                'href' => 'analyze.gerenfx',
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
    }
}
