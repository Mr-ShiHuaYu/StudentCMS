@extends('common.layout')

@section('content')
    <table class="layui-table">
        <tr>
            <td>授课老师</td>
            <td>{{$teacher->name}}</td>
        </tr>
        <tr>
            <td>性别</td>
            <td>{{$teacher->sex}}</td>
        </tr>
        <tr>
            <td>联系电话</td>
            <td>{{$teacher->phone}}</td>
        </tr>
        <tr>
            <td>QQ</td>
            <td>{{$teacher->qq}}</td>
        </tr>
    </table>

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
