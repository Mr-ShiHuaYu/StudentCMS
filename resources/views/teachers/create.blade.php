@extends('common.layout')

@section('content')
    <form class="layui-form layuimini-form">
        <div class="layui-form-item">
            <label class="layui-form-label required">老师名称</label>
            <div class="layui-input-inline">
                <input type="text" lay-verify="required" name="name" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">性别</label>
            <div class="layui-input-inline">
                <input type="radio" name="sex" value="男" title="男" checked>
                <input type="radio" name="sex" value="女" title="女">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系电话</label>
            <div class="layui-input-inline">
                <input type="text" name="phone" lay-verify="required" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">QQ</label>
            <div class="layui-input-inline">
                <input type="text" name="qq" class="layui-input">
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
                        $.post('{{route('teacher.store')}}', data.field, function (res) {
                            my.msg(res);
                        });
                        return false;
                    });
            });
    </script>
@stop
