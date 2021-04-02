<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\ExamsModel;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('exams.index');
    }

    public function getexams(Request $request)
    {
        $page = $request->input('page');
        $limit = $request->input('limit');
        $offset = ($page - 1) * $limit;
        $data = ExamsModel::orderBy('time')->offset($offset)->paginate($limit)->toArray();
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
        $exams = ExamsModel::orderBy('time')->get();

        return view('exams.create', compact('exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = ExamsModel::create($request->all());
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
        $exam = ExamsModel::find($id);
        if (Gate::denies('isAdmin')) {
            return view('user.noper');
        }

        return view('exams.edit', compact('exam'));
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
        $exam = ExamsModel::find($id);

        if (Gate::denies('isAdmin')) {
            return $this->fail('您无权修改考试');
        }
        $res = $exam->update($request->all());
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
            return $this->fail('您无权删除考试');
        }
        $res = ExamsModel::destroy($id);
        if ($res) {
            return $this->success('删除成功');
        }

        return $this->fail('删除失败');
    }
}
