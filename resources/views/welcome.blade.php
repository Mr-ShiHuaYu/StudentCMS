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
                        <blockquote class="layui-elem-quote">
                            <span class="x-red">我的桌面还没设计，有好的想法可以跟我反应</span>
                        </blockquote>
                    </div>
                </div>
            </div>
            {{--<div class="layui-col-sm6 layui-col-md3">
                <div class="layui-card">
                    <div class="layui-card-header">下载
                        <span class="layui-badge layui-bg-cyan layuiadmin-badge">月</span></div>
                    <div class="layui-card-body ">
                        <p class="layuiadmin-big-font">33,555</p>
                        <p>新下载
                            <span class="layuiadmin-span-color">10%
                                    <i class="layui-inline layui-icon layui-icon-face-smile-b"></i></span>
                        </p>
                    </div>
                </div>
            </div>--}}
            <div class="layui-col-sm6 layui-col-md3">
                <div class="layui-card">
                    <div class="layui-card-header">下载
                        <span class="layui-badge layui-bg-cyan layuiadmin-badge">月</span></div>
                    <div class="layui-card-body ">
                        <p class="layuiadmin-big-font">33,555</p>
                        <p>新下载
                            <span class="layuiadmin-span-color">10%
                                    <i class="layui-inline layui-icon layui-icon-face-smile-b"></i></span>
                        </p>
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
        }
    </style>
@stop
