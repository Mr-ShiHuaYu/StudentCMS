<?php

namespace app\controller;

use app\BaseController;
use app\model\ExamsModel;
use think\Request;

class ExamController extends BaseController
{
    protected $middleware = ['auth'];
    public function index()
    {
        return view('index');
    }

    public function getexams(Request $request)
    {
        return table(ExamsModel::order('time'));
    }


    public function create()
    {
        $exams = ExamsModel::order('time')->select();

        return view('create', compact('exams'));
    }


    public function save(Request $request)
    {
        $res = ExamsModel::create(input());
        if ($res) {
            return success('添加成功');
        } else {
            return fail('添加失败');
        }
    }


    public function edit($id)
    {
        $exam = ExamsModel::find($id);
        if ( ! $this->user['is_admin']) {
            return view('user/noper');
        }

        return view('edit', compact('exam'));
    }


    public function update(Request $request, $id)
    {
        $exam = ExamsModel::find($id);

        if ( ! $this->user['is_admin']) {
            return fail('您无权修改考试');
        }
        $res = $exam->update(input());
        if ($res) {
            return success('修改成功');
        } else {
            return fail('修改失败');
        }
    }


    public function delete($id)
    {
        if ( ! $this->user['is_admin']) {
            return fail('您无权删除考试');
        }
        $res = ExamsModel::destroy($id);
        if ($res) {
            return success('删除成功');
        }

        return fail('删除失败');
    }
}
