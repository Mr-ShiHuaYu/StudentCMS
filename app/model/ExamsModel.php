<?php

namespace app\model;

use think\Model;


class ExamsModel extends Model
{
    protected $table = 'exams';
    // 定义时间戳字段名
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';

    protected $schema = [
        'id' => 'bigint',
        'name' => 'varchar',
        'time' => 'date',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public static function onAfterDelete(Model $model)
    {
        ScoresModel::where('exam_id', '=', $model->id)->delete();
    }
}
