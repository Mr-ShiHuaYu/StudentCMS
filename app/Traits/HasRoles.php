<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRoles
{
    use \Spatie\Permission\Traits\HasRoles {
        \Spatie\Permission\Traits\HasRoles::roles as parentRoles;
    }

    /**
     * 重写父级的trait方法,添加自己的foreign_id
     * A model may have multiple roles.
     */
    public function roles(): BelongsToMany
    {
        return $this->morphToMany(
            config('permission.models.role'),
            'model',
            config('permission.table_names.model_has_roles'),
            config('permission.column_names.model_morph_key'),
            'role_id'
        )->withPivot('foreign_id');
    }
}
