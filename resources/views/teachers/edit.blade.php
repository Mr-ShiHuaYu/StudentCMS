@extends('common.layout')

@section('content')
    <form class="layui-form layuimini-form" lay-filter="teacher">
        <div class="layui-form-item">
            <label class="layui-form-label required">老师名称</label>
            <div class="layui-input-inline">
                <input type="text" lay-verify="required" name="name" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label required">性别</label>
            <div class="layui-input-inline">
                <input type="radio" name="sex" value="男" title="男">
                <input type="radio" name="sex" value="女" title="女">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系电话</label>
            <div class="layui-input-inline">
                <input type="text" name="phone" class="layui-input" value="{{$teacher->phone}}">
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

                //给表单赋值
                form.val("teacher", @json($teacher));

                //监听提交
                form.on('submit(save)',
                    function (data) {
                        $.ajax({
                            type: 'put',
                            url: '{{route('teacher.update',$teacher->id)}}',
                            data: data.field,
                            success: function (res) {
                                my.msg(res);
                            }
                        });
                        return false;
                    });
            });
    </script>
@stop
