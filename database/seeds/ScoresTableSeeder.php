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
                'id' => 115,
                'score' => 127.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 3,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            15 => 
            array (
                'id' => 116,
                'score' => 79.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 4,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-10-20 22:53:03',
            ),
            16 => 
            array (
                'id' => 117,
                'score' => 89.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 5,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            17 => 
            array (
                'id' => 118,
                'score' => 95.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 6,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2021-01-02 15:38:41',
            ),
            18 => 
            array (
                'id' => 119,
                'score' => 90.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 7,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            19 => 
            array (
                'id' => 120,
                'score' => 78.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 8,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            20 => 
            array (
                'id' => 121,
                'score' => 88.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 9,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            21 => 
            array (
                'id' => 124,
                'score' => 145.0,
                'student_id' => 4,
                'exam_id' => 1,
                'course_id' => 3,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            22 => 
            array (
                'id' => 125,
                'score' => 97.0,
                'student_id' => 4,
                'exam_id' => 1,
                'course_id' => 4,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-10-24 19:16:02',
            ),
            23 => 
            array (
                'id' => 126,
                'score' => 94.0,
                'student_id' => 4,
                'exam_id' => 1,
                'course_id' => 5,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            24 => 
            array (
                'id' => 127,
                'score' => 89.0,
                'student_id' => 4,
                'exam_id' => 1,
                'course_id' => 6,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            25 => 
            array (
                'id' => 128,
                'score' => 76.0,
                'student_id' => 4,
                'exam_id' => 1,
                'course_id' => 7,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            26 => 
            array (
                'id' => 129,
                'score' => 79.0,
                'student_id' => 4,
                'exam_id' => 1,
                'course_id' => 8,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            27 => 
            array (
                'id' => 130,
                'score' => 89.0,
                'student_id' => 4,
                'exam_id' => 1,
                'course_id' => 9,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            28 => 
            array (
                'id' => 133,
                'score' => 143.0,
                'student_id' => 6,
                'exam_id' => 1,
                'course_id' => 3,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            29 => 
            array (
                'id' => 134,
                'score' => 89.0,
                'student_id' => 6,
                'exam_id' => 1,
                'course_id' => 4,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            30 => 
            array (
                'id' => 135,
                'score' => 87.0,
                'student_id' => 6,
                'exam_id' => 1,
                'course_id' => 5,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            31 => 
            array (
                'id' => 136,
                'score' => 88.0,
                'student_id' => 6,
                'exam_id' => 1,
                'course_id' => 6,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            32 => 
            array (
                'id' => 137,
                'score' => 77.0,
                'student_id' => 6,
                'exam_id' => 1,
                'course_id' => 7,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            33 => 
            array (
                'id' => 138,
                'score' => 77.0,
                'student_id' => 6,
                'exam_id' => 1,
                'course_id' => 8,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            34 => 
            array (
                'id' => 139,
                'score' => 75.0,
                'student_id' => 6,
                'exam_id' => 1,
                'course_id' => 9,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            35 => 
            array (
                'id' => 142,
                'score' => 122.0,
                'student_id' => 4,
                'exam_id' => 3,
                'course_id' => 3,
                'created_at' => '2020-09-20 09:38:31',
                'updated_at' => '2020-09-20 09:38:31',
            ),
            36 => 
            array (
                'id' => 143,
                'score' => 79.0,
                'student_id' => 4,
                'exam_id' => 3,
                'course_id' => 4,
                'created_at' => '2020-09-20 09:38:31',
                'updated_at' => '2020-09-21 08:29:34',
            ),
            37 => 
            array (
                'id' => 144,
                'score' => 78.0,
                'student_id' => 4,
                'exam_id' => 3,
                'course_id' => 5,
                'created_at' => '2020-09-20 09:38:31',
                'updated_at' => '2020-09-20 09:38:31',
            ),
            38 => 
            array (
                'id' => 145,
                'score' => 89.0,
                'student_id' => 4,
                'exam_id' => 3,
                'course_id' => 6,
                'created_at' => '2020-09-20 09:38:31',
                'updated_at' => '2020-09-20 09:38:31',
            ),
            39 => 
            array (
                'id' => 146,
                'score' => 87.0,
                'student_id' => 4,
                'exam_id' => 3,
                'course_id' => 7,
                'created_at' => '2020-09-20 09:38:31',
                'updated_at' => '2020-09-20 09:38:31',
            ),
            40 => 
            array (
                'id' => 147,
                'score' => 67.0,
                'student_id' => 4,
                'exam_id' => 3,
                'course_id' => 8,
                'created_at' => '2020-09-20 09:38:31',
                'updated_at' => '2020-09-20 09:38:31',
            ),
            41 => 
            array (
                'id' => 148,
                'score' => 67.0,
                'student_id' => 4,
                'exam_id' => 3,
                'course_id' => 9,
                'created_at' => '2020-09-20 09:38:31',
                'updated_at' => '2020-09-20 09:38:31',
            ),
            42 => 
            array (
                'id' => 151,
                'score' => 133.0,
                'student_id' => 4,
                'exam_id' => 4,
                'course_id' => 3,
                'created_at' => '2020-09-20 09:39:43',
                'updated_at' => '2020-09-20 09:39:43',
            ),
            43 => 
            array (
                'id' => 152,
                'score' => 89.0,
                'student_id' => 4,
                'exam_id' => 4,
                'course_id' => 4,
                'created_at' => '2020-09-20 09:39:43',
                'updated_at' => '2020-09-20 09:39:43',
            ),
            44 => 
            array (
                'id' => 153,
                'score' => 98.0,
                'student_id' => 4,
                'exam_id' => 4,
                'course_id' => 5,
                'created_at' => '2020-09-20 09:39:43',
                'updated_at' => '2020-09-20 09:39:43',
            ),
            45 => 
            array (
                'id' => 154,
                'score' => 88.0,
                'student_id' => 4,
                'exam_id' => 4,
                'course_id' => 6,
                'created_at' => '2020-09-20 09:39:43',
                'updated_at' => '2020-09-20 09:39:43',
            ),
            46 => 
            array (
                'id' => 155,
                'score' => 87.0,
                'student_id' => 4,
                'exam_id' => 4,
                'course_id' => 7,
                'created_at' => '2020-09-20 09:39:43',
                'updated_at' => '2020-09-20 09:39:43',
            ),
            47 => 
            array (
                'id' => 156,
                'score' => 67.0,
                'student_id' => 4,
                'exam_id' => 4,
                'course_id' => 8,
                'created_at' => '2020-09-20 09:39:43',
                'updated_at' => '2020-09-20 09:39:43',
            ),
            48 => 
            array (
                'id' => 157,
                'score' => 89.0,
                'student_id' => 4,
                'exam_id' => 4,
                'course_id' => 9,
                'created_at' => '2020-09-20 09:39:43',
                'updated_at' => '2020-09-20 09:39:43',
            ),
            49 => 
            array (
                'id' => 169,
                'score' => 135.0,
                'student_id' => 2,
                'exam_id' => 3,
                'course_id' => 3,
                'created_at' => '2020-09-20 10:38:07',
                'updated_at' => '2020-09-20 10:38:07',
            ),
            50 => 
            array (
                'id' => 170,
                'score' => 78.0,
                'student_id' => 2,
                'exam_id' => 3,
                'course_id' => 4,
                'created_at' => '2020-09-20 10:38:07',
                'updated_at' => '2020-09-20 10:38:07',
            ),
            51 => 
            array (
                'id' => 171,
                'score' => 78.0,
                'student_id' => 2,
                'exam_id' => 3,
                'course_id' => 5,
                'created_at' => '2020-09-20 10:38:07',
                'updated_at' => '2020-09-20 10:38:07',
            ),
            52 => 
            array (
                'id' => 172,
                'score' => 88.0,
                'student_id' => 2,
                'exam_id' => 3,
                'course_id' => 6,
                'created_at' => '2020-09-20 10:38:07',
                'updated_at' => '2020-09-20 10:38:07',
            ),
            53 => 
            array (
                'id' => 173,
                'score' => 90.0,
                'student_id' => 2,
                'exam_id' => 3,
                'course_id' => 7,
                'created_at' => '2020-09-20 10:38:07',
                'updated_at' => '2020-09-20 10:38:07',
            ),
            54 => 
            array (
                'id' => 174,
                'score' => 95.0,
                'student_id' => 2,
                'exam_id' => 3,
                'course_id' => 8,
                'created_at' => '2020-09-20 10:38:07',
                'updated_at' => '2020-09-20 10:38:07',
            ),
            55 => 
            array (
                'id' => 175,
                'score' => 89.0,
                'student_id' => 2,
                'exam_id' => 3,
                'course_id' => 9,
                'created_at' => '2020-09-20 10:38:07',
                'updated_at' => '2020-09-20 10:38:07',
            ),
            56 => 
            array (
                'id' => 178,
                'score' => 136.0,
                'student_id' => 2,
                'exam_id' => 4,
                'course_id' => 3,
                'created_at' => '2020-09-20 22:47:55',
                'updated_at' => '2020-09-20 22:47:55',
            ),
            57 => 
            array (
                'id' => 179,
                'score' => 78.0,
                'student_id' => 2,
                'exam_id' => 4,
                'course_id' => 4,
                'created_at' => '2020-09-20 22:47:55',
                'updated_at' => '2020-09-20 22:47:55',
            ),
            58 => 
            array (
                'id' => 180,
                'score' => 89.0,
                'student_id' => 2,
                'exam_id' => 4,
                'course_id' => 5,
                'created_at' => '2020-09-20 22:47:55',
                'updated_at' => '2020-09-20 22:47:55',
            ),
            59 => 
            array (
                'id' => 181,
                'score' => 86.0,
                'student_id' => 2,
                'exam_id' => 4,
                'course_id' => 6,
                'created_at' => '2020-09-20 22:47:55',
                'updated_at' => '2020-09-20 22:47:55',
            ),
            60 => 
            array (
                'id' => 182,
                'score' => 94.0,
                'student_id' => 2,
                'exam_id' => 4,
                'course_id' => 7,
                'created_at' => '2020-09-20 22:47:55',
                'updated_at' => '2020-09-20 22:47:55',
            ),
            61 => 
            array (
                'id' => 183,
                'score' => 87.0,
                'student_id' => 2,
                'exam_id' => 4,
                'course_id' => 8,
                'created_at' => '2020-09-20 22:47:55',
                'updated_at' => '2020-09-20 22:47:55',
            ),
            62 => 
            array (
                'id' => 184,
                'score' => 82.0,
                'student_id' => 2,
                'exam_id' => 4,
                'course_id' => 9,
                'created_at' => '2020-09-20 22:47:55',
                'updated_at' => '2020-09-20 22:47:55',
            ),
            63 => 
            array (
                'id' => 187,
                'score' => 132.0,
                'student_id' => 2,
                'exam_id' => 5,
                'course_id' => 3,
                'created_at' => '2020-09-20 22:49:33',
                'updated_at' => '2020-09-20 22:49:33',
            ),
            64 => 
            array (
                'id' => 188,
                'score' => 78.0,
                'student_id' => 2,
                'exam_id' => 5,
                'course_id' => 4,
                'created_at' => '2020-09-20 22:49:33',
                'updated_at' => '2020-09-20 22:49:33',
            ),
            65 => 
            array (
                'id' => 189,
                'score' => 76.0,
                'student_id' => 2,
                'exam_id' => 5,
                'course_id' => 5,
                'created_at' => '2020-09-20 22:49:33',
                'updated_at' => '2020-09-20 22:49:33',
            ),
            66 => 
            array (
                'id' => 190,
                'score' => 76.0,
                'student_id' => 2,
                'exam_id' => 5,
                'course_id' => 6,
                'created_at' => '2020-09-20 22:49:33',
                'updated_at' => '2020-09-20 22:49:33',
            ),
            67 => 
            array (
                'id' => 191,
                'score' => 88.0,
                'student_id' => 2,
                'exam_id' => 5,
                'course_id' => 7,
                'created_at' => '2020-09-20 22:49:33',
                'updated_at' => '2020-09-20 22:49:33',
            ),
            68 => 
            array (
                'id' => 192,
                'score' => 89.0,
                'student_id' => 2,
                'exam_id' => 5,
                'course_id' => 8,
                'created_at' => '2020-09-20 22:49:33',
                'updated_at' => '2020-09-20 22:49:33',
            ),
            69 => 
            array (
                'id' => 193,
                'score' => 88.0,
                'student_id' => 2,
                'exam_id' => 5,
                'course_id' => 9,
                'created_at' => '2020-09-20 22:49:33',
                'updated_at' => '2020-09-20 22:49:33',
            ),
            70 => 
            array (
                'id' => 196,
                'score' => 124.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 3,
                'created_at' => '2020-09-20 22:49:55',
                'updated_at' => '2020-09-20 22:49:55',
            ),
            71 => 
            array (
                'id' => 197,
                'score' => 67.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 4,
                'created_at' => '2020-09-20 22:49:55',
                'updated_at' => '2020-09-20 22:49:55',
            ),
            72 => 
            array (
                'id' => 198,
                'score' => 67.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 5,
                'created_at' => '2020-09-20 22:49:55',
                'updated_at' => '2020-09-20 22:49:55',
            ),
            73 => 
            array (
                'id' => 199,
                'score' => 77.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 6,
                'created_at' => '2020-09-20 22:49:55',
                'updated_at' => '2020-09-20 22:49:55',
            ),
            74 => 
            array (
                'id' => 200,
                'score' => 89.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 7,
                'created_at' => '2020-09-20 22:49:55',
                'updated_at' => '2020-09-20 22:49:55',
            ),
            75 => 
            array (
                'id' => 201,
                'score' => 88.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 8,
                'created_at' => '2020-09-20 22:49:55',
                'updated_at' => '2020-09-20 22:49:55',
            ),
            76 => 
            array (
                'id' => 202,
                'score' => 95.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 9,
                'created_at' => '2020-09-20 22:49:55',
                'updated_at' => '2020-09-20 22:49:55',
            ),
            77 => 
            array (
                'id' => 203,
                'score' => 79.0,
                'student_id' => 4,
                'exam_id' => 2,
                'course_id' => 8,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            78 => 
            array (
                'id' => 204,
                'score' => 87.0,
                'student_id' => 6,
                'exam_id' => 2,
                'course_id' => 5,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            79 => 
            array (
                'id' => 205,
                'score' => 89.0,
                'student_id' => 6,
                'exam_id' => 2,
                'course_id' => 4,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            80 => 
            array (
                'id' => 206,
                'score' => 143.0,
                'student_id' => 6,
                'exam_id' => 2,
                'course_id' => 3,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            81 => 
            array (
                'id' => 207,
                'score' => 127.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 3,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            82 => 
            array (
                'id' => 208,
                'score' => 79.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 4,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-10-20 22:53:03',
            ),
            83 => 
            array (
                'id' => 209,
                'score' => 89.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 5,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            84 => 
            array (
                'id' => 210,
                'score' => 90.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 6,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            85 => 
            array (
                'id' => 211,
                'score' => 90.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 7,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            86 => 
            array (
                'id' => 212,
                'score' => 78.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 8,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            87 => 
            array (
                'id' => 213,
                'score' => 89.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 9,
                'created_at' => '2020-09-19 17:21:48',
                'updated_at' => '2020-09-19 17:21:48',
            ),
            88 => 
            array (
                'id' => 214,
                'score' => 140.0,
                'student_id' => 4,
                'exam_id' => 2,
                'course_id' => 3,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            89 => 
            array (
                'id' => 215,
                'score' => 92.0,
                'student_id' => 4,
                'exam_id' => 2,
                'course_id' => 4,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-10-24 19:16:02',
            ),
            90 => 
            array (
                'id' => 216,
                'score' => 90.0,
                'student_id' => 4,
                'exam_id' => 2,
                'course_id' => 5,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            91 => 
            array (
                'id' => 217,
                'score' => 85.0,
                'student_id' => 4,
                'exam_id' => 2,
                'course_id' => 9,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            92 => 
            array (
                'id' => 218,
                'score' => 89.0,
                'student_id' => 4,
                'exam_id' => 2,
                'course_id' => 7,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            93 => 
            array (
                'id' => 219,
                'score' => 92.0,
                'student_id' => 6,
                'exam_id' => 2,
                'course_id' => 6,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            94 => 
            array (
                'id' => 220,
                'score' => 90.0,
                'student_id' => 6,
                'exam_id' => 2,
                'course_id' => 7,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            95 => 
            array (
                'id' => 221,
                'score' => 82.0,
                'student_id' => 4,
                'exam_id' => 2,
                'course_id' => 6,
                'created_at' => '2020-09-19 17:22:16',
                'updated_at' => '2020-09-19 17:22:16',
            ),
            96 => 
            array (
                'id' => 222,
                'score' => 75.0,
                'student_id' => 6,
                'exam_id' => 2,
                'course_id' => 9,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            97 => 
            array (
                'id' => 223,
                'score' => 77.0,
                'student_id' => 6,
                'exam_id' => 2,
                'course_id' => 8,
                'created_at' => '2020-09-20 09:35:53',
                'updated_at' => '2020-09-20 09:35:53',
            ),
            98 => 
            array (
                'id' => 224,
                'score' => 135.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 1,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            99 => 
            array (
                'id' => 225,
                'score' => 116.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 2,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            100 => 
            array (
                'id' => 226,
                'score' => 125.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 3,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            101 => 
            array (
                'id' => 227,
                'score' => 82.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 4,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            102 => 
            array (
                'id' => 228,
                'score' => 69.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 5,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            103 => 
            array (
                'id' => 229,
                'score' => 75.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 6,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            104 => 
            array (
                'id' => 230,
                'score' => 77.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 7,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            105 => 
            array (
                'id' => 231,
                'score' => 75.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 8,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            106 => 
            array (
                'id' => 232,
                'score' => 66.0,
                'student_id' => 8,
                'exam_id' => 1,
                'course_id' => 9,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2021-04-16 09:08:39',
            ),
            107 => 
            array (
                'id' => 233,
                'score' => 1.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 1,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2020-11-03 11:22:17',
            ),
            108 => 
            array (
                'id' => 234,
                'score' => 10.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 2,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2020-12-25 11:49:03',
            ),
            109 => 
            array (
                'id' => 235,
                'score' => 2.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 3,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2021-04-19 21:44:16',
            ),
            110 => 
            array (
                'id' => 236,
                'score' => 1.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 4,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2020-11-03 11:22:17',
            ),
            111 => 
            array (
                'id' => 237,
                'score' => 1.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 5,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2020-11-03 11:22:17',
            ),
            112 => 
            array (
                'id' => 238,
                'score' => 1.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 6,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2020-11-03 11:22:17',
            ),
            113 => 
            array (
                'id' => 239,
                'score' => 2.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 7,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2020-11-03 11:22:17',
            ),
            114 => 
            array (
                'id' => 240,
                'score' => 12.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 8,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2021-02-27 17:11:11',
            ),
            115 => 
            array (
                'id' => 241,
                'score' => 4.0,
                'student_id' => 2,
                'exam_id' => 1,
                'course_id' => 9,
                'created_at' => '2020-11-03 11:22:17',
                'updated_at' => '2020-11-03 11:22:17',
            ),
            116 => 
            array (
                'id' => 242,
                'score' => 3.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 1,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            117 => 
            array (
                'id' => 243,
                'score' => 4.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 2,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            118 => 
            array (
                'id' => 244,
                'score' => 3.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 3,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            119 => 
            array (
                'id' => 245,
                'score' => 4.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 4,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            120 => 
            array (
                'id' => 246,
                'score' => 3.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 5,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            121 => 
            array (
                'id' => 247,
                'score' => 5.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 6,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2021-04-16 09:09:33',
            ),
            122 => 
            array (
                'id' => 248,
                'score' => 2.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 7,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            123 => 
            array (
                'id' => 249,
                'score' => 1.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 8,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            124 => 
            array (
                'id' => 250,
                'score' => 1.0,
                'student_id' => 2,
                'exam_id' => 2,
                'course_id' => 9,
                'created_at' => '2020-11-03 11:22:47',
                'updated_at' => '2020-11-03 11:22:47',
            ),
            125 => 
            array (
                'id' => 251,
                'score' => 99.0,
                'student_id' => 3,
                'exam_id' => 5,
                'course_id' => 1,
                'created_at' => '2020-11-09 00:18:32',
                'updated_at' => '2020-11-09 00:18:32',
            ),
            126 => 
            array (
                'id' => 252,
                'score' => 88.0,
                'student_id' => 3,
                'exam_id' => 5,
                'course_id' => 2,
                'created_at' => '2020-11-09 00:18:32',
                'updated_at' => '2020-11-09 00:18:32',
            ),
            127 => 
            array (
                'id' => 253,
                'score' => 98.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 1,
                'created_at' => '2020-11-09 12:48:59',
                'updated_at' => '2020-11-09 12:48:59',
            ),
            128 => 
            array (
                'id' => 254,
                'score' => 89.0,
                'student_id' => 3,
                'exam_id' => 2,
                'course_id' => 2,
                'created_at' => '2020-11-09 12:48:59',
                'updated_at' => '2020-11-09 12:48:59',
            ),
            129 => 
            array (
                'id' => 255,
                'score' => 100.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 1,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            130 => 
            array (
                'id' => 256,
                'score' => 100.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 2,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            131 => 
            array (
                'id' => 257,
                'score' => 80.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 3,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            132 => 
            array (
                'id' => 258,
                'score' => 58.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 4,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            133 => 
            array (
                'id' => 259,
                'score' => 65.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 5,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            134 => 
            array (
                'id' => 260,
                'score' => 65.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 6,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            135 => 
            array (
                'id' => 261,
                'score' => 75.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 7,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            136 => 
            array (
                'id' => 262,
                'score' => 76.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 8,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            137 => 
            array (
                'id' => 263,
                'score' => 44.0,
                'student_id' => 6,
                'exam_id' => 4,
                'course_id' => 9,
                'created_at' => '2020-11-14 05:14:41',
                'updated_at' => '2020-11-14 05:14:41',
            ),
            138 => 
            array (
                'id' => 265,
                'score' => 132.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 1,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            139 => 
            array (
                'id' => 266,
                'score' => 143.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 2,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            140 => 
            array (
                'id' => 267,
                'score' => 145.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 3,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            141 => 
            array (
                'id' => 268,
                'score' => 78.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 4,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            142 => 
            array (
                'id' => 269,
                'score' => 87.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 5,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            143 => 
            array (
                'id' => 270,
                'score' => 88.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 6,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            144 => 
            array (
                'id' => 271,
                'score' => 88.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 7,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            145 => 
            array (
                'id' => 272,
                'score' => 89.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 8,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            146 => 
            array (
                'id' => 273,
                'score' => 98.0,
                'student_id' => 8,
                'exam_id' => 6,
                'course_id' => 9,
                'created_at' => '2020-12-17 20:17:23',
                'updated_at' => '2020-12-17 20:17:23',
            ),
            147 => 
            array (
                'id' => 274,
                'score' => 132.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 1,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            148 => 
            array (
                'id' => 275,
                'score' => 112.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 2,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            149 => 
            array (
                'id' => 276,
                'score' => 143.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 3,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            150 => 
            array (
                'id' => 277,
                'score' => 89.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 4,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            151 => 
            array (
                'id' => 278,
                'score' => 99.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 5,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            152 => 
            array (
                'id' => 279,
                'score' => 98.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 6,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            153 => 
            array (
                'id' => 280,
                'score' => 88.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 7,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            154 => 
            array (
                'id' => 281,
                'score' => 87.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 8,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            155 => 
            array (
                'id' => 282,
                'score' => 88.0,
                'student_id' => 10,
                'exam_id' => 6,
                'course_id' => 9,
                'created_at' => '2020-12-17 20:17:53',
                'updated_at' => '2020-12-17 20:17:53',
            ),
            156 => 
            array (
                'id' => 287,
                'score' => 115.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 1,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            157 => 
            array (
                'id' => 288,
                'score' => 135.0,
                'student_id' => 2,
                'exam_id' => 6,
                'course_id' => 2,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            158 => 
            array (
                'id' => 289,
                'score' => 138.0,
                'student_id' => 3,
                'exam_id' => 6,
                'course_id' => 2,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            159 => 
            array (
                'id' => 290,
                'score' => 128.0,
                'student_id' => 3,
                'exam_id' => 6,
                'course_id' => 1,
                'created_at' => '2020-10-25 19:23:06',
                'updated_at' => '2020-10-25 19:23:06',
            ),
            160 => 
            array (
                'id' => 291,
                'score' => 52.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 1,
                'created_at' => '2020-12-26 18:43:46',
                'updated_at' => '2020-12-26 18:43:46',
            ),
            161 => 
            array (
                'id' => 292,
                'score' => 66.0,
                'student_id' => 3,
                'exam_id' => 1,
                'course_id' => 2,
                'created_at' => '2020-12-26 18:43:46',
                'updated_at' => '2020-12-26 18:43:46',
            ),
            162 => 
            array (
                'id' => 303,
                'score' => 99.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 1,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            163 => 
            array (
                'id' => 304,
                'score' => 1.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 2,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            164 => 
            array (
                'id' => 305,
                'score' => 12.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 3,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2021-03-28 13:01:46',
            ),
            165 => 
            array (
                'id' => 306,
                'score' => 1.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 4,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            166 => 
            array (
                'id' => 307,
                'score' => 5.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 5,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            167 => 
            array (
                'id' => 308,
                'score' => 1.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 6,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            168 => 
            array (
                'id' => 309,
                'score' => 1.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 7,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            169 => 
            array (
                'id' => 310,
                'score' => 1.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 8,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
            170 => 
            array (
                'id' => 311,
                'score' => 1.0,
                'student_id' => 9,
                'exam_id' => 1,
                'course_id' => 9,
                'created_at' => '2020-12-27 14:57:08',
                'updated_at' => '2020-12-27 14:57:08',
            ),
        ));
        
        
    }
}