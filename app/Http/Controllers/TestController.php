<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function test()
    {
        $user = auth()->user();
        foreach ($user->roles as $role) {
            dump($role->pivot);
        }
//        dd($user->roles()->pivot);
    }
}
