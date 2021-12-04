<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\HasRoles;

/**
 * @mixin \Eloquent
 */
class UserModel extends Authenticatable
{
    use HasRoles;
    protected $table = 'users';
    protected $guarded = [];
    protected $hidden = ['password', 'remember_token'];

}
