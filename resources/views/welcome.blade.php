@extends('common.layout')

@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-body ">
                        <blockquote class="layui-elem-quote">欢迎管理员：
                            <span class="x-red">{{ auth()->user()->name }}</span>！当前时间:<span
                                id="curTime">{{$time}}</span>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="layui-col-xs12">
                <div class="layui-card">
                    <div class="layui-card-header"><i class="fa fa-credit-card icon icon-blue"></i>快捷入口</div>
                    <div class="layui-card-body">
                        <div class="welcome-module">
                            <div class="layui-row layui-col-space15">
                                <div class="layui-col-xs3 layui-module">
                                    <a onclick="parent.xadmin.add_tab('学生列表','{{route('user.index')}}',true)">
                                        <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                                        <cite>学生列表</cite>
                                    </a>
                                </div>
                                <div class="layui-col-xs3 layui-module">
                                    <a onclick="parent.xadmin.add_tab('老师列表','{{route('teacher.index')}}',true)">
                                        <i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
                                        <cite>老师列表</cite>
                                    </a>
                                </div>
                                <div class="layui-col-xs3 layui-module">
                                    <a onclick="parent.xadmin.add_tab('课程列表','{{route('course.index')}}',true)">
                                        <i class="fa fa-list-ol fa-5x" aria-hidden="true"></i>
                                        <cite>课程列表</cite>
                                    </a>
                                </div>
                                <div class="layui-col-xs3 layui-module">
                                    <a onclick="parent.xadmin.add_tab('考试列表','{{route('exam.index')}}',true)">
                                        <i class="fa fa-etsy fa-5x" aria-hidden="true"></i>
                                        <cite>考试列表</cite>
                                    </a>
                                </div>
                                <div class="layui-col-xs3 layui-module">
                                    <a onclick="parent.xadmin.add_tab('成绩录入','{{route('score.create')}}',true)">
                                        <i class="fa fa-upload fa-5x" aria-hidden="true"></i>
                                        <cite>成绩录入</cite>
                                    </a>
                                </div>
                                <div class="layui-col-xs3 layui-module">
                                    <a onclick="parent.xadmin.add_tab('成绩查询','{{route('score.index')}}',true)">
                                        <i class="fa fa-search fa-5x" aria-hidden="true"></i>
                                        <cite>成绩查询</cite>
                                    </a>
                                </div>
                                @can('isAdmin')
                                    <div class="layui-col-xs3 layui-module">
                                        <a onclick="parent.xadmin.add_tab('总体分析','{{route('analyze.index')}}',true)">
                                            <i class="fa fa-pie-chart fa-5x" aria-hidden="true"></i>
                                            <cite>总体分析</cite>
                                        </a>
                                    </div>
                                @endcan
                                <div class="layui-col-xs3 layui-module">
                                    <a onclick="parent.xadmin.add_tab('个人分析','{{route('analyze.gerenfx')}}',true)">
                                        <i class="fa fa-line-chart fa-5x" aria-hidden="true"></i>
                                        <cite>个人分析</cite>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style id="welcome_style"></style>
        </div>
    </div>
    <div class="layui-footer">
        © 赣ICP备<a href="http://www.beian.miit.gov.cn/" target="_blank" class="text">20008827</a>号-2
    </div>
@stop
@section('js')
    <script !src="">
        function toDb(i) {
            return i * 1 < 10 ? '0' + i : i;
        }

        function getTime() {
            var t = new Date();
            var y = toDb(t.getFullYear());
            var m = toDb(t.getMonth() + 1);
            var d = toDb(t.getDate());
            var h = toDb(t.getHours());
            var i = toDb(t.getMinutes());
            var s = toDb(t.getSeconds());
            return y + '-' + m + '-' + d + ' ' + h + ':' + i + ':' + s;
        }

        setInterval(function () {
            var dom = document.getElementById('curTime');
            dom.innerHTML = getTime();
        }, 1000)
    </script>
@stop
@section('css')
    <style>
        .layui-footer {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            height: 44px;
            line-height: 44px;
            padding: 0 15px;
            background-color: #eee;
            text-align: center;
        }

        .layui-module {
            text-align: center;
            margin-top: 10px;
            cursor: pointer;
        }

        .layui-module cite {
            position: relative;
            top: 4px;
            display: block;
            color: #666;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            font-size: 16px;
        }

        .icon {
            margin-right: 10px;
            color: #1aa094;
        }

        .icon-blue {
            color: #1e9fff !important;
        }
    </style>
@stop
