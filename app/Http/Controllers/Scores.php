<?php

namespace App\Http\Controllers;

use App\Models\CoursesModel;
use App\Models\ExamsModel;
use App\Models\ScoresModel;
use App\Models\UserModel;
use DB;
use Illuminate\Http\Request;

class Scores extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = DB::table('courses')->orderBy('id')->get();

        return view('scores.index', compact('courses'));
    }

    public function getscore(Request $request)
    {
        // 全站最难,最关键的方法,利用mysql的if函数,将行转列,按学生的学号分组,max最课程成绩最大值,正常来说,一个学生的一次考试一个课程的成绩只有一个
        $page = $request->get('page');
        $limit = $request->get('limit');
        $offset = ($page - 1) * $limit;
        $courses = DB::table('courses')->orderBy('id')->get();
        $sql_temp = [];
        $sql = "SELECT u.uid uid,u.name name,e.name exam,";
        foreach ($courses as $course) {
            $sql_temp[] = "MAX(if(c.name='$course->name',sc.score,0)) as '$course->name'";
        }
        $sql .= join(',', $sql_temp);
        $sql .= " FROM scores sc
        LEFT JOIN courses c on c.id=sc.course_id
        LEFT JOIN users u on u.id=sc.student_id
        LEFT JOIN exams e ON e.id=sc.exam_id
        GROUP BY u.uid";
        $data = DB::table(DB::raw("($sql) as res"))->offset($offset)->paginate($limit)->toArray();
        $res['data'] = $data['data'];
        $res['code'] = 0;
        $res['count'] = $data['total'];
        $res['msg'] = '获取数据失败';

        return $res;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exams = ExamsModel::get();
        $courses = CoursesModel::get();
        $students = UserModel::where('is_admin', '<>', 1)->get();

        return view('scores.create', compact('exams', 'courses', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = $request->input('student_id');
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
        foreach ($data as $d) {
            $temp = ScoresModel::create($d);
            if ( ! $temp) {
                $flag = false;
            }
        }
        if ($flag) {
            return $this->success('添加成功');
        } else {
            return $this->fail('添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
