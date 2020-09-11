<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Index extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function welcome()
    {
        return view('welcome');
    }
}
