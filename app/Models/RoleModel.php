<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Role;

/**
 * @mixin \Eloquent
 */
class RoleModel extends Role
{
    public function menus()
    {
        return $this->belongsToMany(
            config('permission.models.menu'),
            config('permission.table_names.role_has_menu'),
            'role_id',
            'menu_id'
        );
    }
}
