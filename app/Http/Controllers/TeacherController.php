<?php

namespace App\Http\Controllers;

use App\Models\TeachersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TeacherController extends Controller
{

    public function index()
    {
        return view('teachers.index');
    }

    public function getTeacher(Request $request)
    {
        $page = $request->input('page');
        $limit = $request->input('limit');
        $offset = ($page - 1) * $limit;
        $data = TeachersModel::offset($offset)->paginate($limit)->toArray();
        $res['data'] = $data['data'];
        $res['code'] = 0;
        $res['count'] = $data['total'];
        $res['msg'] = '获取数据失败';

        return $res;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $res = TeachersModel::create($input);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $teacher = TeachersModel::find($id);

        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $teacher = TeachersModel::find($id);
        if (Gate::denies('isAdmin')) {
            return view('user.noper');
        }

        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $teacher = TeachersModel::find($id);

        if (Gate::denies('isAdmin')) {
            return $this->fail('您无权修改老师');
        }
        $res = $teacher->update($request->all());
        if ($res) {
            return $this->success('修改成功');
        } else {
            return $this->fail('修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id)
    {
        if (Gate::denies('isAdmin')) {
            return $this->fail('您无权删除老师');
        }
        $res = TeachersModel::destroy($id);
        if ($res) {
            return $this->success('删除成功');
        }

        return $this->fail('删除失败');
    }
}
