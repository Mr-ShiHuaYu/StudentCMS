<?php

namespace App\Http\Controllers;

use App\Models\CoursesModel;
use App\Models\ExamsModel;
use Illuminate\Support\Carbon;

class Test extends Controller
{
    public function test()
    {
        $exam_first = ExamsModel::first();
        if($exam_first) {
            dd($exam_first->id);
        }
    }

}
