@extends('common.layout')

@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-body ">
                        <blockquote class="layui-elem-quote">欢迎管理员：
                            <span class="x-red">{{ auth()->user()->name }}</span>！当前时间:2018-04-25 20:50:53
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
@stop
