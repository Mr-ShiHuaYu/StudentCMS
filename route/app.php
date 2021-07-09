<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

// 为了覆盖掉默认的资源路由的读取
// 要覆盖的路由一定要写在上面
Route::get('/analyze/gerenfx','Analyze/gerenfx');
Route::get('/user/export','User/export');
Route::get('/user/repwdForm','User/repwdForm');
Route::post('/user/dorepwd','User/dorepwd');

Route::resource('user','User');
Route::resource('teacher','Teacher');
Route::resource('course','Course');
Route::resource('exam','Exam');
Route::resource('score','Score');
Route::resource('analyze','Analyze');
