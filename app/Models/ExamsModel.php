<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Eloquent
 */
class ExamsModel extends Model
{
    protected $table = 'exams';
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        self::deleting(
            function ($exam) {
                ScoresModel::where('exam_id', '=', $exam->id)->delete();
            }
        );
    }
}
