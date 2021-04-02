<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @mixin \Eloquent
 */
class MenuModel extends Model
{
    /**
     * 不需要继承Spatie\Permission\Models\Permission 模型
     * 相当于menu和roles表的多对多,这个表是单独的,和permissions表没有任何关系
     */
//    use SoftDeletes;
    protected $table = 'system_menu';
    protected $guarded = [];
    protected $hidden = ['pivot'];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            config('permission.models.role'),
            config('permission.table_names.role_has_menu'),
            'menu_id',
            'role_id'
        );
    }
}
