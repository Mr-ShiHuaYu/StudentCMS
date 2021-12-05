<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use App\Models\StudentModel;
use App\Models\TeachersModel;
use App\Models\UserModel;
use Illuminate\Support\Arr;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function getData()
    {
        $data = UserModel::getList();
        foreach ($data['data'] as &$item) {
            $item['role'] = join(',', Arr::pluck($item['roles'], 'nickname'));
            if ($item['role'] == '学生') {
                $item['bind_username'] = StudentModel::query()->where('id', $item['bind_user_id'])->value('name');
            } else {
                $item['bind_username'] = TeachersModel::query()->where('id', $item['bind_user_id'])->value('name');
            }
        }

        return table($data);
    }

    public function create()
    {
        $roles = RoleModel::get(['id', 'nickname']);
        $students = StudentModel::get(['id', 'name']);
        $teachers = TeachersModel::get(['id', 'name']);

        return view('admin.create', compact('roles', 'students', 'teachers'));
    }

    public function store()
    {
        $data['username'] = request('username');
        $data['name'] = request('name');
        $data['password'] = \Hash::make(request('password'));

        $role_id = request('role_id');
        $role = RoleModel::find($role_id);
        if ($role_id == 3) {
            $data['bind_user_id'] = request('bind_student_id');
        } else {
            $data['bind_user_id'] = request('bind_teacher_id');
        }

        $user = UserModel::create($data);

        // 给用户绑定角色
        $user->assignRole($role);

        return $this->success('添加成功');
    }

    public function edit($id)
    {
        $user = UserModel::find($id);
        $user->role_id = $user->roles()->value('id');
        if ($user->hasRole('student')){
            $user->bind_student_id = $user->bind_user_id;
        }else {
            $user->bind_teacher_id = $user->bind_user_id;
        }
        $roles = RoleModel::get(['id', 'nickname']);
        $students = StudentModel::get(['id', 'name']);
        $teachers = TeachersModel::get(['id', 'name']);

        return view('admin.edit', compact('user','roles','students','teachers'));
    }

    public function update($id)
    {
        $data['username'] = request('username');
        $data['name'] = request('name');

        // 如果有提交密码,就重置
        if (request('password')){
            $data['password'] = \Hash::make(request('password'));
        }

        $role_id = request('role_id');
        $role = RoleModel::find($role_id);
        if ($role_id == 3) {
            $data['bind_user_id'] = request('bind_student_id');
        } else {
            $data['bind_user_id'] = request('bind_teacher_id');
        }

        $user = UserModel::query()->find($id);

        // 给用户绑定角色
        $user->syncRoles([$role]);
        $user->update($data);

        return $this->success('更新成功');

    }
    public function destroy($id)
    {
        $res = UserModel::destroy($id);
        if ($res) {
            return $this->success('删除成功');
        }

        return $this->fail('删除失败');
    }
}
