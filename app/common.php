<?php

// 应用公共文件
use think\db\BaseQuery;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\db\Query;
use think\wenhainan\Auth;

if ( ! function_exists('asset')) {
    function asset($url)
    {
        return url('/'.$url)->suffix('')->build();
    }
}


if ( ! function_exists('success')) {
    function success(string $msg = '成功', array $data = [])
    {
        return json(
            [
                'status' => 'success',
                'msg' => $msg,
                'data' => $data,
            ]
        );
    }
}


if ( ! function_exists('fail')) {
    function fail(string $msg = '成功', array $data = [])
    {
        return json(
            [
                'status' => 'fail',
                'msg' => $msg,
                'data' => $data,
            ]
        );
    }
}

if ( ! function_exists('make_password')) {
    function make_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}


if ( ! function_exists('is_own')) {
    function is_own($id)
    {
        $user = session('user');
        if ($user['is_admin']) {
            return true;
        }

        return $user['uid'] == $id;
    }
}

/**
 * @param  BaseQuery|Query  $query
 * @return mixed
 */
if ( ! function_exists('table')) {
    function table($query)
    {
        $page = input('page/d')??1;
        $limit = input('limit/d')??10;
        $data = $query->page($page, $limit)->select()->toArray();
        $res['data'] = $data;
        $res['code'] = 0;
        $res['count'] = count($data);
        $res['msg'] = '获取数据失败';

        return $res;
    }
}


if ( ! function_exists('auth')) {
    /**
     * @param string $name 权限名称或规则名称
     * @param string|integer $uid 用户id
     * @return bool
     */
    function auth($name, $uid)
    {
        $auth = Auth::instance();
        return $auth->check($name, $uid);
    }
}