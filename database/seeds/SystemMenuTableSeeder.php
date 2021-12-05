<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SystemMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('system_menu')->delete();
        
        \DB::table('system_menu')->insert(array (
            0 => 
            array (
                'id' => 1,
                'pid' => 0,
                'title' => '基础管理',
                'icon' => '',
                'href' => '',
                'target' => '',
                'sort' => 0,
                'status' => 1,
                'remark' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'pid' => 0,
                'title' => '成绩管理',
                'icon' => 'fa fa-book',
                'href' => '',
                'target' => '',
                'sort' => 0,
                'status' => 1,
                'remark' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'pid' => 0,
                'title' => '成绩分析',
                'icon' => 'fa fa-line-chart',
                'href' => '',
                'target' => '',
                'sort' => 0,
                'status' => 1,
                'remark' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'pid' => 10,
                'title' => '学生列表',
                'icon' => 'fa fa-graduation-cap',
                'href' => 'user.index',
                'target' => '',
                'sort' => 0,
                'status' => 1,
                'remark' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'pid' => 10,
                'title' => '老师列表',
                'icon' => 'fa fa-user-plus',
                'href' => 'teacher.index',
                'target' => '',
                'sort' => 0,
                'status' => 1,
                'remark' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'pid' => 2,
                'title' => '成绩查询',
                'icon' => 'fa fa-search',
                'href' => 'score.index',
                'target' => '',
                'sort' => 0,
                'status' => 1,
                'remark' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'pid' => 2,
                'title' => '成绩录入',
                'icon' => 'fa fa-upload',
                'href' => 'score.create',
                'target' => '',
                'sort' => 0,
                'status' => 1,
                'remark' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'pid' => 3,
                'title' => '总体分析',
                'icon' => 'fa fa-pie-chart',
                'href' => 'analyze.index',
                'target' => '',
                'sort' => 0,
                'status' => 1,
                'remark' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'pid' => 3,
                'title' => '个人分析',
                'icon' => 'fa fa-line-chart',
                'href' => 'analyze.gerenfx',
                'target' => '',
                'sort' => 0,
                'status' => 1,
                'remark' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'pid' => 1,
                'title' => '用户管理',
                'icon' => 'fa fa-user-circle-o',
                'href' => '',
                'target' => '',
                'sort' => 0,
                'status' => 1,
                'remark' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'pid' => 1,
                'title' => '课程列表',
                'icon' => 'fa fa-list-ol',
                'href' => 'course.index',
                'target' => '',
                'sort' => 0,
                'status' => 1,
                'remark' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'pid' => 1,
                'title' => '考试列表',
                'icon' => 'fa fa-etsy',
                'href' => 'exam.index',
                'target' => '',
                'sort' => 0,
                'status' => 1,
                'remark' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'pid' => 1,
                'title' => '管理员专属',
                'icon' => 'fa fa-book',
                'href' => '',
                'target' => '',
                'sort' => 0,
                'status' => 1,
                'remark' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 15,
                'pid' => 13,
                'title' => '用户列表',
                'icon' => 'fa fa-user',
                'href' => 'admin.index',
                'target' => NULL,
                'sort' => 0,
                'status' => 1,
                'remark' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}