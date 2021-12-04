<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid')->unique('users_uid_unique')->comment('学号');
            $table->string('name')->comment('学生姓名');
            $table->string('sex', 2);
            $table->string('phone');
            $table->string('sysid', 18);
            $table->date('birth');
            $table->string('minzu', 10);
            $table->string('jingji', 20)->nullable();
            $table->string('hukou', 100)->nullable();
            $table->string('jishu', 1)->default('0')->comment('是否寄宿');
            $table->string('huji')->nullable()->comment('户籍地址');
            $table->string('xianzz', 100)->nullable()->comment('现住址');
            $table->boolean('liushou')->default(false)->comment('是否留守儿童');
            $table->string('liushouqk')->nullable()->comment('留守儿童情况');
            $table->string('liushoutgqk')->nullable()->comment('留守儿童托管情况');
            $table->string('biye', 50)->nullable()->comment('毕业学校');
            $table->string('ganbu')->nullable()->comment('曾担任干部情况');
            $table->string('huojiang')->nullable()->comment('获奖情况');
            $table->rememberToken();
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
        Schema::dropIfExists('students');
    }
}
