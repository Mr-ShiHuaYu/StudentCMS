<?php

namespace app\model;

use think\Model;

class TeachersModel extends Model
{
    protected $table = 'teachers';
    // 定义时间戳字段名
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
}
