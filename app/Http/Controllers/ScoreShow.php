<?php

namespace App\Http\Controllers;

use App\Models\CoursesModel;
use DB;
use Illuminate\Http\Request;

class ScoreShow extends Controller
{
    public function rankCourse(Request $request)
    {
        $cid = $request->input('cid');
        $score_sep = config('sys.score_sep');
        $full = (int)CoursesModel::where('id', '=', $cid)->value('full');
        $youxiu = $score_sep['youxiu'] * $full / 100;
        $lianghao = $score_sep['lianghao'] * $full / 100;
        $jige = $score_sep['jige'] * $full / 100;
        $sql = "SELECT c.NAME AS course, count(*) as count, sum( CASE WHEN sc.score >= {$youxiu} THEN 1 ELSE 0 END ) AS '优秀', sum( CASE WHEN sc.score >= {$lianghao} AND sc.score < {$youxiu} THEN 1 ELSE 0 END ) AS '良好', sum( CASE WHEN sc.score >= {$jige} AND sc.score < {$lianghao} THEN 1 ELSE 0 END ) AS '及格', sum( CASE WHEN sc.score < {$jige} THEN 1 ELSE 0 END ) AS '不及格', AVG( sc.score ) avg, SUM( sc.score ) sum FROM scores sc LEFT JOIN courses c ON c.id = sc.course_id LEFT JOIN users u ON u.id = sc.student_id LEFT JOIN exams e ON e.id = sc.exam_id WHERE u.is_admin = 0 AND c.id = {$cid}";
        echo $sql;
        dd();
        $data = DB::select($sql);
        return $data;
    }
}
