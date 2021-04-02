@extends('common.layout')

@section('content')
    <form class="layui-form layuimini-form">
        <div class="layui-form-item">
            <label class="layui-form-label">考试名称</label>
            <div class="layui-input-inline">
                <input type="text" name="name" class="layui-input" lay-verify="required">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">考试时间</label>
            <div class="layui-input-inline">
                <input id="time" class="layui-input" name="time" type="text" autocomplete="off">
            </div>
        </div>
        <div class="layui-form-item" style="text-align: center;">
            <button class="layui-btn" lay-filter="save" lay-submit="">提交</button>
        </div>
    </form>
@stop

@section('js')
    <script>
        layui.use(['laydate', 'form', 'layer'],
            function () {
                var $ = layui.jquery,
                    form = layui.form,
                    laydate = layui.laydate;

                laydate.render({
                    elem: '#time', //指定元素
                    trigger: 'click'
                });
                //监听提交
                form.on('submit(save)',
                    function (data) {
                        $.post('{{route('exam.store')}}', data.field, function (res) {
                            my.msg(res);
                        });
                        return false;
                    });
            });
    </script>
@stop
