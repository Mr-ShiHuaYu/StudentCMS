<?php

namespace App\Http\Controllers;

use App\Models\CoursesModel;
use Illuminate\Support\Carbon;

class Test extends Controller
{
    public function test()
    {
        echo Carbon::now()->toDateTimeString();
    }

}
