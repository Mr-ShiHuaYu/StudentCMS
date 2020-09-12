@extends('common.layout')

@section('content')
    <div class="layui-fluid">
        <div class="layui-row">
            <div class="layui-col-xs8 layui-col-xs-offset2">
                <form class="layui-form">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">选择考试(可搜索)</label>
                            <div class="layui-input-inline">
                                <select name="exam_id" lay-verify="required" lay-search="">
                                    <option value=""></option>
                                    @foreach($exams as $exam)
                                        <option value="{{$exam->id}}">{{$exam->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">选择学生(可搜索)</label>
                            <div class="layui-input-inline">
                                <select name="student_id" lay-verify="required" lay-search="">
                                    <option value=""></option>
                                    @foreach($students as $student)
                                        <option value="{{$student->id}}">{{$student->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <table class="layui-table">
                        <colgroup>
                            <col width="50">
                            <col width="50">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>课程</th>
                            <th>分数</th>
                        </tr>
                        </thead>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{$course->name}}</td>
                                <td>
                                    <input type="hidden" name="course_id[]" value="{{$course->id}}">
                                    <input type="number" lay-verify="required|score" name="score[]" class="layui-input">
                                </td>
                            </tr>
                        @endforeach
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
        layui.use(['form', 'layer'],
            function () {
                $ = layui.jquery;

                var form = layui.form,
                    layer = layui.layer;
                //自定义验证规则
                form.verify({
                    score: [/^1?[1-9]?\d([.]\d)?$/, '成绩必须大于0']
                });
                //监听提交
                form.on('submit(save)',
                    function (data) {
                        $.post('{{route('score.store')}}', data.field, function (res) {
                            console.log(data.field);
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
