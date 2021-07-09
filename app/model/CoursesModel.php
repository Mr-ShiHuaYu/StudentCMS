<?php

namespace app\model;

use think\Model;

class CoursesModel extends Model
{
    protected $table = 'courses';
    // 定义时间戳字段名
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';

    protected $schema = [
        'id' => 'bigint',
        'name' => 'varchar',
        'full' => 'int',
        'teacher_id' => 'bigint',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public function teacher()
    {
        return $this->belongsTo(TeachersModel::class, 'teacher_id');
    }

    public static function onAfterDelete($course)
    {
        ScoresModel::where('course_id', '=', $course->id)->delete();
    }
}
