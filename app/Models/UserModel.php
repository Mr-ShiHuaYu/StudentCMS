<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @mixin \Eloquent
 */
class UserModel extends Authenticatable
{
    use HasRoles;
    protected $table = 'users';
    protected $guarded = ['is_admin'];
    protected $hidden = ['password', 'remember_token'];
    protected $jishuMap = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->jishuMap = config('modelmap.jishuMap');
    }

    public function getJishuAttribute($value)
    {
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
