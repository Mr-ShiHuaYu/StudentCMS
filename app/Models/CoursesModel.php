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

    protected static function boot()
    {
        parent::boot();
        // 在删除课程时同时删除关联成绩
        self::deleting(
            function ($course) {
                ScoresModel::where('course_id', '=', $course->id)->delete();
            }
        );
    }
}
