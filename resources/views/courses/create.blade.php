@extends('common.layout')

@section('content')
    <div class="layui-fluid">
        <div class="layui-row">
            <div class="layui-col-xs6 layui-col-xs-offset3">
                <form class="layui-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label"><span class="x-red">*</span>课程名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><span class="x-red">*</span>授课老师</label>
                        <div class="layui-input-inline">
                            <select name="teacher">
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

            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        layui.use(['form', 'layer'],
            function () {
                $ = layui.jquery;
                var form = layui.form,
                    layer = layui.layer;

                //监听提交
                form.on('submit(save)',
                    function (data) {
                        $.post('{{route('course.store')}}', data.field, function (res) {
                            if (res.status === 'success') {
                                layer.alert(res.msg, {icon: 6}, function (index) {
                                    xadmin.father_reload();
                                });
                            } else {
                                layer.msg(res.msg, {icon: 5, time: 1000});
                            }
                        });
                        return false;
                    });
            });
    </script>
@stop
