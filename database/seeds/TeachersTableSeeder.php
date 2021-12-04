<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('teachers')->delete();
        
        \DB::table('teachers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '沿明霞',
                'sex' => '女',
                'phone' => '18693843205',
                'qq' => '30921280',
                'created_at' => '2004-04-19 10:21:58',
                'updated_at' => '1986-03-30 09:58:31',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '季红',
                'sex' => '女',
                'phone' => '13202609640',
                'qq' => '96133282',
                'created_at' => '2008-11-06 07:18:59',
                'updated_at' => '2001-06-19 23:58:26',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '米平',
                'sex' => '女',
                'phone' => '15794232443',
                'qq' => '11986672',
                'created_at' => '1991-06-26 21:23:47',
                'updated_at' => '1976-06-14 10:17:14',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '蔺超',
                'sex' => '男',
                'phone' => '17194789423',
                'qq' => '79603817',
                'created_at' => '2020-06-13 18:36:11',
                'updated_at' => '1997-02-21 10:43:24',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '房晨',
                'sex' => '男',
                'phone' => '17090885187',
                'qq' => '97473593',
                'created_at' => '1995-07-28 19:13:58',
                'updated_at' => '2002-07-07 07:57:39',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '位静',
                'sex' => '男',
                'phone' => '17805364779',
                'qq' => '33524284',
                'created_at' => '2017-09-23 12:58:34',
                'updated_at' => '1983-11-22 23:31:43',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '敖春梅',
                'sex' => '女',
                'phone' => '14527895864',
                'qq' => '60040396',
                'created_at' => '1983-06-03 22:21:30',
                'updated_at' => '1991-07-27 02:12:58',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '符超',
                'sex' => '女',
                'phone' => '15696544875',
                'qq' => '66254164',
                'created_at' => '2018-12-06 21:50:37',
                'updated_at' => '1974-12-24 22:35:07',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '卢明',
                'sex' => '男',
                'phone' => '15130718072',
                'qq' => '37366540',
                'created_at' => '2005-03-03 16:47:24',
                'updated_at' => '2019-11-27 02:32:24',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '靳凤英',
                'sex' => '女',
                'phone' => '15607294664',
                'qq' => '54964014',
                'created_at' => '2008-02-10 07:13:25',
                'updated_at' => '1986-11-26 00:53:09',
            ),
        ));
        
        
    }
}