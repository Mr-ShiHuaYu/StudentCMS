<?php

namespace App\Http\Controllers;

use DB;

class Test extends Controller
{
    public function test()
    {
        $res = DB::table('exams')->get()->toArray();
        var_export($res);
        return $res;
    }

}
