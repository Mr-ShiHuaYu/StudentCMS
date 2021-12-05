@extends('common.layout')

@section('css')
    <link rel="stylesheet" href="{{asset('lib/font-awesome-4.7.0/css/font-awesome.min.css')}}" media="all">
    {{-- 用于显示github上的star数--}}
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <style>
        .icon {
            margin-right: 10px;
            color: #1aa094;
        }

        .icon-tip {
            color: #ff5722 !important;
        }

        .layuimini-qiuck-module a i {
            display: inline-block;
            width: 100%;
            height: 60px;
            line-height: 60px;
            text-align: center;
            border-radius: 2px;
            font-size: 30px;
            background-color: #F8F8F8;
            color: #333;
            transition: all .3s;
            -webkit-transition: all .3s;
        }

        .layuimini-qiuck-module a cite {
            position: relative;
            top: 2px;
            display: block;
            color: #666;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            font-size: 14px;
        }

        .panel {
            background-color: #fff;
            border: 1px solid transparent;
            border-radius: 3px;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05)
        }

        .panel-body {
            padding: 10px
        }

        .main_btn > p {
            height: 40px;
        }

        .layuimini-notice:hover {
            background: #f6f6f6;
        }

        .layuimini-notice {
            padding: 7px 16px;
            clear: both;
            font-size: 12px !important;
            cursor: pointer;
            position: relative;
            transition: background 0.2s ease-in-out;
        }

        .layuimini-notice-title, .layuimini-notice-label {
            padding-right: 70px !important;
            text-overflow: ellipsis !important;
            overflow: hidden !important;
            white-space: nowrap !important;
        }

        .layuimini-notice-title {
            line-height: 28px;
            font-size: 14px;
        }


        .layui-top-box {
            padding: 40px 20px 20px 20px;
            color: #fff
        }

        .panel {
            margin-bottom: 17px;
            background-color: #fff;
            border: 1px solid transparent;
            border-radius: 3px;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05)
        }

        .panel-body {
            padding: 15px;
            cursor: pointer;
        }

        .main_btn > p {
            height: 40px;
        }

        .layui-table td {
            padding: 10px 0;
            width: 1%;
            font-size: 12px;
            text-align: center;
        }
    </style>
@stop

@section('content')
    <div class="layuimini-main layui-top-box">
        <div class="layui-row layui-col-space10">

            <div class="layui-col-md3">
                <div class="col-xs-6 col-md-3">
                    <div class="panel layui-bg-cyan" style="background-color:#f35917 !important;">
                        <div class="panel-body" layuimini-content-href="{{route('user.index')}}" data-title="学生列表">
                            <div class="panel-content" style="margin: 16px 10px;">
                                <h1 class="no-margins">
                                    <i class="fa fa-graduation-cap"></i>
                                    学生列表
                                </h1>
                                <div class="stat-percent font-bold text-gray"><small>当前学生总数</small> {{ $userCount }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-col-md3">
                <div class="col-xs-6 col-md-3">
                    <div class="panel layui-bg-blue">
                        <div class="panel-body" layuimini-content-href="{{route('score.index')}}" data-title="成绩查询">
                            <div class="panel-content" style="margin: 25px 10px;">
                                <h1 class="no-margins">
                                    <i class="fa fa-search"></i>
                                    成绩查询
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @can('isAdmin')
                <div class="layui-col-md3">
                    <div class="col-xs-6 col-md-3">
                        <div class="panel layui-bg-green">
                            <div class="panel-body" layuimini-content-href="{{route('analyze.index')}}"
                                 data-title="总体分析">
                                <div class="panel-content" style="margin: 25px 10px;">
                                    <h1 class="no-margins">
                                        <i class="fa fa-pie-chart"></i>
                                        总体分析
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            <div class="layui-col-md3">
                <div class="col-xs-6 col-md-3">
                    <div class="panel layui-bg-orange">
                        <div class="panel-body" layuimini-content-href="{{route('analyze.gerenfx')}}" data-title="个人分析">
                            <div class="panel-content" style="margin: 25px 10px;">
                                <h1 class="no-margins">
                                    <i class="fa fa-line-chart"></i>
                                    个人分析
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="layui-box">
        {{--分为好多表--}}
        <div class="layui-row layui-col-space10">
            <div class="layui-col-md12">
                <blockquote class="layui-elem-quote main_btn">
                    <p>本系统是基于laravel 6.0及layuimini进行实现。layuimini GitHub地址：<a
                            class="layui-btn layui-btn-xs layui-btn-normal"
                            target="_blank"
                            href="https://github.com/zhongshaofa/layuimini/tree/v2">layuimini</a>
                    </p>
                    <p>本人QQ（974988176）：<a class="layui-btn layui-btn-xs layui-btn-danger" target="_blank"
                                          href="http://wpa.qq.com/msgrd?v=3&uin=974988176&site=qq&menu=yes">点击咨询</a>（对系统有任何问题,欢迎来咨询反馈!）
                    </p>
                    <p>项目GitHub地址：
                        <a class="github-button" href="https://github.com/974988176/StudentCMS" data-size="large"
                           data-show-count="true" aria-label="Star 974988176/StudentCMS on GitHub">Star</a>
                        <a class="github-button" href="https://github.com/974988176/StudentCMS/fork" data-size="large"
                           data-show-count="true" aria-label="Fork 974988176/StudentCMS on GitHub">Fork</a>
                    </p>
                    <p>喜欢此系统的可以给我的GitHub加个Star支持一下</p>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="layui-box">
        <div class="layui-card-header"><i class="fa fa-bullhorn icon icon-tip"></i>常见问题</div>
        <div class="layui-card-body layui-text">
            <div class="layuimini-notice">
                <div class="layuimini-notice-title">1.左侧的菜单在哪里修改?</div>
                <div class="layuimini-notice-content">
                    在数据库中的system_menu表中更改,其他pid为他的父级ID
                </div>
            </div>

            <div class="layuimini-notice">
                <div class="layuimini-notice-title">2.如何区分一个用户是的角色?权限?</div>
                <div class="layuimini-notice-content">
                    登录用户是在users表,user_has_role中用role_id关联表roles,记录了这个用户是管理员/老师/学生.users表中的bind_user_id表示这个用户对应学students/teachers中的表ID,如果这个用户是学生,那么对应students表的ID,否则对应的是teachers表的ID
                </div>
            </div>

            <div class="layuimini-notice">
                <div class="layuimini-notice-title">3.菜单图标怎么修改?</div>
                <div class="layuimini-notice-content">
                    可在 [Font Awesome 中文网](http://www.fontawesome.com.cn/faicons/)中找图标,然后,在`system_menu`表中的icon字段修改
                </div>
            </div>
            <div class="layuimini-notice">
                <div class="layuimini-notice-title">4.数据库中各个表的作用?</div>
                <div class="layuimini-notice-content">
                    users表保存可登入网站的用户
                    <br/>students表保存学生
                    <br/>teachers表保存老师
                    <br/>parents表保存学生家长
                    <br/>courses表为课程表
                    <br/>exams表为考试列表
                    <br/>role_menu 表为特殊角色专属菜单表,在表中的,只有身份为老师或管理员才可以显示
                    <br/>roles表,角色表,目前为3种角色
                    <br/>scores表为学生成绩表
                    <br/>system_menu表为系统菜单表
                    <br/>user_has_role: 用户拥有的角色表,标记了当前用户是管理员/老师/学生
                    <br/>其他表目前无用,以下是无用的表,为一些库自动生成的:
                    <br/>migrations: 迁移文件记录表,自动记录的,不用管
                    <br/>permissions:保存用户特殊权限表,暂时未用到
                    <br/>role_has_permissions:角色对应的权限表,暂时未用
                    <br/>user_has_permissions: 用户拥有的特殊权限表,暂时未用
                </div>
            </div>

        </div>
    </div>
@stop

@section('js')
    <script !src="">
        layui.use(['table', 'miniTab'], function () {
            var miniTab = layui.miniTab;
            miniTab.listen();
        });
    </script>
@stop
