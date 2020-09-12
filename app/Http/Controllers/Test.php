<?php

namespace App\Http\Controllers;

use DB;

class Test extends Controller
{
    public function test()
    {
        $courses = DB::table('courses')->get();
        $sql_temp = [];
        $sql = "SELECT u.uid uid, u.name name, ";
        foreach ($courses as $course) {
            $sql_temp[] = "MAX(if(c.name='$course->name',sc.score,0)) as '$course->name'";
        }
        $sql .= join(',', $sql_temp);
        $sql .= " FROM scores sc LEFT JOIN courses c on c.id=sc.course_id LEFT JOIN users u on u.id=sc.student_id GROUP BY u.uid";

        $res = DB::table(DB::raw("($sql) as res"))->offset(0)->paginate(1);

        return $res;
    }

}
