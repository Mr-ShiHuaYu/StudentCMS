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
        Schema::create(
            'system_menu',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('pid')->comment('父ID')->default(0);
                $table->string('title')->comment('名称');
                $table->string('icon')->comment('菜单图标');
                $table->string('href')->comment('链接');
                $table->string('target', 20)->comment('链接打开方式');
                $table->integer('sort')->comment('菜单排序')->nullable()->default(0);
                $table->tinyInteger('status')->comment('状态(0:禁用,1:启用)')->default(1);
                $table->string('remark')->comment('备注信息')->nullable();
                $table->softDeletes();
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
        Schema::dropIfExists('system_menu');
    }
}
