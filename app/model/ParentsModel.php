<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;


class ParentsModel extends Model
{
    protected $table = 'parents';
    // 定义时间戳字段名
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';

    public function student()
    {
        return $this->belongsTo(ParentsModel::class, 'student_id');
    }
}
