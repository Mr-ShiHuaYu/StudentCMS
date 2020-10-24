<?php

namespace App\Exports;

use DB;
use Gate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ScoresExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $is_admin = Gate::allows('isAdmin');
        $courses = DB::table('courses')->orderBy('id')->get();
        $sql_temp = [];
        $sql = "SELECT u.uid uid,u.name name,e.name exam,";
        foreach ($courses as $course) {
            $sql_temp[] = "MAX(if(c.name='$course->name',sc.score,0)) as '$course->name'";
        }
        $sql .= join(',', $sql_temp);
        $sql .= ",AVG(sc.score) avg,SUM(sc.score) sum";
        $sql .= " FROM scores sc
        LEFT JOIN courses c on c.id=sc.course_id
        LEFT JOIN users u on u.id=sc.student_id
        LEFT JOIN exams e ON e.id=sc.exam_id";
        $uid = auth()->user()->uid;
        // 添加权限判断,学生只能查看自己的成绩
        if ($is_admin) {
            $sql .= " WHERE u.is_admin = 0";
        } else {
            $sql .= " WHERE u.uid = '$uid'";
        }
        $sql .= " GROUP BY u.uid,e.name ORDER BY sc.created_at";
        $data = DB::select($sql);

        return collect($data);
    }

    public function headings(): array
    {
        $courses = DB::table('courses')->orderBy('id')->pluck('name')->toArray();
        array_unshift($courses, '学号', '姓名', '考试');
        array_push($courses, '平均分', '总分');

        return $courses;
    }
}
