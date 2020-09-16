<?php

namespace App\Http\Controllers;

use App\Models\CoursesModel;
use App\Models\TeachersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class Courses extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.index');
    }

    public function getcourse(Request $request)
    {
        $page = $request->get('page');
        $limit = $request->get('limit');
        $offset = ($page - 1) * $limit;
        $data = CoursesModel::with('teacher')->offset($offset)->paginate($limit)->toArray();
        $res['data'] = $data['data'];
        $res['code'] = 0;
        $res['count'] = $data['total'];
        $res['msg'] = '获取数据失败';

        return $res;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $teachers = TeachersModel::get();

        return view('courses.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (Gate::denies('isAdmin')) {
            return $this->fail('您无权添加课程');
        }
        $res = CoursesModel::create($request->all());
        if ($res) {
            return $this->success('添加成功');
        } else {
            return $this->fail('添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = CoursesModel::find($id);
        $teachers = TeachersModel::get();
        if (Gate::denies('isAdmin')) {
            return view('user.noper');
        }
        return view('courses.edit',compact('course','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = CoursesModel::find($id);

        if (Gate::denies('isAdmin')) {
            return $this->fail('您无权修改课程');
        }
        $res = $course->update($request->all());
        if ($res) {
            return $this->success('修改成功');
        } else {
            return $this->fail('修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('isAdmin')) {
            return $this->fail('您无权删除课程');
        }
        $res = CoursesModel::destroy($id);
        if ($res) {
            return $this->success('删除成功');
        }

        return $this->fail('删除失败');
    }
}
