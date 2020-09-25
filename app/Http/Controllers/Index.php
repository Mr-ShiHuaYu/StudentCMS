<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Index extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function welcome()
    {
        $time = Carbon::now()->toDateTimeString();

        return view('welcome',compact('time'));
    }
}
