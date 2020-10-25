<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
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
        $userCount = UserModel::where('is_admin','<>', 1)->count();
        return view('welcome', compact('userCount'));
    }

    public function _404()
    {
        return view('404');
    }
}
