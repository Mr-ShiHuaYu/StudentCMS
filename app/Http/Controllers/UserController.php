<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\StudentModel;
use App\Models\TeachersModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function __construct()
    {
        // 规定只有老师才能访问的方法
        $this->middleware(['role:teacher'])->only(['store', 'create', 'destroy', 'export']);
    }

    public function index()
    {
        return view('user.index');
    }

    public function getUser(Request $request)
    {
        $data = StudentModel::getUserList();
        $res['data'] = $data['data'];
        $res['code'] = 0;
        $res['count'] = $data['total'];
        $res['msg'] = '获取数据失败';

        return $res;
    }

    public function create()
    {
        $jishuMap = config('modelmap.jishuMap');

        return view('user.create', compact('jishuMap'));
    }

    // 插入学生的家庭主要成员
    private function insertParent(Request $request, StudentModel $user)
    {
        // 家庭主要成员
        if ($request->has('parent')) {
            $parents_input = $request->only('parent')['parent'];
            $parents = [];
            foreach ($parents_input as $key => $val) {
                foreach ($val as $k => $v) {
                    $parents[$k][$key] = $v;
                }
            }
            // 判断parents中的数据合法性
            foreach ($parents as $p) {
                if ( ! (isset($p['name']) && isset($p['age']) && isset($p['relation']))) {
                    return $this->fail('姓名,年龄,关系为必填项,请先填写');
                }
            }
            $user->parents()->delete();
            $user->parents()->createMany($parents);
        }
    }


    public function store(Request $request)
    {
        $message = [
            'uid.unique' => '错误,已存在相同学号',
        ];

        $request->validate(
            [
                'uid' => 'required|unique:students',
                'name' => 'required',
                'phone' => 'required',
                'sysid' => 'required',
                'birth' => 'required',
                'minzu' => 'required',
            ],
            $message
        );

        // 学生本人信息
        $student = $request->except('parent');
        $res = $user = StudentModel::create($student);
        // 家庭主要成员
        $this->insertParent($request, $user);
        if ($res) {
            return $this->success('添加成功');
        } else {
            return $this->fail('添加失败');
        }
    }


    public function show($id)
    {
        $user = StudentModel::with('parents')->find($id);
        if ( ! is_own($id)) {
            return view('user.noper');
        }

        return view('user.show', compact('user'));
    }


    public function edit($id)
    {
        $user = StudentModel::with('parents')->find($id);
        if ( ! is_own($id)) {
            return view('user.noper');
        }
        $jishuMap = config('modelmap.jishuMap');

        return view('user.edit', compact('user', 'jishuMap'));
    }


    public function update(Request $request, $id)
    {
        $user = StudentModel::find($id);

        if ( ! is_own($id)) {
            return $this->fail('您无权修改不是自己的信息');
        }
        // 家庭主要成员
        $this->insertParent($request, $user);
        // 学生本人信息
        $student = $request->except('parent');
        $res = $user->update($student);
        if ($res) {
            return $this->success('提交成功');
        } else {
            return $this->fail('提交失败');
        }
    }


    public function destroy(Request $request, $id)
    {
        $res = StudentModel::destroy($id);// 删除学生会关联删除他的家庭成员
        if ($res) {
            return $this->success('删除成功');
        }

        return $this->fail('删除失败');
    }

    public function delParent(Request $request, $id)
    {
        $user = StudentModel::find($id);
        if ( ! is_own($id)) {
            return $this->fail('您无权删除不是自己的家庭成员');
        }
        $p_id = request('pid');
        $parent = $user->parents()->where('id', '=', $p_id);
        $res = $parent->delete();
//        $res = ParentsModel::destroy($p_id);// 可以直接这样,更快,但这里为了练习model一对多
        if ($res) {
            return $this->success('删除成功');
        }

        return $this->fail('删除失败');
    }

    public function export()
    {
        return Excel::download(new UsersExport, '学生个人信息表.xlsx');
    }

    public function info()
    {
        $user = auth()->user();
        // 从中间表中获取自己对应的表ID
        // 根据不同的人,显示不同的信息
        $foreign_id = $user->bind_user_id;
        // 获取自己的角色,管理员,老师/学生
        if ($user->hasAnyRole(['admin', 'teacher'])) {
            // 管理员和老师都显示一样的模板
            $teacher = TeachersModel::query()->where('id', $foreign_id)->first();
            return view('user.info.teacher', compact('teacher'));
        } else {
            $user = StudentModel::query()->where('id', $foreign_id)->first();

            return view('user.info.student', compact('user'));
        }
    }
}
