<?php

namespace App\Http\Controllers;

use App\Models\CoursesModel;
use App\Models\ExamsModel;
use DB;

class ScoreShow extends Controller
{
    public function getRate()
    {
        $score_sep = config('sys.score_sep');

        return array_map(
            function ($item) {
                return $item / 100;
            },
            $score_sep
        );
    }

    public function index()
    {
        $exams = ExamsModel::get();

        return view('scores.analyze', compact('exams'));
    }

    public function getPie($cid, $eid)
    {
        $full = (int)CoursesModel::where('id', '=', $cid)->value('full');
        $rate = $this->getRate();
        $sql = "SELECT c.NAME course, e.name exam, sum( CASE WHEN sc.score >= {$rate['youxiu']}*{$full} THEN 1 ELSE 0 END ) '优秀', sum( CASE WHEN sc.score >= {$rate['lianghao']}*{$full} AND sc.score < {$rate['youxiu']}*{$full} THEN 1 ELSE 0 END ) '良好', sum( CASE WHEN sc.score >= {$rate['jige']}*{$full} AND sc.score < {$rate['lianghao']}*{$full} THEN 1 ELSE 0 END ) '及格', sum( CASE WHEN sc.score < {$rate['jige']}*{$full} THEN 1 ELSE 0 END ) '不及格' FROM scores sc LEFT JOIN courses c ON c.id = sc.course_id LEFT JOIN users u ON u.id = sc.student_id LEFT JOIN exams e ON e.id = sc.exam_id WHERE u.is_admin = 0 AND c.id = {$cid} AND e.id={$eid}";
        $res = (array)DB::select($sql)[0];
        $json_str = '{"name":"","type":"pie","radius":"55%","center":["45%","50%"],"data":[],"itemStyle":{"emphasis":{"shadowBlur":10,"shadowOffsetX":0,"shadowColor":"rgba(0, 0, 0, 0.5)"}}}';
        $template = json_decode($json_str, true);
        $data = $template;
        $data['name'] = $res['course'];
        $data['exam'] = $res['exam'];
        unset($res['course']);
        unset($res['exam']);
        $t = [];
        foreach ($res as $key => $val) {
            $t[] = ['name' => $key, 'value' => $val];
        }
        $data['data'] = $t;

        return view('scores.showPie', compact('data'));
    }

    public function showAll()
    {
        $rate = $this->getRate();
        $eid = request()->input('exam_id');
        $sql = "SELECT c.NAME course,c.id cid,e.id eid,e.name exam,c.full as full,count(*) join_num,sum( CASE WHEN sc.score >= ({$rate['youxiu']}*(select full from courses where id=c.id)) THEN 1 ELSE 0 END ) 'youxiu',sum( CASE WHEN sc.score >= ({$rate['lianghao']}*(select full from courses where id=c.id)) AND sc.score < ({$rate['youxiu']}*(select full from courses where id=c.id)) THEN 1 ELSE 0 END ) 'lianghao',sum( CASE WHEN sc.score >= ({$rate['jige']}*(select full from courses where id=c.id)) AND sc.score < ({$rate['lianghao']}*(select full from courses where id=c.id)) THEN 1 ELSE 0 END ) 'jige',sum( CASE WHEN sc.score < ({$rate['jige']}*(select full from courses where id=c.id)) THEN 1 ELSE 0 END ) 'bujige',AVG( sc.score ) avg,MAX( sc.score ) max,min( sc.score ) min FROM scores sc LEFT JOIN courses c ON c.id = sc.course_id LEFT JOIN users u ON u.id = sc.student_id LEFT JOIN exams e ON e.id = sc.exam_id WHERE u.is_admin = 0 and e.id={$eid} GROUP BY course ORDER BY cid";
        $data = DB::table(DB::raw("($sql) as res"))->get()->toArray();
        $res['data'] = $data;
        $res['code'] = 0;
        $res['count'] = count($data);
        $res['msg'] = '获取数据失败';

        return $res;
    }

    public function tips()
    {
        $cid = request()->input('cid');
        $eid = request()->input('eid');
        $field = request()->input('field');
        $score_sep = config('sys.score_sep');

        if ($field == 'max') {
            $sql = "SELECT u.name,s.score FROM (select exam_id,course_id,max(score) max from scores sc where exam_id={$eid} and course_id={$cid}) t,scores s,users u WHERE t.max=s.score and t.exam_id=s.exam_id and t.course_id=s.course_id and u.id=s.student_id";
        } elseif ($field == 'min') {
            $sql = "SELECT u.name,s.score FROM (select exam_id,course_id,min(score) min from scores sc where exam_id={$eid} and course_id={$cid}) t,scores s,users u WHERE t.min=s.score and t.exam_id=s.exam_id and t.course_id=s.course_id and u.id=s.student_id";
        } elseif ($field == 'youxiu') {
            $sql = "SELECT u.name,sc.score FROM scores sc,users u,(select full/100 rate from courses where id={$cid}) t WHERE sc.exam_id={$eid} and sc.course_id={$cid} and u.id=sc.student_id and sc.score>={$score_sep['youxiu']}*t.rate";
        } elseif ($field == 'lianghao') {
            $sql = "SELECT u.name,sc.score FROM scores sc,users u,(select full/100 rate from courses where id={$cid}) t WHERE sc.exam_id={$eid} and sc.course_id={$cid} and u.id=sc.student_id and sc.score<{$score_sep['youxiu']}*t.rate and sc.score>={$score_sep['lianghao']}*t.rate";
        } elseif ($field == 'jige') {
            $sql = "SELECT u.name,sc.score FROM scores sc,users u,(select full/100 rate from courses where id={$cid}) t WHERE sc.exam_id={$eid} and sc.course_id={$cid} and u.id=sc.student_id and sc.score<{$score_sep['lianghao']}*t.rate and sc.score>={$score_sep['jige']}*t.rate";
        } elseif ($field == 'bujige') {
            $sql = "SELECT u.name,sc.score FROM scores sc,users u,(select full/100 rate from courses where id={$cid}) t WHERE sc.exam_id={$eid} and sc.course_id={$cid} and u.id=sc.student_id and sc.score<{$score_sep['jige']}*t.rate";
        }
        $data = DB::table(DB::raw("($sql) as res"))->get()->toArray();
        if ($data) {
            return $this->success('成功', $data);
        } else {
            return $this->fail();
        }
    }
}
