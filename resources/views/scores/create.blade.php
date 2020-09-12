@extends('common.layout')

@section('content')
    <div class="layui-fluid">
        <div class="layui-row">
            <div class="layui-col-xs6 layui-col-xs-offset3">
                <form class="layui-form">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">选择考试</label>
                            <div class="layui-input-inline">
                                <select name="modules" lay-verify="required" lay-search="">
                                    <option value=""></option>
                                    <option value="1">layer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>考试名称</th>
                            <th>学号</th>
                            <th>姓名</th>
                            @foreach($courses as $course)
                                <th>{{$course->name}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        {{--@foreach()
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                            @endforeach--}}
                    </table>
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
        layui.use(['laydate', 'form', 'layer'],
            function () {
                $ = layui.jquery;

                var form = layui.form,
                    laydate = layui.laydate,
                    layer = layui.layer;

                laydate.render({
                    elem: '#time', //指定元素
                    trigger: 'click'
                });
                // 先构造假数据格式
                var data = [
                    {
                        'name':'俞石华',
                        'uid': '123',
                        'course':[
                            {'course_id':'1','score':98},
                            {'course_id':'2','score':98},
                            {'course_id':'3','score':null},
                            {'course_id':'4','score':98}
                        ]
                    }
                ];
                //监听提交
                form.on('submit(save)',
                    function (data) {
                        $.post('{{route('exam.store')}}', data.field, function (res) {
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
