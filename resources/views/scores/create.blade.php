@extends('common.layout')

@section('content')
    <form class="layui-form layuimini-form" lay-filter="score">
        <div class="layui-form-item">
            <div class="layui-col-xs6" style="text-align: center;">
                <div class="layui-inline">

                    @if (count($exams))
                        <label class="layui-form-label" style="width: 100px;">选择考试</label>
                        <div class="layui-input-inline">
                            <select name="exam_id" lay-verify="required" lay-search="">
                                @foreach($exams as $exam)
                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="layui-form-mid layui-word-aux">可模糊搜索,已添加的考试不显示</div>
                    @else
                        <div class="layui-form-mid layui-word-aux">你已添加全部考试成绩或未添加任何考试</div>
                    @endif
                </div>
            </div>
            <div class="layui-col-xs6" style="text-align: center;">
                <div class="layui-inline">
                    <label class="layui-form-label" style="width: 100px;">选择学生</label>
                    <div class="layui-input-inline">
                        <select name="student_id" lay-verify="required" lay-search="">
                            <option value="">请选择</option>
                            @foreach($students as $student)
                                <option value="{{$student->id}}">{{$student->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="layui-form-mid layui-word-aux">可模糊搜索,学生只能选择自己</div>
                </div>
            </div>
        </div>
        <div class="layui-card">
            <div class="layui-card-body ">
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
                    @if (count($exams))
                        @foreach($courses as $course)
                            <tr>
                                <td>{{$course->name}}</td>
                                <td>
                                    <input type="hidden" name="course_id[]" value="{{$course->id}}">
                                    <input type="number" lay-verify="required|score" name="score[]"
                                           class="layui-input scoreinput">
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>

        @if (count($exams))
            <div class="layui-form-item" style="text-align: center;">
                <button class="layui-btn" lay-filter="save" lay-submit="">提交</button>
            </div>
        @endif
    </form>

@stop

@section('js')
    <script>
        layui.use(['form', 'layer'],
            function () {
                var $ = layui.jquery,
                    form = layui.form,
                    layer = layui.layer;
                //自定义验证规则
                // form.verify({
                //     score: function (value) {
                //         if (value > 0) {
                //             return '分数不正确,为了手动添加class';
                //         }
                //     }
                // });
                $('.scoreinput').on('blur', function () {
                    var course_id = $(this).prev().val();
                    var score = $(this).val();
                    var name = $(this).parents('tr').find('td').first().text();
                    var that = this;
                    $.post("{{route('score.getfull')}}", {course_id: course_id}, function (res) {
                        var full = res.full;
                        if (score < 0 || score > full) {
                            layer.msg(name + '成绩应在0-' + full + '分之间');
                            $(that).addClass('form-danger');
                            return false;
                        } else {
                            if ($(that).hasClass('form-danger')) {
                                $(that).removeClass('form-danger');
                            }
                        }

                    });
                });
                //监听提交
                form.on('submit(save)',
                    function (data) {
                        $.post('{{route('score.store')}}', data.field, function (res) {
                            my.msg(res);
                        });
                        return false;
                    });
            });
    </script>
@stop
@section('css')
    <style>
        .form-danger {
            border-color: #FF5722 !important;
        }
    </style>
@stop
