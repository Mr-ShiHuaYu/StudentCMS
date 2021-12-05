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


// 需要登录
// 这里部分用数组的写法,因为,数组的写法比@的写法有个好处是,ide可以识别到,可以点击直接跳转到对应方法
Route::middleware('auth')->group(
    function () {
        // 权限相关
//        Route::get('/per/create', [\App\Http\Controllers\PermissionController::class, 'create']);
//        Route::get('/per/index', [\App\Http\Controllers\PermissionController::class, 'index']);
        // 初始化
        Route::get('/init', [\App\Http\Controllers\InitController::class, 'systemInit'])->name('init');
        Route::get('/clear', [\App\Http\Controllers\InitController::class, 'clear'])->name('clear');
        //首页
        Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');
        Route::get('/welcome', [\App\Http\Controllers\IndexController::class, 'welcome'])->name('welcome');
        Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

        // 个人信息
        Route::get('/info', [\App\Http\Controllers\UserController::class, 'info'])->name('user.info');
        // 学生
        Route::resource('/user', 'UserController');
        Route::post('/getuser', 'UserController@getUser')->name('getuser');
        Route::delete('/delall', 'UserController@deleteAll')->name('user.delall');
        Route::delete('/delparent/{id}', 'UserController@delParent')->name('user.delparent');
        Route::get('/export/user', 'UserController@export')->name('user.export');
        // 老师
        Route::resource('/teacher', 'TeacherController');
        Route::post('/getteacher', 'TeacherController@getTeacher')->name('getteacher');

        // 修改密码
        Route::get('/repwd', 'LoginController@showRepwdForm')->name('repwd');
        Route::post('/repwd', 'LoginController@repwd')->name('dorepwd');

        // 课程
        Route::resource('/course', 'CoursesController');
        Route::post('/getcourse', 'CoursesController@getcourse')->name('getcourse');

        // 考试
        Route::resource('/exam', 'ExamsController');
        Route::post('/getexams', 'ExamsController@getexams')->name('getexams');

        // 成绩
        Route::resource('/score', 'ScoresController');
        Route::post('/getscore', 'ScoresController@getscore')->name('getscore');
        Route::get('/export/score', 'ScoresController@export')->name('score.export');
        Route::post('/getfull', 'ScoresController@getFull')->name('score.getfull');

        // 成绩分析
        Route::get('/analyze/index', 'ScoreAnalyzeController@index')->name('analyze.index');
        Route::get('/analyze/pie/{cid}/{eid}', 'ScoreAnalyzeController@getPie')->name('analyze.getpie');
        Route::post('/analyze/showall', 'ScoreAnalyzeController@showAll')->name('analyze.showall');
        Route::post('/analyze/tips', 'ScoreAnalyzeController@tips')->name('analyze.tips');
        // 获取个人成绩不同考试折线图
        Route::post('/analyze/getrank', 'ScoreAnalyzeController@getRank')->name('analyze.getrank');
        // 个人分析列表页
        Route::get('/analyze/gerenfx', 'ScoreAnalyzeController@gerenfx')->name('analyze.gerenfx');
        Route::post('/analyze/hasscore', 'ScoreAnalyzeController@getHasScoreUser')->name('analyze.hasscore');

        // 管理员专属
        Route::resource('/admin', 'AdminController');
        Route::post('/admin.data', 'AdminController@getData')->name('admin.data');
    }
);


// 不需要登录
Route::middleware('guest')->group(
    function () {
        Route::get('/login', 'LoginController@index')->name('login');
        Route::post('/dologin', 'LoginController@store')->name('login.store');
    }
);

Route::any('/test', 'TestController@test')->name('test');
