<?php

namespace App\Http\Controllers;

use App\Models\ParentsModel;
use App\Models\UserModel;

class Test extends Controller
{
    public function test()
    {
        // 一对多正向查询,即学生找家长
        $user = UserModel::with('parents')->find(1);
        $users = UserModel::with('parents')->has('parents')->get();// 找出所有外键有关联的记录
//        dd($user->toArray());
        foreach ($user->parents as $parent) {
            echo $parent->name;
        }

        // 反向查询
        $parent = ParentsModel::find(1);
        echo '所属的学生是:'.$parent->student->name;
    }

    public function test1()
    {

    }
}
