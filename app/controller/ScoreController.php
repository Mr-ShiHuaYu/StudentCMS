<?php

namespace app\controller;

use app\BaseController;
use app\model\CoursesModel;
use app\model\ExamsModel;
use app\model\ScoresModel;
use app\model\UserModel;
use think\facade\Db as DB;
use think\facade\Request;

class ScoreController extends BaseController
{
    protected $middleware = ['auth'];
    public function index()
    {
        $courses = CoursesModel::order('id')->select();
        $exams = ExamsModel::order('time')->select();

        return view('index', compact('courses', 'exams'));
    }

    public function getscore(Request $request)
    {
        // 全站最难,最关键的方法,利用mysql的if函数,将行转列,按学生的学号分组,max最课程成绩最大值,正常来说,一个学生的一次考试一个课程的成绩只有一个
        // 要考虑权限,学生只能查看自己的成绩
        $is_admin = $this->user['is_admin'];
        $page = input('page/d');
        $limit = input('limit/d');
        $offset = ($page - 1) * $limit;
        $exam_id = input('exam_id'); // 搜索考试
        $keyword = input('name_uid'); // 搜索学号或姓名
        $courses = CoursesModel::order('id')->select();
        $sql_temp = [];
        $sql = "SELECT u.uid uid,u.name name,e.name exam,";
        // 行列转换的sql拼接代码,动态遍历全部课程
        foreach ($courses as $course) {
            $sql_temp[] = "MAX(if(c.name='$course->name',sc.score,0)) as '$course->name'";
        }
        $sql .= join(',', $sql_temp);
        // 如果有课程,则还需要在末尾添加,
        if (count($courses)) {
            $sql .= ',';
        }
        // 平均分,总分,标准差
        $sql .= "format(AVG(sc.score),2) avg,SUM(sc.score) sum,format(STD(sc.score),2) std";
        $sql .= " FROM scores sc LEFT JOIN courses c on c.id=sc.course_id LEFT JOIN users u on u.id=sc.student_id LEFT JOIN exams e ON e.id=sc.exam_id";
        $uid = $this->user['uid'];
        // 添加权限判断,学生只能查看自己的成绩
        if ($is_admin) {
            $sql .= " WHERE u.is_admin = 0";
        } else {
            $sql .= " WHERE u.uid = '$uid'";
        }
        // 搜索考试
        if ($exam_id) {
            $sql .= " and e.id=$exam_id";
        }
        // 搜索学号或姓名
        if ($keyword) {
            $student_id = UserModel::where('uid', 'like', '%'.$keyword.'%')->orWhere(
                'name',
                'like',
                '%'.$keyword.'%'
            )->pluck('id')->toArray();
            $id_str = join(',', $student_id);
            $sql .= " and u.id IN ($id_str)";
        }
        $sql .= " GROUP BY u.uid,e.name ORDER BY e.id limit {$offset},{$limit}";
        $data = DB::query($sql);
        $res['data'] = $data;
        $res['code'] = 0;
        $res['count'] = count($data);
        $res['msg'] = '获取数据失败';

        return $res;
    }


    public function create()
    {
        // 列表检查,已经添加的不显示
        $student_id = $this->user['id'];
        // 筛选中数据库中已经存在的这个学生的考试记录,在添加时,不显示出来,避免重复添加相同记录
        $exam_rec = ScoresModel::where('student_id', '=', $student_id)->field('exam_id as exam')->distinct()->select()->toArray();
        $exams = ExamsModel::whereNotIn('id', $exam_rec)->order('time')->select();
        $courses = CoursesModel::select();
        $is_admin = $this->user['is_admin'];
        $query = (new UserModel)->newQuery();
        // 添加权限判断,学生录入只能录入自己的名字的成绩
        if ($is_admin) {
            $students = $query->where('is_admin', '<>', 1);
        } else {
            // 如果是学生,只筛选出自己的
            $students = $query->where('uid', '=', $this->user['uid']);
        }
        $students = $students->select();

        return view('create', compact('exams', 'courses', 'students'));
    }


    public function save(Request $request)
    {
        $student = input('student_id/d');
        $is_admin = $this->user['is_admin'];
        if ( ! $is_admin && $student !== $this->user['id']) {
            return fail('非法操作,不能添加不是自己的成绩');
        }
        $exam = input('exam_id');
        $input = Request::only(['course_id', 'score']);
        $data = [];
        $flag = true;
        foreach ($input as $key => $val) {
            foreach ($val as $k => $v) {
                $data[$k][$key] = $v;
                $data[$k]['student_id'] = $student;
                $data[$k]['exam_id'] = $exam;
            }
        }
        // 此时的data每一个都是这样的数据:
        //[
        //    "course_id" => "3"
        //    "student_id" => 2
        //    "exam_id" => "2"
        //    "score" => "145"
        //  ]
        foreach ($data as $d) {
            // 插入前判断,有没有相同的成绩
            $t = $d;
            unset($t['score']);
            $is_exist = ScoresModel::where($t)->count();
            if ($is_exist) {
                return fail('已经存在同一考试同一课程的成绩,禁止重复插入!');
            }
            // 获取每个课程的最大分数
//            $full_max = CoursesModel::max('full');
            $course = CoursesModel::where('id', '=', $d['course_id'])->field(['full', 'name'])->find();
            if ($d['score'] < 0 or $d['score'] > $course->full) {
                return fail("{$course->name}成绩不合法,成绩应在0-{$course->full}分之间");
            }
            $temp = ScoresModel::create($d);
            if ( ! $temp) {
                $flag = false;
            }
        }
        if ($flag) {
            return success('添加成功');
        } else {
            return fail('添加失败');
        }
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $input = input();
        if ($input['score'] < 0 or $input['score'] > 150) {
            return fail('成绩不合法,成绩应在0-150分之间');
        }
        $student_id = UserModel::where('uid', '=', $input['uid'])->value('id');
        $course_id = CoursesModel::where('name', '=', $input['course'])->value('id');
        $exam_id = ExamsModel::where('name', '=', $input['exam'])->value('id');
        $score = $input['score'];
        $exit = ScoresModel::where(compact('student_id', 'course_id', 'exam_id'))->count();
        if ($exit) {
            $res = ScoresModel::where(compact('student_id', 'course_id', 'exam_id'))->update(['score' => $score]);
        } else {
            $res = ScoresModel::create(compact('student_id', 'course_id', 'exam_id', 'score'));
        }

        if ($res) {
            return success('修改成功');
        } else {
            return fail('修改失败');
        }
    }


    public function export()
    {
        if ( ! $this->user['is_admin']) {
            return view('user/noper');
        }

        return Excel::download(new ScoresExport, '学生考试成绩表.xlsx');
    }

    public function getFull()
    {
        if (Request::has('field')) {
            $course = input('field');

            $full = CoursesModel::where('name', '=', $course)->value('full');
        } else {
            $course_id = input('course_id');
            $full = CoursesModel::where('id', '=', $course_id)->value('full');
        }


        return json(['full' => $full]);
    }
}
