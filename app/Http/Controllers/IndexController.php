<?php

namespace App\Http\Controllers;

use App\Models\CoursesModel;
use App\Models\ExamsModel;
use App\Models\StudentModel;
use App\Models\UserModel;
use DB;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function readme()
    {
        return view('readme');
    }

    /*
     * 首页
     */
    public function welcome()
    {
        $userCount = StudentModel::getCount();

        return view('welcome', compact('userCount'));
    }

    /*
     * 这个是在首页显示最新一次考试前十名的,暂时不要
     */
    public function welcome_ten()
    {
        $userCount = UserModel::where('is_admin', '<>', 1)->count();
        // 求这次考试各科班级排名前十,总分,语,数,英,....
        // 取出最新一次考试
        $data = [];
        $last_exam = ExamsModel::orderBy('time', 'desc')->first();
        // 总分
        $sql = "SELECT obj.*, @rownum := @rownum + 1 AS rank FROM (SELECT u.uid uid,u.name name,e.name exam,SUM(sc.score) score FROM scores sc LEFT JOIN courses c on c.id=sc.course_id LEFT JOIN students u on u.id=sc.student_id LEFT JOIN exams e ON e.id=sc.exam_id WHERE sc.exam_id={$last_exam->id} GROUP BY u.uid ORDER BY score DESC) AS obj,(SELECT @rownum := 0) r limit 10";
        $total_data = DB::table(DB::raw("($sql) as res"))->get();
        $data[] = ['title' => '总分', 'data' => $total_data];
        $courses = CoursesModel::orderBy('id')->get();
        foreach ($courses as $course) {
            $sql = "SELECT u.uid uid,u.name name,e.name exam,e.id exam_id,c.name course,sc.score score,@rownum := @rownum + 1 AS rank FROM (SELECT @rownum := 0) r,scores sc LEFT JOIN courses c on c.id=sc.course_id LEFT JOIN students u on u.id=sc.student_id LEFT JOIN exams e ON e.id=sc.exam_id WHERE sc.exam_id={$last_exam->id} and c.id={$course->id} ORDER BY score DESC limit 10";
            $temp = DB::table(DB::raw("($sql) as res"))->get();
            $data[] = ['title' => $course->name, 'data' => $temp];
        }

        return view('welcome', compact('userCount', 'data', 'last_exam'));
    }

    public function _404()
    {
        return view('404');
    }
}
