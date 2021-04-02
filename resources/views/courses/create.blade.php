@extends('common.layout')

@section('content')
    <form class="layui-form layuimini-form">
        <div class="layui-form-item">
            <label class="layui-form-label required">课程名称</label>
            <div class="layui-input-inline">
                <input type="text" name="name" lay-verify="required" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">满分</label>
            <div class="layui-input-inline">
                <input type="text" name="full" class="layui-input" lay-verify="required">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">授课老师</label>
            <div class="layui-input-inline">
                <select name="teacher_id" lay-verify="required" lay-search="">
                    <option value=""></option>
                    @foreach($teachers as $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item" style="text-align: center;">
            <button class="layui-btn" lay-filter="save" lay-submit="">提交</button>
        </div>
    </form>
@stop

@section('js')
    <script>
        layui.use(['form', 'layer'],
            function () {
                var $ = layui.jquery,
                    form = layui.form,
                    layer = layui.layer;

                //监听提交
                form.on('submit(save)',
                    function (data) {
                        $.post('{{route('course.store')}}', data.field, function (res) {
                            my.msg(res);
                        });
                        return false;
                    });
            });
    </script>
@stop
