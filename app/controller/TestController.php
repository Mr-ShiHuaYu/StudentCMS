<?php

//declare (strict_types=1);

namespace app\controller;

class TestController
{
    public function index()
    {
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

        ];
        dd($header);
    }

}
