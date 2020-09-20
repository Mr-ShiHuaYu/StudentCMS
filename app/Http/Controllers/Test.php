<?php

namespace App\Http\Controllers;

class Test extends Controller
{
    public function test()
    {
        $a = ['a', 'b', 'c'];
        $b = [1, 2, 3];

        return array_map(
            function ($a, $b) {
                return [
                    'name'=>$a,
                    'value' =>$b
                ];
            },
            $a,
            $b
        );
    }

}
