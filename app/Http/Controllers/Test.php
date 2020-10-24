<?php

namespace App\Http\Controllers;
use Gate;

class Test extends Controller
{
    public function test()
    {
        $t = Gate::allows('isAdmin');
        dd($t);
    }
}
