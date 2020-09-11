<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @mixin \Eloquent
 */
class UserModel extends Authenticatable
{
    protected $table = 'users';
    protected $guarded = [];
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

}
