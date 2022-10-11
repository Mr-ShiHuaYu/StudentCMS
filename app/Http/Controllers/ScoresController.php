<?php

namespace App\Http\Controllers;

use App\Exports\ScoresExport;
use App\Models\CoursesModel;
use App\Models\ExamsModel;
use App\Models\ScoresModel;
use App\Models\StudentModel;
use App\Models\UserModel;
use DB;
use Doctrine\DBAL\Schema\Schema;
use Gate;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ScoresController extends Controller
{

    public function index()
    {
        $courses = DB::table('courses')->orderBy('id')->get();
        $exams = ExamsModel::orderBy('time')->get();

        return view('scores.index', compact('courses', 'exams'));
    }

    public function getscore(Request $request)
    {
        // 全站最难,最关键的方法,利用mysql的if函数,将行转列,按学生的学号分组,max最课程成绩最大值,正常来说,一个学生的一次考试一个课程的成绩只有一个
        // 要考虑权限,学生只能查看自己的成绩
        $page = request('page');
        $limit = request('limit');
        $offset = ($page - 1) * $limit;
        $exam_id = request('exam_id'); // 搜索考试
        $keyword = request('name_uid'); // 搜索学号或姓名
        $courses = DB::table('courses')->orderBy('id')->get();
        $sql_temp = [];
        $sql = "SELECT u.id,u.uid uid,u.name name,e.name exam,";
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
        $sql .= " FROM scores sc JOIN courses c on c.id=sc.course_id JOIN students u on u.id=sc.student_id JOIN exams e ON e.id=sc.exam_id";
        $uid = user()->bind_user_id;
        // 添加权限判断,学生只能查看自己的成绩
        if (user()->hasRole('student')) {
            $sql .= " WHERE u.id = '$uid'";
        }
        // 搜索考试
        if ($exam_id) {
            $sql .= " and e.id=$exam_id";
        }
        // 搜索学号或姓名
        if ($keyword) {
            $student_id = StudentModel::where('uid', 'like', '%' . $keyword . '%')->orWhere(
                'name',
                'like',
                '%' . $keyword . '%'
            )->pluck('id')->toArray();
            $id_str = join(',', $student_id);
            $sql .= " and u.id IN ($id_str)";
        }
        $sql .= " GROUP BY u.uid,e.name ORDER BY e.id";
        $data = DB::table(DB::raw("($sql) as res"))->offset($offset)->paginate($limit)->toArray();
        $res['data'] = $data['data'];
        $res['code'] = 0;
        $res['count'] = $data['total'];
        $res['msg'] = '获取数据失败';

        return $res;
    }


    public function create()
    {
        // 列表检查,已经添加的不显示
        $student_id = auth()->user()->bind_user_id;
        // 筛选中数据库中已经存在的这个学生的考试记录,在添加时,不显示出来,避免重复添加相同记录
        $exam_rec = ScoresModel::where('student_id', '=', $student_id)->select('exam_id as exam')->distinct()->get()->toArray();
        $exams = ExamsModel::whereNotIn('id', $exam_rec)->orderBy('time')->get();
        $courses = CoursesModel::get();
        $query = StudentModel::query();
        // 添加权限判断,学生录入只能录入自己的名字的成绩
        if (user()->hasRole('student')) {
            $query->where('uid', '=', user()->uid);
        }
        $students = $query->get();

        return view('scores.create', compact('exams', 'courses', 'students'));
    }


    public function store(Request $request)
    {
        $student = (int)$request->input('student_id');
        $is_admin = auth()->user()->hasRole("admin");
        if (!$is_admin && $student !== user()->bind_user_id) {
            return $this->fail('非法操作,不能添加不是自己的成绩');
        }
        $exam = $request->input('exam_id');
        $input = $request->only('course_id', 'score');
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
            $is_exist = ScoresModel::where($t)->exists();
            if ($is_exist) {
                return $this->fail('已经存在同一考试同一课程的成绩,禁止重复插入!');
            }
            // 获取每个课程的最大分数
//            $full_max = CoursesModel::max('full');
            $course = CoursesModel::where('id', '=', $d['course_id'])->select(['full', 'name'])->first();
            if ($d['score'] < 0 or $d['score'] > $course->full) {
                return $this->fail("{$course->name}成绩不合法,成绩应在0-{$course->full}分之间");
            }
            $temp = ScoresModel::create($d);
            if (!$temp) {
                $flag = false;
            }
        }
        if ($flag) {
            return $this->success('添加成功');
        } else {
            return $this->fail('添加失败');
        }
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        if ($input['score'] < 0 or $input['score'] > 150) {
            return $this->fail('成绩不合法,成绩应在0-150分之间');
        }
        $student_id = (int)$input['id'];
        $course_id = CoursesModel::where('name', '=', $input['course'])->value('id');
        $exam_id = ExamsModel::where('name', '=', $input['exam'])->value('id');
        $res = ScoresModel::where(compact('student_id', 'course_id', 'exam_id'))
            ->update(['score' => $input['score']]);

        if ($res) {
            return $this->success('修改成功');
        } else {
            return $this->fail('修改失败');
        }
    }


    public function export()
    {
        if (Gate::denies('isAdmin')) {
            return view('user.noper');
        }

        return Excel::download(new ScoresExport, '学生考试成绩表.xlsx');
    }

    public function getFull()
    {
        if (request()->has('field')) {
            $course = request()->input('field');

            $full = CoursesModel::where('name', '=', $course)->value('full');
        } else {
            $course_id = request()->input('course_id');
            $full = CoursesModel::where('id', '=', $course_id)->value('full');
        }


        return response()->json(['full' => $full]);
    }
}
