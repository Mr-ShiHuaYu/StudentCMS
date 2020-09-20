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
        Route::post('/getuser', 'User@getUser')->name('getuser');
        Route::delete('/delall', 'User@deleteAll')->name('user.delall');
        Route::delete('/delparent/{id}', 'User@delParent')->name('user.delparent');
        Route::get('/export/user', 'User@export')->name('user.export');
        // 老师
        Route::resource('/teacher', 'Teacher');
        Route::post('/getteacher', 'Teacher@getTeacher')->name('getteacher');

        // 修改密码
        Route::get('/repwd', 'Login@showRepwdForm')->name('repwd');
        Route::post('/repwd', 'Login@repwd')->name('dorepwd');

        // 课程
        Route::resource('/course', 'Courses');
        Route::post('/getcourse', 'Courses@getcourse')->name('getcourse');

        // 考试
        Route::resource('/exam', 'Exams');
        Route::post('/getexams', 'Exams@getexams')->name('getexams');

        // 成绩
        Route::resource('/score', 'Scores');
        Route::post('/getscore', 'Scores@getscore')->name('getscore');
        Route::get('/export/score', 'Scores@export')->name('score.export');

        // 成绩分析
        Route::get('/analyze/index','ScoreShow@index')->name('analyze.index');
        Route::get('/analyze/pie/{cid}/{eid}','ScoreShow@getPie')->name('analyze.getpie');
        Route::post('/analyze/showall','ScoreShow@showAll')->name('analyze.showall');
        Route::post('/analyze/tips','ScoreShow@tips')->name('analyze.tips');
        // 获取个人成绩不同考试折线图
        Route::post('/analyze/getrank','ScoreShow@getRank')->name('analyze.getrank');
        // 个人分析列表页
        Route::get('/analyze/gerenfx','ScoreShow@gerenfx')->name('analyze.gerenfx');
        Route::post('/analyze/hasscore','ScoreShow@getHasScoreUser')->name('analyze.hasscore');
    }
);

// 不需要登录
Route::middleware('guest')->group(
    function () {
        Route::get('/login', 'Login@index')->name('login');
        Route::post('/dologin', 'Login@store')->name('login.store');
    }
);
