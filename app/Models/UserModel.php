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
    protected $guarded = [];
    protected $hidden = ['password', 'remember_token'];

    public static function getList()
    {
        $page = request('page');
        $limit = request('limit');
        $offset = ($page - 1) * $limit;
        $query = static::query()->with('roles');

        return $query->offset($offset)->paginate($limit)->toArray();
    }

}
