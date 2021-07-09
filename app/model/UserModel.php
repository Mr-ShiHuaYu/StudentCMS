<?php

declare (strict_types=1);

namespace app\model;

use think\Model;

/**
 * @property bool $is_admin
 * @property bool $liushou 是否留守儿童
 * @property int $id
 * @property string $birth
 * @property string $biye 毕业学校
 * @property string $created_at
 * @property string $ganbu 曾担任干部情况
 * @property string $huji 户籍地址
 * @property string $hukou
 * @property string $huojiang 获奖情况
 * @property string $jingji
 * @property string $jishu 是否寄宿
 * @property string $liushouqk 留守儿童情况
 * @property string $liushoutgqk 留守儿童托管情况
 * @property string $minzu
 * @property string $name 学生姓名
 * @property string $password 密码
 * @property string $phone
 * @property string $remember_token
 * @property string $sex
 * @property string $sysid
 * @property string $uid 学号
 * @property string $updated_at
 * @property string $xianzz 现住址
 * @mixin \think\Model
 */
class UserModel extends Model
{
    protected $table = 'users';
    // 定义时间戳字段名
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';

    public function parents()
    {
        return $this->hasMany(ParentsModel::class, 'student_id');
    }

//    public function scopeLayui($query)
//    {
//        // 不支持返回,不支持select,find等
//        $page = input('page/d') ?? 1;
//        $limit = input('limit/d') ?? 10;
//        $query->page($page, $limit);
//    }
}
