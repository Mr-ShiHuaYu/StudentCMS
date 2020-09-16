<?php

namespace App\Http\Controllers;

use App\Models\CoursesModel;
use DB;
use Illuminate\Http\Request;

class ScoreShow extends Controller
{
    public function index()
    {
        return view('scores.analyze');
    }

    public function getPie(Request $request, $cid)
    {
        $score_sep = config('sys.score_sep');
        $full = (int)CoursesModel::where('id', '=', $cid)->value('full');
        $youxiu = $score_sep['youxiu'] * $full / 100;
        $lianghao = $score_sep['lianghao'] * $full / 100;
        $jige = $score_sep['jige'] * $full / 100;
        $sql = "SELECT c.NAME AS course, sum( CASE WHEN sc.score >= {$youxiu} THEN 1 ELSE 0 END ) AS '优秀', sum( CASE WHEN sc.score >= {$lianghao} AND sc.score < {$youxiu} THEN 1 ELSE 0 END ) AS '良好', sum( CASE WHEN sc.score >= {$jige} AND sc.score < {$lianghao} THEN 1 ELSE 0 END ) AS '及格', sum( CASE WHEN sc.score < {$jige} THEN 1 ELSE 0 END ) AS '不及格' FROM scores sc LEFT JOIN courses c ON c.id = sc.course_id LEFT JOIN users u ON u.id = sc.student_id LEFT JOIN exams e ON e.id = sc.exam_id WHERE u.is_admin = 0 AND c.id = {$cid}";
        $res = (array)DB::select($sql)[0];
        $json_str = '{"name":"","type":"pie","radius":"55%","center":["45%","50%"],"data":[],"itemStyle":{"emphasis":{"shadowBlur":10,"shadowOffsetX":0,"shadowColor":"rgba(0, 0, 0, 0.5)"}}}';
        $template = json_decode($json_str, true);
        $data = $template;
        $data['name'] = $res['course'];
        unset($res['course']);
        $t = [];
        foreach ($res as $key => $val) {
            $t[] = ['name' => $key, 'value' => $val];
        }
        $data['data'] = $t;

        return view('scores.showPie', compact('data'));
    }

    public function showAll(Request $request)
    {
        $sql = "SELECT c.NAME AS course,c.id AS cid,count(*) AS join_num,sum( CASE WHEN sc.score >= 135 THEN 1 ELSE 0 END ) AS '优秀',sum( CASE WHEN sc.score >= 120 AND sc.score < 135 THEN 1 ELSE 0 END ) AS '良好',sum( CASE WHEN sc.score >= 90 AND sc.score < 120 THEN 1 ELSE 0 END ) AS '及格',sum( CASE WHEN sc.score < 90 THEN 1 ELSE 0 END ) AS '不及格',
	AVG( sc.score ) avg,MAX( sc.score ) max,min( sc.score ) min,SUM( sc.score ) sum
FROM scores sc LEFT JOIN courses c ON c.id = sc.course_id LEFT JOIN users u ON u.id = sc.student_id LEFT JOIN exams e ON e.id = sc.exam_id WHERE u.is_admin = 0 GROUP BY course ORDER BY c.id";
        $data = DB::table(DB::raw("($sql) as res"))->get()->toArray();
        $res['data'] = $data;
        $res['code'] = 0;
        $res['count'] = count($data);
        $res['msg'] = '获取数据失败';

        return $res;
    }
}
