<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pid')->default(0)->comment('父ID');
            $table->string('title')->comment('名称');
            $table->string('icon')->comment('菜单图标');
            $table->string('href')->nullable()->comment('链接');
            $table->string('target', 20)->nullable()->comment('链接打开方式');
            $table->integer('sort')->nullable()->default(0)->comment('菜单排序');
            $table->tinyInteger('status')->default(1)->comment('状态(0:禁用,1:启用)');
            $table->string('remark')->nullable()->comment('备注信息');
            $table->softDeletes();
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
        Schema::dropIfExists('system_menu');
    }
}
