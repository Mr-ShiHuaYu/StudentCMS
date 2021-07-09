<?php

declare (strict_types=1);

namespace app\controller;

use app\BaseController;
use app\model\UserModel;
use app\validate\UserValidate;
use think\facade\Session;
use think\Request;

class LoginController extends BaseController
{
    protected $middleware = [
        'auth' => [
            'only' => ['logout'],
        ],
        'guest' => [
            'except' => ['logout'],
        ],
    ];

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return view();
    }


    public function save(Request $request)
    {
        if ($request->isPost()) {
            $validate = new UserValidate();
            if ( ! $validate->scene('login')->check(input())) {
                return fail($validate->getError());
            }

            $uid = input('post.uid');
            $password = input('post.password');
            $user = UserModel::where('uid', $uid)->find();

            $check = password_verify($password, $user->password);
            if ( ! $check) {
                return fail('用户名或密码错误,登录失败');
            }
            $info = [
                'id' => $user->id,
                'uid' => $user->uid,
                'name' => $user->name,
                'is_admin' => $user->is_admin,
            ];
            Session::set('user', $info);

            return success('登录成功');
        } else {
            return fail('非法请求');
        }
    }

    // 退出登陆
    public static function logout()
    {
        Session::delete('user');

        return success('退出登录成功');
    }

    public static function isLogin()
    {
        if (Session::get('user')) {
            return true;
        }

        return false;
    }
}
