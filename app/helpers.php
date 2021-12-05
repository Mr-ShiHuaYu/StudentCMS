<?php

if ( ! function_exists("is_own")) {
    function is_own($id)
    {
        return auth()->user()->id == $id;
    }
}

if ( ! function_exists("user")) {
    function user()
    {
        return auth()->user();
    }
}

if ( ! function_exists("table")) {
    function table($data)
    {
        $res['data'] = $data['data'];
        $res['code'] = 0;
        $res['count'] = $data['total'];
        $res['msg'] = '获取数据失败';

        return $res;
    }
}


