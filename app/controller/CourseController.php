<?php

namespace app\controller;

use app\BaseController;
use app\model\CoursesModel;
use app\model\TeachersModel;
use think\Request;

class CourseController extends BaseController
{
    protected $middleware = ['auth'];
    public function index()
    {
        return view('index');
    }

    public function getcourse(Request $request)
    {
        return table(CoursesModel::with('teacher'));
    }


    public function create()
    {
        $teachers = TeachersModel::select();

        return view('create', compact('teachers'));
    }


    public function save(Request $request)
    {
        if ( ! $this->user['is_admin']) {
            return fail('您无权添加课程');
        }
        $res = CoursesModel::create(input());
        if ($res) {
            return success('添加成功');
        } else {
            return fail('添加失败');
        }
    }


    public function edit($id)
    {
        $course = CoursesModel::find($id);
        $teachers = TeachersModel::select();
        if ( ! $this->user['is_admin']) {
            return view('user.noper');
        }

        return view('edit', compact('course', 'teachers'));
    }


    public function update(Request $request, $id)
    {
        $course = CoursesModel::find($id);

        if ( ! $this->user['is_admin']) {
            return fail('您无权修改课程');
        }
        $res = $course->update(input());
        if ($res) {
            return success('修改成功');
        } else {
            return fail('修改失败');
        }
    }


    public function delete($id)
    {
        if ( ! $this->user['is_admin']) {
            return fail('您无权删除课程');
        }
        $res = CoursesModel::destroy($id);
        if ($res) {
            return success('删除成功');
        }

        return fail('删除失败');
    }
}
