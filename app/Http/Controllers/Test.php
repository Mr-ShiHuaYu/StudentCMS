<?php

namespace App\Http\Controllers;

class Test extends Controller
{
    public function test()
    {
        $score_sep = config('sys.score_sep');

        return array_map(
            function ($item) {
                return $item / 100;
            },
            $score_sep
        );
    }

}
