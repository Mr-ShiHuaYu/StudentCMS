<?php

namespace App\Http\Controllers;

use App\Models\CoursesModel;
use App\Models\ExamsModel;
use App\Models\UserModel;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Test extends Controller
{
    public function test()
    {
        // 创建角色和用户
//        $role = Role::create(['name'=>'超级管理员']);
//        $role = Role::create(['name'=>'老师']);
//        $role = Role::create(['name'=>'学生']);
//        $permission = Permission::create(['name'=>'编辑文章']);
//        $permission = Permission::create(['name'=>'添加学生']);
        $permission = Permission::create(['name'=>'添加老师']);
//        dump($role);
//        dump($permission);

        $user = UserModel::find(1);
        // 给用户添加权限
        // 如果添加了一个没有的权限名称,会报错
//        $user->givePermissionTo('编辑文章');
        // 用户删除权限
//        $user->revokePermissionTo('编辑文章');
        // 用户添加角色
//        $user->assignRole('编辑');
        // 用户删除角色
//        $user->removeRole('编辑');
//        $user->assignRole('超级管理员');
        // 找出所有角色为超级管理员的用户
//        $users = UserModel::role('超级管理员')->get();
//        dd($users->toArray());

        // 给角色添加权限
        $adminRole = Role::findByName('超级管理员'); // 先找出角色
//        $adminRole->syncPermissions(['编辑文章','添加学生','添加老师']);

    }

}
