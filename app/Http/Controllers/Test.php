<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class Test extends Controller
{
    public function test()
    {
        return Excel::download(new UsersExport,'学生个人信息表.xlsx');
    }

}
