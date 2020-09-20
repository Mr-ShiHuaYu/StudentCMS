@extends('common.layout')
@section('content')
    @include('common.header')
    @include('common.side')
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
            <ul class="layui-tab-title">
                <li class="home">
                    <i class="layui-icon">&#xe68e;</i>我的桌面
                </li>
            </ul>
            <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                <dl>
                    <dd data-type="this">关闭当前</dd>
                    <dd data-type="other">关闭其它</dd>
                    <dd data-type="all">关闭全部</dd>
                </dl>
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <iframe src='{{route('welcome')}}' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                </div>
            </div>
            <div id="tab_show"></div>
        </div>
    </div>
    <div class="page-content-bg"></div>
    <style id="theme_style"></style>
@stop

@section('js')
    <script>
        // 是否开启刷新记忆tab功能
        // var is_remember = true;// 注释掉就是开始
        layui.use('jquery', function () {
            var $ = layui.jquery;
            @if(config('sys.hide_side'))
            xadmin.hide_side();
            @endif
        });
    </script>
@stop

@section('css')
    <style>
        .layui-nav .layui-nav-item dl dd {
            text-align: center;
        }
    </style>
@stop
