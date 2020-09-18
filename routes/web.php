<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 用于测试路由
Route::get('/test', 'Test@test');

// 需要登录
Route::middleware('auth')->group(
    function () {
        //首页
        Route::get('/', 'Index@index')->name('index');
        Route::get('/welcome', 'Index@welcome')->name('welcome');
        Route::get('/logout', 'Login@logout')->name('logout');
        // 学生
        Route::resource('/user', 'User');
        Route::get('/getuser', 'User@getUser')->name('getuser');
        Route::delete('/delall', 'User@deleteAll')->name('user.delall');
        Route::delete('/delparent/{id}', 'User@delParent')->name('user.delparent');
        Route::get('/export/user', 'User@export')->name('user.export');
        // 老师
        Route::resource('/teacher', 'Teacher');
        Route::get('/getteacher', 'Teacher@getTeacher')->name('getteacher');

        // 修改密码
        Route::get('/repwd', 'Login@showRepwdForm')->name('repwd');
        Route::post('/repwd', 'Login@repwd')->name('dorepwd');

        // 课程
        Route::resource('/course', 'Courses');
        Route::get('/getcourse', 'Courses@getcourse')->name('getcourse');

        // 考试
        Route::resource('/exam', 'Exams');
        Route::get('/getexams', 'Exams@getexams')->name('getexams');

        // 成绩
        Route::resource('/score', 'Scores');
        Route::get('/getscore', 'Scores@getscore')->name('getscore');
        Route::get('/export/score', 'Scores@export')->name('score.export');

        // 成绩分析
        Route::get('/analyze/index','ScoreShow@index')->name('analyze.index');
        Route::get('/pie/{cid}/{eid}','ScoreShow@getPie')->name('analyze.getpie');
        Route::get('/analyze/showall','ScoreShow@showAll')->name('score.showall');
    }
);

// 不需要登录
Route::middleware('guest')->group(
    function () {
        Route::get('/login', 'Login@index')->name('login');
        Route::post('/dologin', 'Login@store')->name('login.store');
    }
);



