<?php

namespace App\Http\Controllers;

use App\Models\CoursesModel;
use App\Models\TeachersModel;
use Illuminate\Http\Request;
use Gate;

class CoursesController extends Controller
{
    public function __construct()
    {
        // 规定只有老师才能访问的方法
        $this->middleware(['role:teacher'])->only(['store', 'create', 'destroy', 'edit','update']);
    }

    public function index()
    {
        return view('courses.index');
    }

    public function getcourse(Request $request)
    {
        $page = $request->input('page');
        $limit = $request->input('limit');
        $offset = ($page - 1) * $limit;
        $data = CoursesModel::with('teacher')->offset($offset)->paginate($limit)->toArray();
        $res['data'] = $data['data'];
        $res['code'] = 0;
        $res['count'] = $data['total'];
        $res['msg'] = '获取数据失败';

        return $res;
    }


    public function create()
    {
        $teachers = TeachersModel::get();

        return view('courses.create', compact('teachers'));
    }


    public function store(Request $request)
    {
        $res = CoursesModel::create($request->all());
        if ($res) {
            return $this->success('添加成功');
        } else {
            return $this->fail('添加失败');
        }
    }


    public function edit($id)
    {
        $course = CoursesModel::find($id);
        $teachers = TeachersModel::get();

        return view('courses.edit', compact('course', 'teachers'));
    }


    public function update(Request $request, $id)
    {
        $course = CoursesModel::find($id);

        $res = $course->update($request->all());
        if ($res) {
            return $this->success('修改成功');
        } else {
            return $this->fail('修改失败');
        }
    }


    public function destroy($id)
    {

        $res = CoursesModel::destroy($id);
        if ($res) {
            return $this->success('删除成功');
        }

        return $this->fail('删除失败');
    }
}
