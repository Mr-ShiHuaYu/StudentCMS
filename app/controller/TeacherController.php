<?php

namespace app\controller;

use app\BaseController;
use app\model\TeachersModel;
use think\Request;

class TeacherController extends BaseController
{
    protected $middleware = ['auth'];
    public function index()
    {
        return view('index');
    }

    public function getteacher(Request $request)
    {
        $query = (new TeachersModel)->newQuery();
        return table($query);
    }


    public function create()
    {
        return view('create');
    }


    public function save(Request $request)
    {
        $input = input();
        $res = TeachersModel::create($input);
        if ($res) {
            return success('添加成功');
        } else {
            return fail('添加失败');
        }
    }

    public function read($id)
    {
        $teacher = TeachersModel::find($id);

        return view('show', compact('teacher'));
    }


    public function edit($id)
    {
        $teacher = TeachersModel::find($id);
        if (!$this->user['is_admin']) {
            return view('user/noper');
        }

        return view('edit', compact('teacher'));
    }


    public function update(Request $request, $id)
    {
        $teacher = TeachersModel::find($id);

        if (!$this->user['is_admin']) {
            return fail('您无权修改老师');
        }
        $res = $teacher->update(input());
        if ($res) {
            return success('修改成功');
        } else {
            return fail('修改失败');
        }
    }

    public function delete(Request $request, $id)
    {
        if (!$this->user['is_admin']) {
            return fail('您无权删除老师');
        }
        $res = TeachersModel::destroy($id);
        if ($res) {
            return success('删除成功');
        }

        return fail('删除失败');
    }
}
