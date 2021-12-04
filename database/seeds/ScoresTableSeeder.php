<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ScoresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('scores')->delete();
        
        \DB::table('scores')->insert(array (
            0 => 
            array (
                'id' => 42,
                'score' => 67.0,
                'student_id' => 3,
                'exam_id' => 5,
                'course_id' => 3,
                'created_at' => '2020-09-13 01:26:57',
                'updated_at' => '2020-09-13 01:26:57',
            ),
            1 => 
            array (
                'id' => 43,
                'score' => 77.0,
                'student_id' => 3,
                'exam_id' => 5,
                'course_id' => 4,
                'created_at' => '2020-09-13 01:26:57',
                'updated_at' => '2020-09-13 01:26:57',
            ),
            2 => 
            array (
                'id' => 44,
                'score' => 77.0,
                'student_id' => 3,
                'exam_id' => 5,
                'course_id' => 5,
                'created_at' => '2020-09-13 01:26:57',
                'updated_at' => '2020-09-13 01:26:57',
            ),
            3 => 
            array (
                'id' => 45,
                'score' => 127.0,
                'student_id' => 3,
                'exam_id' => 5,
                'course_id' => 6,
                'created_at' => '2020-09-13 01:26:57',
                'updated_at' => '2020-09-13 01:26:57',
            ),
            4 => 
            array (
                'id' => 46,
                'score' => 99.0,
                'student_id' => 3,
                'exam_id' => 5,
                'course_id' => 7,
                'created_at' => '2020-09-13 01:26:57',
                'updated_at' => '2020-09-13 01:26:57',
            ),
            5 => 
            array (
                'id' => 47,
                'score' => 99.0,
                'student_id' => 3,
                'exam_id' => 5,
                'course_id' => 8,
                'created_at' => '2020-09-13 01:26:57',
                'updated_at' => '2020-09-13 01:26:57',
            ),
            6 => 
            array (
                'id' => 48,
                'score' => 87.0,
                'student_id' => 3,
                'exam_id' => 5,
                'course_id' => 9,
                'created_at' => '2020-09-13 01:26:57',
                'updated_at' => '2020-09-13 01:26:57',
            ),
            7 => 
            array (
                'id' => 51,
                'score' => 135.0,
                'student_id' => 3,
                'exam_id' => 6,
                'course_id' => 3,
                'created_at' => '2020-09-13 01:57:55',
                'updated_at' => '2020-09-15 22:11:59',
            ),
            8 => 
            array (
                'id' => 52,
                'score' => 98.0,
                'student_id' => 3,
                'exam_id' => 6,
                'course_id' => 4,
                'created_at' => '2020-09-13 01:57:55',
                'updated_at' => '2020-09-13 01:57:55',
            ),
            9 => 
            array (
                'id' => 53,
                'score' => 88.0,
                'student_id' => 3,
                'exam_id' => 6,
                'course_id' => 5,
                'created_at' => '2020-09-13 01:57:55',
                'updated_at' => '2020-09-13 01:57:55',
            ),
            10 => 
            array (
                'id' => 54,
                'score' => 77.0,
                'student_id' => 3,
                'exam_id' => 6,
                'course_id' => 6,
                'created_at' => '2020-09-13 01:57:55',
                'updated_at' => '2020-09-13 01:57:55',
            ),
            11 => 
            array (
                'id' => 55,
                'score' => 88.0,
                'student_id' => 3,
                'exam_id' => 6,
                'course_id' => 7,
                'created_at' => '2020-09-13 01:57:55',
                'updated_at' => '2020-09-13 01:57:55',
            ),
            12 => 
            array (
                'id' => 56,
                'score' => 88.0,
                'student_id' => 3,
                'exam_id' => 6,
                'course_id' => 8,
                'created_at' => '2020-09-13 01:57:55',
                'updated_at' => '2020-09-13 01:57:55',
            ),
            13 => 
            array (
                'id' => 57,
                'score' => 99.0,
                'student_id' => 3,
                'exam_id' => 6,
                'course_id' => 9,
                'created_at' => '2020-09-13 01:57:55',
                'updated_at' => '2020-09-13 01:57:55',
            ),
            14 => 
            array (
                'id' => 78,
                'score' => 76.0,
                'student_id' => 14,
                'exam_id' => 3,
                'course_id' => 3,
                'created_at' => '2020-09-13 20:13:39',
                'updated_at' => '2020-09-13 20:13:39',
            ),
            15 => 
            array (
                'id' => 79,
                'score' => 89.0,
                'student_id' => 14,
                'exam_id' => 3,
                'course_id' => 4,
                'created_at' => '2020-09-13 20:13:39',
                'updated_at' => '2020-09-13 20:13:39',
            ),
            16 => 
            array (
                'id' => 80,
                'score' => 89.0,
                'student_id' => 14,
                'exam_id' => 3,
                'course_id' => 5,
                'created_at' => '2020-09-13 20:13:39',
                'updated_at' => '2020-09-13 20:13:39',
            ),
            17 => 
            array (
                'id' => 81,
                'score' => 87.0,
                'student_id' => 14,
                'exam_id' => 3,
                'course_id' => 6,
                'created_at' => '2020-09-13 20:13:39',
                'updated_at' => '2020-09-13 20:13:39',
            ),
            18 => 
            array (
                'id' => 82,
                'score' => 67.0,
                'student_id' => 14,
                'exam_id' => 3,
                'course_id' => 7,
                'created_at' => '2020-09-13 20:13:39',
                'updated_at' => '2020-09-13 20:13:39',
            ),
            19 => 
            array (
                'id' => 83,
                'score' => 89.0,
                'student_id' => 14,
                'exam_id' => 3,
                'course_id' => 8,
                'created_at' => '2020-09-13 20:13:39',
                'updated_at' => '2020-09-13 20:13:39',
            ),
            20 => 
            array (
                'id' => 84,
                'score' => 87.0,
                'student_id' => 14,
                'exam_id' => 3,
                'course_id' => 9,
                'created_at' => '2020-09-13 20:13:39',
                'updated_at' => '2020-09-13 20:13:39',
            ),
            21 => 
            array (
                'id' => 115,
                'score' => 127.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 3,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            22 => 
            array (
                'id' => 116,
                'score' => 79.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 4,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-10-20 22:53:03',
            ),
            23 => 
            array (
                'id' => 117,
                'score' => 89.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 5,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            24 => 
            array (
                'id' => 118,
                'score' => 95.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 6,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2021-01-02 15:38:41',
            ),
            25 => 
            array (
                'id' => 119,
                'score' => 90.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 7,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            26 => 
            array (
                'id' => 120,
                'score' => 78.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 8,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            27 => 
            array (
                'id' => 121,
                'score' => 88.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 9,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            28 => 
            array (
                'id' => 124,
                'score' => 145.0,
                'student_id' => 4,
                'exam_id' => 1,
                'course_id' => 3,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            29 => 
            array (
                'id' => 125,
                'score' => 97.0,
                'student_id' => 4,
                'exam_id' => 1,
                'course_id' => 4,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-10-24 19:16:02',
            ),
            30 => 
            array (
                'id' => 126,
                'score' => 94.0,
                'student_id' => 4,
                'exam_id' => 1,
                'course_id' => 5,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            31 => 
            array (
                'id' => 127,
                'score' => 89.0,
                'student_id' => 4,
                'exam_id' => 1,
                'course_id' => 6,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            32 => 
            array (
                'id' => 128,
                'score' => 76.0,
                'student_id' => 4,
                'exam_id' => 1,
                'course_id' => 7,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            33 => 
            array (
                'id' => 129,
                'score' => 79.0,
                'student_id' => 4,
                'exam_id' => 1,
                'course_id' => 8,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            34 => 
            array (
                'id' => 130,
                'score' => 89.0,
                'student_id' => 4,
                'exam_id' => 1,
                'course_id' => 9,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            35 => 
            array (
                'id' => 133,
                'score' => 143.0,
                'student_id' => 6,
                'exam_id' => 1,
                'course_id' => 3,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            36 => 
            array (
                'id' => 134,
                'score' => 89.0,
                'student_id' => 6,
                'exam_id' => 1,
                'course_id' => 4,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            37 => 
            array (
                'id' => 135,
                'score' => 87.0,
                'student_id' => 6,
                'exam_id' => 1,
                'course_id' => 5,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            38 => 
            array (
                'id' => 136,
                'score' => 88.0,
                'student_id' => 6,
                'exam_id' => 1,
                'course_id' => 6,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            39 => 
            array (
                'id' => 137,
                'score' => 77.0,
                'student_id' => 6,
                'exam_id' => 1,
                'course_id' => 7,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            40 => 
            array (
                'id' => 138,
                'score' => 77.0,
                'student_id' => 6,
                'exam_id' => 1,
                'course_id' => 8,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            41 => 
            array (
                'id' => 139,
                'score' => 75.0,
                'student_id' => 6,
                'exam_id' => 1,
                'course_id' => 9,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            42 => 
            array (
                'id' => 142,
                'score' => 122.0,
                'student_id' => 4,
                'exam_id' => 3,
                'course_id' => 3,
                'created_at' => '2020-09-20 09:38:31',
                'updated_at' => '2020-09-20 09:38:31',
            ),
            43 => 
            array (
                'id' => 143,
                'score' => 79.0,
                'student_id' => 4,
                'exam_id' => 3,
                'course_id' => 4,
                'created_at' => '2020-09-20 09:38:31',
                'updated_at' => '2020-09-21 08:29:34',
            ),
            44 => 
            array (
                'id' => 144,
                'score' => 78.0,
                'student_id' => 4,
                'exam_id' => 3,
                'course_id' => 5,
                'created_at' => '2020-09-20 09:38:31',
                'updated_at' => '2020-09-20 09:38:31',
            ),
            45 => 
            array (
                'id' => 145,
                'score' => 89.0,
                'student_id' => 4,
                'exam_id' => 3,
                'course_id' => 6,
                'created_at' => '2020-09-20 09:38:31',
                'updated_at' => '2020-09-20 09:38:31',
            ),
            46 => 
            array (
                'id' => 146,
                'score' => 87.0,
                'student_id' => 4,
                'exam_id' => 3,
                'course_id' => 7,
                'created_at' => '2020-09-20 09:38:31',
                'updated_at' => '2020-09-20 09:38:31',
            ),
            47 => 
            array (
                'id' => 147,
                'score' => 67.0,
                'student_id' => 4,
                'exam_id' => 3,
                'course_id' => 8,
                'created_at' => '2020-09-20 09:38:31',
                'updated_at' => '2020-09-20 09:38:31',
            ),
            48 => 
            array (
                'id' => 148,
                'score' => 67.0,
                'student_id' => 4,
                'exam_id' => 3,
                'course_id' => 9,
                'created_at' => '2020-09-20 09:38:31',
                'updated_at' => '2020-09-20 09:38:31',
            ),
            49 => 
            array (
                'id' => 151,
                'score' => 133.0,
                'student_id' => 4,
                'exam_id' => 4,
                'course_id' => 3,
                'created_at' => '2020-09-20 09:39:43',
                'updated_at' => '2020-09-20 09:39:43',
            ),
            50 => 
            array (
                'id' => 152,
                'score' => 89.0,
                'student_id' => 4,
                'exam_id' => 4,
                'course_id' => 4,
                'created_at' => '2020-09-20 09:39:43',
                'updated_at' => '2020-09-20 09:39:43',
            ),
            51 => 
            array (
                'id' => 153,
                'score' => 98.0,
                'student_id' => 4,
                'exam_id' => 4,
                'course_id' => 5,
                'created_at' => '2020-09-20 09:39:43',
                'updated_at' => '2020-09-20 09:39:43',
            ),
            52 => 
            array (
                'id' => 154,
                'score' => 88.0,
                'student_id' => 4,
                'exam_id' => 4,
                'course_id' => 6,
                'created_at' => '2020-09-20 09:39:43',
                'updated_at' => '2020-09-20 09:39:43',
            ),
            53 => 
            array (
                'id' => 155,
                'score' => 87.0,
                'student_id' => 4,
                'exam_id' => 4,
                'course_id' => 7,
                'created_at' => '2020-09-20 09:39:43',
                'updated_at' => '2020-09-20 09:39:43',
            ),
            54 => 
            array (
                'id' => 156,
                'score' => 67.0,
                'student_id' => 4,
                'exam_id' => 4,
                'course_id' => 8,
                'created_at' => '2020-09-20 09:39:43',
                'updated_at' => '2020-09-20 09:39:43',
            ),
            55 => 
            array (
                'id' => 157,
                'score' => 89.0,
                'student_id' => 4,
                'exam_id' => 4,
                'course_id' => 9,
                'created_at' => '2020-09-20 09:39:43',
                'updated_at' => '2020-09-20 09:39:43',
            ),
            56 => 
            array (
                'id' => 169,
                'score' => 135.0,
                'student_id' => 2,
                'exam_id' => 3,
                'course_id' => 3,
                'created_at' => '2020-09-20 10:38:07',
                'updated_at' => '2020-09-20 10:38:07',
            ),
            57 => 
            array (
                'id' => 170,
                'score' => 78.0,
                'student_id' => 2,
                'exam_id' => 3,
                'course_id' => 4,
                'created_at' => '2020-09-20 10:38:07',
                'updated_at' => '2020-09-20 10:38:07',
            ),
            58 => 
            array (
                'id' => 171,
                'score' => 78.0,
                'student_id' => 2,
                'exam_id' => 3,
                'course_id' => 5,
                'created_at' => '2020-09-20 10:38:07',
                'updated_at' => '2020-09-20 10:38:07',
            ),
            59 => 
            array (
                'id' => 172,
                'score' => 88.0,
                'student_id' => 2,
                'exam_id' => 3,
                'course_id' => 6,
                'created_at' => '2020-09-20 10:38:07',
                'updated_at' => '2020-09-20 10:38:07',
            ),
            60 => 
            array (
                'id' => 173,
                'score' => 90.0,
                'student_id' => 2,
                'exam_id' => 3,
                'course_id' => 7,
                'created_at' => '2020-09-20 10:38:07',
                'updated_at' => '2020-09-20 10:38:07',
            ),
            61 => 
            array (
                'id' => 174,
                'score' => 95.0,
                'student_id' => 2,
                'exam_id' => 3,
                'course_id' => 8,
                'created_at' => '2020-09-20 10:38:07',
                'updated_at' => '2020-09-20 10:38:07',
            ),
            62 => 
            array (
                'id' => 175,
                'score' => 89.0,
                'student_id' => 2,
                'exam_id' => 3,
                'course_id' => 9,
                'created_at' => '2020-09-20 10:38:07',
                'updated_at' => '2020-09-20 10:38:07',
            ),
            63 => 
            array (
                'id' => 178,
                'score' => 136.0,
                'student_id' => 2,
                'exam_id' => 4,
                'course_id' => 3,
                'created_at' => '2020-09-20 22:47:55',
                'updated_at' => '2020-09-20 22:47:55',
            ),
            64 => 
            array (
                'id' => 179,
                'score' => 78.0,
                'student_id' => 2,
                'exam_id' => 4,
                'course_id' => 4,
                'created_at' => '2020-09-20 22:47:55',
                'updated_at' => '2020-09-20 22:47:55',
            ),
            65 => 
            array (
                'id' => 180,
                'score' => 89.0,
                'student_id' => 2,
                'exam_id' => 4,
                'course_id' => 5,
                'created_at' => '2020-09-20 22:47:55',
                'updated_at' => '2020-09-20 22:47:55',
            ),
            66 => 
            array (
                'id' => 181,
                'score' => 86.0,
                'student_id' => 2,
                'exam_id' => 4,
                'course_id' => 6,
                'created_at' => '2020-09-20 22:47:55',
                'updated_at' => '2020-09-20 22:47:55',
            ),
            67 => 
            array (
                'id' => 182,
                'score' => 94.0,
                'student_id' => 2,
                'exam_id' => 4,
                'course_id' => 7,
                'created_at' => '2020-09-20 22:47:55',
                'updated_at' => '2020-09-20 22:47:55',
            ),
            68 => 
            array (
                'id' => 183,
                'score' => 87.0,
                'student_id' => 2,
                'exam_id' => 4,
                'course_id' => 8,
                'created_at' => '2020-09-20 22:47:55',
                'updated_at' => '2020-09-20 22:47:55',
            ),
            69 => 
            array (
                'id' => 184,
                'score' => 82.0,
                'student_id' => 2,
                'exam_id' => 4,
                'course_id' => 9,
                'created_at' => '2020-09-20 22:47:55',
                'updated_at' => '2020-09-20 22:47:55',
            ),
            70 => 
            array (
                'id' => 187,
                'score' => 132.0,
                'student_id' => 2,
                'exam_id' => 5,
                'course_id' => 3,
                'created_at' => '2020-09-20 22:49:33',
                'updated_at' => '2020-09-20 22:49:33',
            ),
            71 => 
            array (
                'id' => 188,
                'score' => 78.0,
                'student_id' => 2,
                'exam_id' => 5,
                'course_id' => 4,
                'created_at' => '2020-09-20 22:49:33',
                'updated_at' => '2020-09-20 22:49:33',
            ),
            72 => 
            array (
                'id' => 189,
                'score' => 76.0,
                'student_id' => 2,
                'exam_id' => 5,
                'course_id' => 5,
                'created_at' => '2020-09-20 22:49:33',
                'updated_at' => '2020-09-20 22:49:33',
            ),
            73 => 
            array (
                'id' => 190,
                'score' => 76.0,
                'student_id' => 2,
                'exam_id' => 5,
                'course_id' => 6,
                'created_at' => '2020-09-20 22:49:33',
                'updated_at' => '2020-09-20 22:49:33',
            ),
            74 => 
            array (
                'id' => 191,
                'score' => 88.0,
                'student_id' => 2,
                'exam_id' => 5,
                'course_id' => 7,
                'created_at' => '2020-09-20 22:49:33',
                'updated_at' => '2020-09-20 22:49:33',
            ),
            75 => 
            array (
                'id' => 192,
                'score' => 89.0,
                'student_id' => 2,
                'exam_id' => 5,
                'course_id' => 8,
                'created_at' => '2020-09-20 22:49:33',
                'updated_at' => '2020-09-20 22:49:33',
            ),
            76 => 
            array (
                'id' => 193,
                'score' => 88.0,
                'student_id' => 2,
                'exam_id' => 5,
                'course_id' => 9,
                'created_at' => '2020-09-20 22:49:33',
                'updated_at' => '2020-09-20 22:49:33',
            ),
            77 => 
            array (
                'id' => 196,
                'score' => 124.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 3,
                'created_at' => '2020-09-20 22:49:55',
                'updated_at' => '2020-09-20 22:49:55',
            ),
            78 => 
            array (
                'id' => 197,
                'score' => 67.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 4,
                'created_at' => '2020-09-20 22:49:55',
                'updated_at' => '2020-09-20 22:49:55',
            ),
            79 => 
            array (
                'id' => 198,
                'score' => 67.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 5,
                'created_at' => '2020-09-20 22:49:55',
                'updated_at' => '2020-09-20 22:49:55',
            ),
            80 => 
            array (
                'id' => 199,
                'score' => 77.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 6,
                'created_at' => '2020-09-20 22:49:55',
                'updated_at' => '2020-09-20 22:49:55',
            ),
            81 => 
            array (
                'id' => 200,
                'score' => 89.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 7,
                'created_at' => '2020-09-20 22:49:55',
                'updated_at' => '2020-09-20 22:49:55',
            ),
            82 => 
            array (
                'id' => 201,
                'score' => 88.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 8,
                'created_at' => '2020-09-20 22:49:55',
                'updated_at' => '2020-09-20 22:49:55',
            ),
            83 => 
            array (
                'id' => 202,
                'score' => 95.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 9,
                'created_at' => '2020-09-20 22:49:55',
                'updated_at' => '2020-09-20 22:49:55',
            ),
            84 => 
            array (
                'id' => 203,
                'score' => 79.0,
                'student_id' => 4,
                'exam_id' => 2,
                'course_id' => 8,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            85 => 
            array (
                'id' => 204,
                'score' => 87.0,
                'student_id' => 6,
                'exam_id' => 2,
                'course_id' => 5,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            86 => 
            array (
                'id' => 205,
                'score' => 89.0,
                'student_id' => 6,
                'exam_id' => 2,
                'course_id' => 4,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            87 => 
            array (
                'id' => 206,
                'score' => 143.0,
                'student_id' => 6,
                'exam_id' => 2,
                'course_id' => 3,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            88 => 
            array (
                'id' => 207,
                'score' => 127.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 3,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            89 => 
            array (
                'id' => 208,
                'score' => 79.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 4,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-10-20 22:53:03',
            ),
            90 => 
            array (
                'id' => 209,
                'score' => 89.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 5,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            91 => 
            array (
                'id' => 210,
                'score' => 90.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 6,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            92 => 
            array (
                'id' => 211,
                'score' => 90.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 7,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            93 => 
            array (
                'id' => 212,
                'score' => 78.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 8,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            94 => 
            array (
                'id' => 213,
                'score' => 89.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 9,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            95 => 
            array (
                'id' => 214,
                'score' => 140.0,
                'student_id' => 4,
                'exam_id' => 2,
                'course_id' => 3,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            96 => 
            array (
                'id' => 215,
                'score' => 92.0,
                'student_id' => 4,
                'exam_id' => 2,
                'course_id' => 4,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-10-24 19:16:02',
            ),
            97 => 
            array (
                'id' => 216,
                'score' => 90.0,
                'student_id' => 4,
                'exam_id' => 2,
                'course_id' => 5,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            98 => 
            array (
                'id' => 217,
                'score' => 85.0,
                'student_id' => 4,
                'exam_id' => 2,
                'course_id' => 9,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            99 => 
            array (
                'id' => 218,
                'score' => 89.0,
                'student_id' => 4,
                'exam_id' => 2,
                'course_id' => 7,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            100 => 
            array (
                'id' => 219,
                'score' => 92.0,
                'student_id' => 6,
                'exam_id' => 2,
                'course_id' => 6,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            101 => 
            array (
                'id' => 220,
                'score' => 90.0,
                'student_id' => 6,
                'exam_id' => 2,
                'course_id' => 7,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            102 => 
            array (
                'id' => 221,
                'score' => 82.0,
                'student_id' => 4,
                'exam_id' => 2,
                'course_id' => 6,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            103 => 
            array (
                'id' => 222,
                'score' => 75.0,
                'student_id' => 6,
                'exam_id' => 2,
                'course_id' => 9,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            104 => 
            array (
                'id' => 223,
                'score' => 77.0,
                'student_id' => 6,
                'exam_id' => 2,
                'course_id' => 8,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            105 => 
            array (
                'id' => 224,
                'score' => 135.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 1,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            106 => 
            array (
                'id' => 225,
                'score' => 116.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 2,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            107 => 
            array (
                'id' => 226,
                'score' => 125.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 3,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            108 => 
            array (
                'id' => 227,
                'score' => 82.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 4,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            109 => 
            array (
                'id' => 228,
                'score' => 69.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 5,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            110 => 
            array (
                'id' => 229,
                'score' => 75.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 6,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            111 => 
            array (
                'id' => 230,
                'score' => 77.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 7,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            112 => 
            array (
                'id' => 231,
                'score' => 75.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 8,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            113 => 
            array (
                'id' => 232,
                'score' => 66.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 9,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2021-04-16 09:08:39',
            ),
            114 => 
            array (
                'id' => 233,
                'score' => 1.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 1,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2020-11-03 11:22:17',
            ),
            115 => 
            array (
                'id' => 234,
                'score' => 10.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 2,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2020-12-25 11:49:03',
            ),
            116 => 
            array (
                'id' => 235,
                'score' => 2.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 3,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2021-04-19 21:44:16',
            ),
            117 => 
            array (
                'id' => 236,
                'score' => 1.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 4,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2020-11-03 11:22:17',
            ),
            118 => 
            array (
                'id' => 237,
                'score' => 1.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 5,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2020-11-03 11:22:17',
            ),
            119 => 
            array (
                'id' => 238,
                'score' => 1.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 6,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2020-11-03 11:22:17',
            ),
            120 => 
            array (
                'id' => 239,
                'score' => 2.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 7,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2020-11-03 11:22:17',
            ),
            121 => 
            array (
                'id' => 240,
                'score' => 12.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 8,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2021-02-27 17:11:11',
            ),
            122 => 
            array (
                'id' => 241,
                'score' => 4.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 9,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2020-11-03 11:22:17',
            ),
            123 => 
            array (
                'id' => 242,
                'score' => 3.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 1,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            124 => 
            array (
                'id' => 243,
                'score' => 4.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 2,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            125 => 
            array (
                'id' => 244,
                'score' => 3.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 3,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            126 => 
            array (
                'id' => 245,
                'score' => 4.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 4,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            127 => 
            array (
                'id' => 246,
                'score' => 3.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 5,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            128 => 
            array (
                'id' => 247,
                'score' => 5.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 6,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2021-04-16 09:09:33',
            ),
            129 => 
            array (
                'id' => 248,
                'score' => 2.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 7,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            130 => 
            array (
                'id' => 249,
                'score' => 1.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 8,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            131 => 
            array (
                'id' => 250,
                'score' => 1.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 9,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            132 => 
            array (
                'id' => 251,
                'score' => 99.0,
                'student_id' => 3,
                'exam_id' => 5,
                'course_id' => 1,
                'created_at' => '2020-11-09 00:18:32',
                'updated_at' => '2020-11-09 00:18:32',
            ),
            133 => 
            array (
                'id' => 252,
                'score' => 88.0,
                'student_id' => 3,
                'exam_id' => 5,
                'course_id' => 2,
                'created_at' => '2020-11-09 00:18:32',
                'updated_at' => '2020-11-09 00:18:32',
            ),
            134 => 
            array (
                'id' => 253,
                'score' => 98.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 1,
                'created_at' => '2020-11-09 12:48:59',
                'updated_at' => '2020-11-09 12:48:59',
            ),
            135 => 
            array (
                'id' => 254,
                'score' => 89.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 2,
                'created_at' => '2020-11-09 12:48:59',
                'updated_at' => '2020-11-09 12:48:59',
            ),
            136 => 
            array (
                'id' => 255,
                'score' => 100.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 1,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            137 => 
            array (
                'id' => 256,
                'score' => 100.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 2,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            138 => 
            array (
                'id' => 257,
                'score' => 80.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 3,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            139 => 
            array (
                'id' => 258,
                'score' => 58.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 4,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            140 => 
            array (
                'id' => 259,
                'score' => 65.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 5,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            141 => 
            array (
                'id' => 260,
                'score' => 65.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 6,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            142 => 
            array (
                'id' => 261,
                'score' => 75.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 7,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            143 => 
            array (
                'id' => 262,
                'score' => 76.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 8,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            144 => 
            array (
                'id' => 263,
                'score' => 44.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 9,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            145 => 
            array (
                'id' => 265,
                'score' => 132.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 1,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            146 => 
            array (
                'id' => 266,
                'score' => 143.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 2,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            147 => 
            array (
                'id' => 267,
                'score' => 145.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 3,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            148 => 
            array (
                'id' => 268,
                'score' => 78.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 4,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            149 => 
            array (
                'id' => 269,
                'score' => 87.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 5,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            150 => 
            array (
                'id' => 270,
                'score' => 88.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 6,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            151 => 
            array (
                'id' => 271,
                'score' => 88.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 7,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            152 => 
            array (
                'id' => 272,
                'score' => 89.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 8,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            153 => 
            array (
                'id' => 273,
                'score' => 98.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 9,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            154 => 
            array (
                'id' => 274,
                'score' => 132.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 1,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            155 => 
            array (
                'id' => 275,
                'score' => 112.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 2,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            156 => 
            array (
                'id' => 276,
                'score' => 143.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 3,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            157 => 
            array (
                'id' => 277,
                'score' => 89.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 4,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            158 => 
            array (
                'id' => 278,
                'score' => 99.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 5,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            159 => 
            array (
                'id' => 279,
                'score' => 98.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 6,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            160 => 
            array (
                'id' => 280,
                'score' => 88.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 7,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            161 => 
            array (
                'id' => 281,
                'score' => 87.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 8,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            162 => 
            array (
                'id' => 282,
                'score' => 88.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 9,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            163 => 
            array (
                'id' => 287,
                'score' => 115.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 1,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            164 => 
            array (
                'id' => 288,
                'score' => 135.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 2,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            165 => 
            array (
                'id' => 289,
                'score' => 138.0,
                'student_id' => 3,
                'exam_id' => 6,
                'course_id' => 2,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            166 => 
            array (
                'id' => 290,
                'score' => 128.0,
                'student_id' => 3,
                'exam_id' => 6,
                'course_id' => 1,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            167 => 
            array (
                'id' => 291,
                'score' => 52.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 1,
                'created_at' => '2020-12-26 18:43:46',
                'updated_at' => '2020-12-26 18:43:46',
            ),
            168 => 
            array (
                'id' => 292,
                'score' => 66.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 2,
                'created_at' => '2020-12-26 18:43:46',
                'updated_at' => '2020-12-26 18:43:46',
            ),
            169 => 
            array (
                'id' => 303,
                'score' => 99.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 1,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            170 => 
            array (
                'id' => 304,
                'score' => 1.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 2,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            171 => 
            array (
                'id' => 305,
                'score' => 12.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 3,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2021-03-28 13:01:46',
            ),
            172 => 
            array (
                'id' => 306,
                'score' => 1.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 4,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            173 => 
            array (
                'id' => 307,
                'score' => 5.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 5,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            174 => 
            array (
                'id' => 308,
                'score' => 1.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 6,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            175 => 
            array (
                'id' => 309,
                'score' => 1.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 7,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            176 => 
            array (
                'id' => 310,
                'score' => 1.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 8,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            177 => 
            array (
                'id' => 311,
                'score' => 1.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 9,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            178 => 
            array (
                'id' => 313,
                'score' => 90.0,
                'student_id' => 17,
                'exam_id' => 1,
                'course_id' => 1,
                'created_at' => '2020-12-27 15:25:56',
                'updated_at' => '2020-12-27 15:25:56',
            ),
            179 => 
            array (
                'id' => 314,
                'score' => 80.0,
                'student_id' => 17,
                'exam_id' => 1,
                'course_id' => 2,
                'created_at' => '2020-12-27 15:25:57',
                'updated_at' => '2020-12-27 15:25:57',
            ),
            180 => 
            array (
                'id' => 315,
                'score' => 80.0,
                'student_id' => 17,
                'exam_id' => 1,
                'course_id' => 3,
                'created_at' => '2020-12-27 15:25:57',
                'updated_at' => '2020-12-27 15:25:57',
            ),
            181 => 
            array (
                'id' => 316,
                'score' => 90.0,
                'student_id' => 17,
                'exam_id' => 1,
                'course_id' => 4,
                'created_at' => '2020-12-27 15:25:57',
                'updated_at' => '2020-12-27 15:25:57',
            ),
            182 => 
            array (
                'id' => 317,
                'score' => 60.0,
                'student_id' => 17,
                'exam_id' => 1,
                'course_id' => 5,
                'created_at' => '2020-12-27 15:25:57',
                'updated_at' => '2020-12-27 15:25:57',
            ),
            183 => 
            array (
                'id' => 318,
                'score' => 60.0,
                'student_id' => 17,
                'exam_id' => 1,
                'course_id' => 6,
                'created_at' => '2020-12-27 15:25:57',
                'updated_at' => '2020-12-27 15:25:57',
            ),
            184 => 
            array (
                'id' => 319,
                'score' => 90.0,
                'student_id' => 17,
                'exam_id' => 1,
                'course_id' => 7,
                'created_at' => '2020-12-27 15:25:57',
                'updated_at' => '2020-12-27 15:25:57',
            ),
            185 => 
            array (
                'id' => 320,
                'score' => 90.0,
                'student_id' => 17,
                'exam_id' => 1,
                'course_id' => 8,
                'created_at' => '2020-12-27 15:25:57',
                'updated_at' => '2020-12-27 15:25:57',
            ),
            186 => 
            array (
                'id' => 321,
                'score' => 90.0,
                'student_id' => 17,
                'exam_id' => 1,
                'course_id' => 9,
                'created_at' => '2020-12-27 15:25:57',
                'updated_at' => '2020-12-27 15:25:57',
            ),
        ));
        
        
    }
}