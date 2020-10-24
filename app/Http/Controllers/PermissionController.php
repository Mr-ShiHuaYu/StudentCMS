<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use App\Models\RoleModel as Role;
use App\Models\UserModel;

//use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function create()
    {
        // 创建超级管理员和学生角色
//        $adminRole = Role::create(['name' => '超级管理员']);
//        $studentRole = Role::create(['name' => '学生']);
        // 创建权限
//        $permission = Permission::create(['name'=>'编辑文章']);
//        $permission = Permission::create(['name'=>'添加学生']);
//        $permission = Permission::create(['name'=>'添加老师']);
//        dump($role);
//        dump($permission);

        // 给id为1的人添加超级管理员的角色
        $user = UserModel::find(1);
        $adminRole = Role::findByName('超级管理员');
        $user->assignRole($adminRole);

        // 给其他人添加学生的角色
        $otherUser = UserModel::where('id', '<>', 1)->get();
        $studentRole = Role::findByName('学生');
        foreach ($otherUser as $ouser) {
            $ouser->assignRole($studentRole);
        }

        // 给管理员添加全部菜单列表
        $allMenusId = MenuModel::pluck('id')->toArray();
        $adminRole->menus()->sync($allMenusId);
        // 给学生添加能访问的菜单列表
//        $studentRole->menus()->attach([1, 2, 3, 4, 5, 6, 7, 9, 10, 11, 12]);
        $studentRole->menus()->sync([1, 2, 3, 4, 5, 6, 7, 9, 10, 11, 12]); // 用于测试,只添加3个菜单,id为1,2,3
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
//        $adminRole = Role::findByName('超级管理员'); // 先找出角色
//        $adminRole->syncPermissions(['编辑文章','添加学生','添加老师']);

    }

    public function index()
    {
        // 获取超级管理员的菜单
//        $adminUser = UserModel::find(1);

        // 获取学生的菜单列表,先获取学生的角色getRoleNames,再遍历角色获取menus
        $stu = UserModel::find(2);// 后续可以通过auth()->user()获取
        $stu_roles = $stu->roles()->get(); // 获取用户的角色列表
        $menus = collect(); // 创建一个空菜单集合
        foreach ($stu_roles as $srole) {
            $menus = $menus->merge($srole->menus()->get());
        }
        dump($menus->toArray());
    }

}
