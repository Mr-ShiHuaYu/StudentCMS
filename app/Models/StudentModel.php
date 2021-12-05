<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Schema;

/**
 * @mixin \Eloquent
 */
class StudentModel extends Model
{
    protected $table = 'students';
    protected $guarded = [];

    protected $jishuMap = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->jishuMap = config('modelmap.jishuMap');
    }


    public static function getUserList()
    {
        $page = request('page');
        $limit = request('limit');
        $start = request('birth_start');
        $end = request('birth_end');
        $keyword = request('keyword');

        $offset = ($page - 1) * $limit;
        $query = static::query();
        if (user()->hasRole('student')) {
            // 是学生,学生只能看自己的信息
            $query->where('id', '=', auth()->user()->bind_user_id);
        }

        if ($start) {
            $query->whereDate('birth', '>', $start);
        }
        if ($end) {
            $query->whereDate('birth', '<', $end);
        }

        if ($keyword) {
            // 查找关键词
            $jishuMap = config('modelmap.jishuMap');
            if (in_array($keyword, $jishuMap)) {
                // 寄宿信息单独搜索,必须全词匹配,因为寄宿的信息在数据库中存储的是1,2,3
                $query->where('jishu', '=', array_search($keyword, $jishuMap));
            } else {
                // 获取users表中所有字段
                $temp = Schema::getColumnListing('students');
                // 去除不想要查找的字段
                $temp = array_diff($temp, ['id', 'rember_token', 'password', 'created_at', 'updated_at']);
                $sql = [];
                foreach ($temp as $t) {
                    $sql[] = "IFNULL($t,'')";
                }
                $sql = join(',', $sql);
                // 利用mysql的concat函数将所有字段的值拼接成字符串,然后使用like来查找
                $query->whereRaw("CONCAT($sql) LIKE '%$keyword%'");
            }
        }
        return $query->offset($offset)->paginate($limit)->toArray();
    }

    public static function getCount()
    {
        return static::count();
    }

    public function getJishuAttribute($value)
    {
        if (empty($value)) {
            $value = 0;
        }

        return $this->jishuMap[$value];
    }

    public function parents()
    {
        return $this->hasMany(ParentsModel::class, 'student_id');
    }

    protected static function boot()
    {
        parent::boot();
        // 在删除学生后同时删除他的家长
        self::deleting(
            function ($user) {
                $user->parents()->delete();
                ScoresModel::where('student_id', '=', $user->id)->delete();
            }
        );
    }
}
