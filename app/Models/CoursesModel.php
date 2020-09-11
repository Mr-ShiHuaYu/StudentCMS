<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Eloquent
 */
class CoursesModel extends Model
{
    protected $table = 'courses';
    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(TeachersModel::class, 'teacher_id');
    }
}
