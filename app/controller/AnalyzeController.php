<?php

namespace app\controller;

use app\BaseController;
use app\model\CoursesModel;
use app\model\ExamsModel;
use app\model\ScoresModel;
use app\model\UserModel;
use think\facade\Db as DB;

class AnalyzeController extends BaseController
{
    protected $middleware = ['auth'];
    /*
     * 获取设置中优秀率等的比率
     */
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

    /*
     * 显示总体分析页
     */
    public function index()
    {
        if ( ! $this->user['is_admin']) {
            return view('user/noper');
        }
        $exams = ExamsModel::order('time')->select();
        $exam_first = ExamsModel::limit(1)->select()->first();
        if ($exam_first) {
            $first_id = $exam_first->id;
        } else {
            $first_id = 0;
        }

        return view('zongtifenxi', compact('exams', 'first_id'));
    }

    /*
     * 总体分析页中课程比率的饼图
     */
    public function getPie($cid, $eid)
    {
        if ($this->user['is_admin']) {
            return fail('无权限');
        }

        $full = (int)CoursesModel::where('id', '=', $cid)->value('full');
        $rate = $this->getRate();
        $sql = "SELECT c.NAME course, e.name exam, sum( CASE WHEN sc.score >= {$rate['youxiu']}*{$full} THEN 1 ELSE 0 END ) '优秀', sum( CASE WHEN sc.score >= {$rate['lianghao']}*{$full} AND sc.score < {$rate['youxiu']}*{$full} THEN 1 ELSE 0 END ) '良好', sum( CASE WHEN sc.score >= {$rate['jige']}*{$full} AND sc.score < {$rate['lianghao']}*{$full} THEN 1 ELSE 0 END ) '及格', sum( CASE WHEN sc.score < {$rate['jige']}*{$full} THEN 1 ELSE 0 END ) '不及格' FROM scores sc LEFT JOIN courses c ON c.id = sc.course_id LEFT JOIN users u ON u.id = sc.student_id LEFT JOIN exams e ON e.id = sc.exam_id WHERE u.is_admin = 0 AND c.id = {$cid} AND e.id={$eid}";
        $res = (array)DB::query($sql)[0];
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

        return view('showPie', compact('data'));
    }

    /*
     * 总体分析页表格获取数据
     */
    public function showAll()
    {
        if ( ! $this->user['is_admin']) {
            return fail('无权限');
        }
        $rate = $this->getRate();
        $eid = input('exam_id');
        $sql = "SELECT c.NAME course,c.id cid,e.id eid,e.name exam,c.full as full,count(*) join_num,sum( CASE WHEN sc.score >= ({$rate['youxiu']}*(select full from courses where id=c.id)) THEN 1 ELSE 0 END ) 'youxiu',sum( CASE WHEN sc.score >= ({$rate['lianghao']}*(select full from courses where id=c.id)) AND sc.score < ({$rate['youxiu']}*(select full from courses where id=c.id)) THEN 1 ELSE 0 END ) 'lianghao',sum( CASE WHEN sc.score >= ({$rate['jige']}*(select full from courses where id=c.id)) AND sc.score < ({$rate['lianghao']}*(select full from courses where id=c.id)) THEN 1 ELSE 0 END ) 'jige',sum( CASE WHEN sc.score < ({$rate['jige']}*(select full from courses where id=c.id)) THEN 1 ELSE 0 END ) 'bujige',format(STD(sc.score),2) std,format(AVG( sc.score ),2) avg,MAX( sc.score ) max,min( sc.score ) min FROM scores sc LEFT JOIN courses c ON c.id = sc.course_id LEFT JOIN users u ON u.id = sc.student_id LEFT JOIN exams e ON e.id = sc.exam_id WHERE u.is_admin = 0 and e.id={$eid} GROUP BY course ORDER BY cid";
        $data = DB::query($sql);
        $res['data'] = $data;
        $res['code'] = 0;
        $res['count'] = count($data);
        $res['msg'] = '获取数据失败';

        return $res;
    }

    public function tips()
    {
        if ( ! $this->user['is_admin']) {
            return fail('无权限');
        }
        $cid = input('cid');
        $eid = input('eid');
        $field = input('field');
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
        $data = DB::query($sql);
        if ($data) {
            return success('成功', $data);
        } else {
            return fail();
        }
    }

    /**
     * 获取每个学生不同考试不同课程的排名情况
     */
    public function getRank()
    {
        $uid = input('uid');
        $user = UserModel::find($uid);
        // 权限判断,判断当前登录的用户id和想要查看的用户是不是一个
        if ( ! is_own($user->id)) {
            return fail('无权限查看不是自己的成绩');
        }
        $uname = UserModel::where('id', '=', $uid)->value('name');
        // 获取学号为x的学生参加的考试
        $sql = "select distinct e.name exam from scores sc,exams e where sc.exam_id=e.id and sc.student_id={$uid} ORDER BY e.id";
        $exec_res = DB::query($sql);
        $exams = array_column($exec_res, 'exam');

        // 获取学号为x的学生的所有课程
        $sql = "select distinct c.name course from scores sc,courses c where sc.course_id=c.id and sc.student_id={$uid} ORDER BY c.id";
        $exec_res = DB::query($sql);
        $courses = array_column($exec_res, 'course');
        // 个人分析----各科分数变化折线图1
        $sql = "select t.name,group_concat(score order by eid) scores,group_concat(rank order by eid) ranks from (select a.*,if(@cid=cid,if(@sco=score,@rank,@rank:=@rank+1),@rank:=1) as rank,@sco:=score,@cid:=cid from (select u.id uid,c.name name,c.id cid,e.id eid,score from scores sc,users u,courses c,exams e where u.id=sc.student_id and c.id=sc.course_id and e.id=sc.exam_id order by e.id,c.id,score desc) a,(select @cid:=null,@sco:=null,@rank:=0) b) t where uid={$uid} group by cid order by cid,eid";
        $scdata = DB::query($sql);
        $score_series = [];
        foreach ($scdata as $d) {
            $ranks = explode(',', $d['ranks']);
            $scores = explode(',', $d['scores']);
            $data = array_map(
                function ($r, $s) {
                    return [
                        'value' => $s,
                        'score' => $r,
                    ];
                },
                $ranks,
                $scores
            );
            $score_series[] = [
                'name' => $d['name'],
                'type' => 'line',
                'smooth' => true,
                'data' => $data,
            ];
        }

        // 个人分析----各科排名变化折线图2
        $sql = "select t.name,group_concat(rank order by eid) ranks from (select a.*,if(@cid=cid,if(@sco=score,@rank,@rank:=@rank+1),@rank:=1) as rank,@sco:=score,@cid:=cid from (select u.id uid,c.name name,c.id cid,e.id eid,score from scores sc,users u,courses c,exams e where u.id=sc.student_id and c.id=sc.course_id and e.id=sc.exam_id order by e.id,c.id,score desc) a,(select @cid:=null,@sco:=null,@rank:=0) b) t where uid={$uid} group by cid order by cid,eid";
        $rkdata = DB::query($sql);
        $rkdata_series = [];
        foreach ($rkdata as $d) {
            $rkdata_series[] = [
                'name' => $d['name'],
                'type' => 'line',
                'smooth' => true,
                'data' => explode(',', $d['ranks']),
            ];
        }
        // 个人分析----总分折线图3
        $sql = "select t.uid,t.name,t.eid,t.exam,t.sum_score sum,rank from (select a.*,if(@eid=eid,if(@sco=sum_score,@rank,@rank:=@rank+1),@rank:=1) as rank,@sco:=sum_score,@eid:=eid from (select u.id uid,u.name name,e.id eid,e.name exam,sum(score) sum_score from scores sc,users u,courses c,exams e where u.id=sc.student_id and c.id=sc.course_id and e.id=sc.exam_id group by uid,eid order by eid,sum_score desc) a,(select @eid:=null,@sco:=null,@rank:=0) b) t where uid={$uid} order by eid";
        $sum_data = DB::query($sql);
        $sum_data_temp = [];
        foreach ($sum_data as $d) {
            $sum_data_temp[] = [
                'value' => $d['sum'],
                'rank' => $d['rank'],
            ];
        }
        $sum_series = [
            'type' => 'line',
            'smooth' => true,
            'data' => $sum_data_temp,
        ];

        // 个人分析----总分排名折线图4
        $sql = "select rank from (select a.*,if(@eid=eid,if(@sco=sum_score,@rank,@rank:=@rank+1),@rank:=1) as rank,@sco:=sum_score,@eid:=eid from (select u.id uid,u.name name,e.id eid,sum(score) sum_score from scores sc,users u,courses c,exams e where u.id=sc.student_id and c.id=sc.course_id and e.id=sc.exam_id group by uid,eid order by eid,sum_score desc) a,(select @eid:=null,@sco:=null,@rank:=0) b) t where uid={$uid} order by eid";
        $sum_rank_temp = DB::query($sql);
        $sum_rank_data = [];
        foreach ($sum_rank_temp as $r) {
            $sum_rank_data[] = $r['rank'];
        }
        $sum_rank_series = [
            'type' => 'line',
            'smooth' => true,
            'data' => $sum_rank_data,
        ];

        $data = compact('exams', 'uname', 'courses', 'score_series', 'rkdata_series', 'sum_series', 'sum_rank_series');
        if (array_filter($data)) {
            return success('成功', $data);
        }

        return fail('失败');
    }

    public function gerenfx()
    {
        return view('gerenfenxi');
    }

    public function hasscore()
    {
        $keyword = input('name_uid'); // 搜索学号或姓名

        // 要列出至少有一门考试的学生的列表，形成表格
        $uid = ScoresModel::distinct(true)->column('student_id');
        // 根据这个uid,从学生表里面找
        $query = UserModel::whereIn('id', $uid)->field(['id', 'uid', 'name']);
        // 搜索学号或姓名
        if ($keyword) {
            $query->where('uid', 'like', '%'.$keyword.'%')->whereOr(
                'name',
                'like',
                '%'.$keyword.'%'
            );
        }

        // 权限判断,如果不是管理员,只允许看自己的
        if ( ! $this->user['is_admin']) {
            $query->where('uid', '=', $this->user['uid']);
        }

        $data = $query->select()->toArray();
        $res['data'] = $data;
        $res['code'] = 0;
        $res['count'] = count($data);
        $res['msg'] = '获取数据失败';

        return $res;
    }
}
