@extends('common.layout')

@section('css')
    <link rel="stylesheet" href="{{asset('lib/font-awesome-4.7.0/css/font-awesome.min.css')}}" media="all">
    {{-- 用于显示github上的star数--}}
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <style>
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

        .panel-title {
            margin-top: 0;
            margin-bottom: 0;
            font-size: 14px;
            color: inherit
        }

        .label {
            display: inline;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25em;
            margin-top: .3em;
        }

        .layui-red {
            color: red
        }

        .main_btn > p {
            height: 40px;
        }

        .layui-table {
            width: 10%;
            float: left;
        }

        .layui-table td {
            padding: 10px 0;
            width: 1%;
            font-size: 12px;
            text-align: center;
        }

        .score-title {
            color: red;
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
@stop

@section('js')
    <script !src="">
        layui.use(['table', 'miniTab'], function () {
            var miniTab = layui.miniTab;
            miniTab.listen();
        });
    </script>
@stop
