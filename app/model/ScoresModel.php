<?php

namespace app\model;

use think\Model;

class ScoresModel extends Model
{
    protected $table = 'scores';
    // 定义时间戳字段名
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
    protected $schema = [
        'id' => 'bigint',
        'score' => 'float',
        'student_id' => 'bigint',
        'exam_id' => 'bigint',
        'course_id' => 'bigint',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];
}
