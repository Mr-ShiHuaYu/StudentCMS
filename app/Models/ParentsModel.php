<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Eloquent
 */
class ParentsModel extends Model
{
    protected $table = 'parents';
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(ParentsModel::class, 'student_id');
    }
}
