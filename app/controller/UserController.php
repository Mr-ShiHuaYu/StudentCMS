<?php

declare (strict_types=1);

namespace app\controller;

use app\BaseController;
use app\model\UserModel;
use jianyan\excel\Excel;
use think\exception\ValidateException;
use think\facade\Db;
use think\facade\Session;
use think\Request;

class UserController extends BaseController
{
    protected $middleware = ['auth'];

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return view();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        if ( ! $this->user['is_admin']) {
            return view('noper');
        }
        $jishuMap = config('modelmap.jishuMap');

        return view('create', compact('jishuMap'));
    }

    public function getuser()
    {
        $user = session('user');
        $start = input('birth_start');
        $end = input('birth_end');
        $keyword = input('keyword');

        $is_admin = $this->user['is_admin'];
        $query = (new UserModel)->newQuery();
        if ($is_admin) {
//            是管理员不看自己的信息
            $query->where('is_admin', '<>', 1);
        } else {
//            不是管理员,只能看到自己的信息
            $query->where('uid', '=', $user['uid']);
        }
        if ($start) {
            $query->whereTime('birth', '>', $start);
        }
        if ($end) {
            $query->whereTime('birth', '<', $end);
        }
        if ($keyword) {
            // 查找关键词
            $jishuMap = config('modelmap.jishuMap');
            if (in_array($keyword, $jishuMap)) {
                // 寄宿信息单独搜索,必须全词匹配,因为寄宿的信息在数据库中存储的是1,2,3
                $query->where('jishu', '=', array_search($keyword, $jishuMap));
            } else {
                // 获取users表中所有字段
                $temp = Db::getTableFields('users');

                // 去除不想要查找的字段
                $cols = array_diff($temp, ['id', 'is_admin', 'rember_token', 'password', 'created_at', 'updated_at']);

                $cols = join(',', $cols);
                // 利用mysql的concat函数将所有字段的值拼接成字符串,然后使用like来查找
                $query->whereRaw("CONCAT_WS('',$cols) LIKE '%$keyword%'");
            }
        }

        return table($query);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $message = [
            'uid.unique' => '错误,已存在相同学号',
        ];

        try {
            $this->validate(
                input(),
                [
                    'uid' => 'require|unique:users',
                    'name' => 'require',
                    'phone' => 'require',
                    'sysid' => 'require',
                    'birth' => 'require',
                    'minzu' => 'require',
                ],
                $message
            );
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return fail($e->getError());
        }

        if ( ! $this->user['is_admin']) {
            return fail('您无权添加学生');
        }
        // 学生本人信息
        $student = $request->except(['parent', 'is_admin']);
        $student['password'] = make_password('123456');
        $res = $user = UserModel::create($student);
        // 家庭主要成员
        $this->insertParent($request, $user);
        if ($res) {
            return success('添加成功');
        } else {
            return fail('添加失败');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        if ( ! is_own($id)) {
            return view('noper');
        }
        $user = UserModel::find($id);

        return view('show', compact('user'));
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $user = UserModel::with(['parents'])->find($id);
        if ( ! is_own($id)) {
            return view('noper');
        }
        $jishuMap = config('modelmap.jishuMap');

        return view('edit', compact('user', 'jishuMap'));
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }

    public function insertParent(Request $request, UserModel $user)
    {
        // 家庭主要成员
        if ($request->has('parent')) {
            $parents_input = input('parent');
            $parents = [];
            foreach ($parents_input as $key => $val) {
                foreach ($val as $k => $v) {
                    $parents[$k][$key] = $v;
                }
            }
            // 判断parents中的数据合法性
            foreach ($parents as $p) {
                if ( ! (isset($p['name']) && isset($p['age']) && isset($p['relation']))) {
                    return fail('姓名,年龄,关系为必填项,请先填写');
                }
            }
            $user->parents()->delete();
            $user->parents()->saveAll($parents);
        }
    }

    public function delParent($id)
    {
        $user = UserModel::find($id);
        if ( ! is_own($id)) {
            return fail('您无权删除不是自己的家庭成员');
        }
        $p_id = input('pid');
        $parent = $user->parents()->where('id', '=', $p_id);
        $res = $parent->delete();
//        $res = ParentsModel::destroy($p_id);// 可以直接这样,更快,但这里为了练习model一对多
        if ($res) {
            return success('删除成功');
        }

        return fail('删除失败');
    }

    public function repwdForm()
    {
        return view('repwd');
    }

    public function dorepwd()
    {
        $message = [
            'newpass.length' => '密码长度必须是5到12位',
        ];

        try {
            $this->validate(
                input(),
                [
                    'oldpass' => 'require',
                    'newpass' => 'require|confirm|length:5,12',
                ],
                $message
            );
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return fail($e->getError());
        }

        $user = UserModel::where('id', $this->user['id'])->find();
        if (password_verify(input('oldpass'), $user->password)) {
//            旧密码正确
            // 验证新密码是否是和旧密码一样,一样的话就不能更改
            if (input('oldpass') == input('newpass')) {
                return fail('新密码和旧密码一致,无需修改');
            }
            $user->password = make_password(input('newpass'));
            $user->save();
            Session::delete('user');

            return success('密码修改成功');
        }

        return fail('旧密码错误,请重试!');
    }


    public function export()
    {
        if ( ! $this->user['is_admin']) {
            return view('user/noper');
        }
        // [名称, 字段名, 类型, 类型规则]
        $header = [
            ['学号', 'uid'],
            ['姓名', 'name'],
            ['性别', 'sex'],
            ['电话', 'phone'],
            ['身份证', 'sysid'],
            ['出生日期', 'birth'],
            ['民族', 'minzu'],
            ['经济', 'jingji'],
            ['户口', 'hukou'],
            [
                '寄宿',
                'jishu',
                'function',
                function ($model) {
                    return config('modelmap.jishuMap')[$model['jishu']];
                },
            ],
            ['户籍', 'huji'],
            ['现住址', 'xianzz'],
            ['是否留守', 'liushou'],
            ['留守儿童情况', 'liushouqk'],
            ['留守儿童托管情况', 'liushoutgqk'],
            ['毕业学校', 'biye'],
            ['曾担任干部情况', 'ganbu'],
            ['获奖情况', 'huojiang'],
        ];
        $list = UserModel::select()->toArray();

        return Excel::exportData($list, $header, '学生个人信息表');
    }
}
