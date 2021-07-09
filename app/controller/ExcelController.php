<?php

declare (strict_types=1);

namespace app\controller;

use think\Request;
use jianyan\excel\Excel;

class ExcelController
{
    public function jianyan()
    {
        // [名称, 字段名, 类型, 类型规则]
        $header = [
            ['ID', 'id', 'text'],
            ['手机号码', 'mobile'], // 规则不填默认text
            ['openid', 'fans.openid', 'text'],
            ['昵称', 'fans.nickname', 'text'],
            ['关注/扫描', 'type', 'selectd', [1 => '关注', 2 => '扫描']],
            ['性别', 'sex', 'function', function($model){
                return $model['sex'] == 1 ? '男' : '女';
            }],
            ['创建时间', 'created_at', 'date', 'Y-m-d'],
            ['图片', 'image', 'text'],// 本地图片 ./images/765456898612.jpg
        ];

        $list = [
            [
                'id' => 1,
                'type' => 1,
                'mobile' => '18888888888',
                'fans' => [
                    'openid' => '123',
                    'nickname' => '昵称',
                ],
                'sex' => 1,
                'create_at' => time(),
            ],
            [
                'id' => 2,
                'type' => 2,
                'mobile' => '18888888888',
                'fans' => [
                    'openid' => '1232',
                    'nickname' => '昵称2',
                ],
                'sex' => 2,
                'create_at' => time(),
            ]
        ];

        // 简单使用
        return Excel::exportData($list, $header);

// 定制 默认导出xlsx 支持 : xlsx/xls/html/csv， 支持写入绝对路径
//        return Excel::exportData($list, $header, '测试', 'xlsx', '/www/data/');

    }


    public function import()
    {
        $filePath = public_path('excel').'1.xlsx';
        $data = Excel::import($filePath, $startRow = 1,$hasImg = false,$suffix = 'Xlsx',$imageFilePath = null);
        dd($data);
    }

}
