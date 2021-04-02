<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'parents',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name', 100);
                $table->tinyInteger('age');
                $table->string('relation', 100)->comment('与学生关系');
                $table->string('unit', 100)->comment('工作单位')->nullable();
                $table->string('job', 100)->comment('职业')->nullable();
                $table->string('phone', 20)->comment('联系电话')->nullable();
                $table->unsignedBigInteger('student_id');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parents');
    }
}
