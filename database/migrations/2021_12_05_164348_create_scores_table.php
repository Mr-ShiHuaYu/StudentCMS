<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('score', 5)->unsigned()->comment('成绩');
            $table->unsignedBigInteger('student_id')->comment('所属学生');
            $table->unsignedBigInteger('exam_id')->comment('所属考试');
            $table->unsignedBigInteger('course_id')->comment('所属课程');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
