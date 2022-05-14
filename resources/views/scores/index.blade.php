@extends('common.layout')

@section('content')
    <blockquote class="layui-elem-quote layui-word-aux">
        1. 可按学生姓名,学号和考试模糊搜索<br>
        2. 标准差表示成绩的离散程度,标准差越小，表示成绩越集中于平均成绩
    </blockquote>
    <form class="layui-form layui-col-space5">
        @can('isAdmin')
            <div class="layui-inline layui-show-xs-block">
                <input type="text" name="name_uid" placeholder="请输入学生姓名或学号" autocomplete="off"
                       class="layui-input">
            </div>
        @else
            <div class="layui-form-mid layui-word-aux">可按考试搜索</div>
        @endcan
        <div class="layui-inline layui-show-xs-block">
            <div class="layui-input-inline">
                <select name="exam_id" lay-search="">
                    <option value="">选择考试</option>
                    @foreach($exams as $exam)
                        <option value="{{$exam->id}}">{{$exam->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-inline layui-show-xs-block">
            <button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="search" data-type="reload">
                <i class="layui-icon">&#xe615;</i></button>
        </div>
    </form>
    <table id="score_table" lay-filter="test"></table>
@stop

@section('js')
    @include('common.addbtn',['name'=>'成绩录入'])
    @include('common.operation')

    <script>
        layui.use(['laydate', 'form', 'table'],
            function () {
                var $ = layui.jquery,
                    laydate = layui.laydate
                    , form = layui.form;
                var table = layui.table;
                //执行一个laydate实例
                laydate.render({
                    elem: '#start' //指定元素
                    , trigger: 'click'
                });

                //执行一个laydate实例
                laydate.render({
                    elem: '#end' //指定元素
                    , trigger: 'click'
                });

                var score_table = table.render({
                    elem: '#score_table'
                    , height: 'full-130'
                    , method: 'post'
                    , url: '{{route('getscore')}}' //数据接口
                    , page: true //开启分页
                    , cellMinWidth: 50 //全局定义常规单元格的最小宽度
                    , cols: [[
                        {type: 'numbers', title: '序号', width: 80, align: 'center'}
                        , {field: 'uid', title: '学号', sort: true, align: 'center'}
                        , {field: 'name', title: '姓名', sort: true, align: 'center'}
                        , {field: 'exam', title: '考试', sort: true, align: 'center'}
                        // 动态获取全部课程,循环遍历
                        @foreach($courses as $course)
                        , {
                            field: '{{$course->name}}',
                            edit: 'text',
                            title: '{{$course->name}}',
                            sort: true,
                            align: 'center'
                        }
                        @endforeach
                        , {field: 'std', title: '标准差', sort: true, align: 'center'}
                        , {field: 'avg', title: '平均分', sort: true, align: 'center'}
                        , {field: 'sum', title: '总分', sort: true, align: 'center'}
                    ]]
                    , limit: 10
                    , limits: [10, 20, 30, 50, 100]
                    , toolbar: '#toolbarDemo'
                    , defaultToolbar: ['filter', 'print',
                            @can('isAdmin')
                        {
                            title: '导出Excel' //标题
                            , layEvent: 'export_excel' //事件名，用于 toolbar 事件中使用
                            , icon: 'layui-icon-export' //图标类名
                        }
                        @endcan
                    ]
                });

                //头工具栏事件
                table.on('toolbar(test)', function (obj) {
                    switch (obj.event) {
                        case 'add':
                            my.open('成绩录入', '{{route('score.create')}}', 70, 90);
                            break;
                        case 'export_excel':
                            window.open('{{route('score.export')}}', '_blank');
                    }
                });

                //监听单元格编辑
                table.on('edit(test)', function (obj) {
                    var value = obj.value //得到修改后的值
                        , data = obj.data //得到所在行所有键值
                        , field = obj.field //得到字段  化学
                        , that = $(this).prev();
                    var old = that.text();//旧值
                    // 在这里去后台获取课程的满分值
                    $.post("{{route('score.getfull')}}", {field: field}, function (res) {
                        var full = res.full;
                        if (value < 0 || value > full) {
                            layer.msg('成绩应在0-' + full + '分之间');
                            that.text(old);
                            return false;
                        }
                        layer.confirm('真的要修改' + data.name + '的' + field + '成绩为' + value + '吗?', function (index) {
                            $.ajax({
                                type: 'put',
                                url: '{{route('score.update','x')}}',
                                data: {id: data.id, course: field, score: value, exam: data.exam},
                                success: function (res) {
                                    my.msg(res);
                                }
                            });
                        }, function (index) {
                            that.text(old);
                            layer.close(index);
                        });
                    });
                    return false;
                });

                // 表格的搜索重载
                form.on('submit(search)',
                    function (data) {
                        score_table.reload({
                            where: data.field
                            , page: {
                                curr: 1 //重新从第 1 页开始
                            }
                        });
                        return false;
                    });


            });
    </script>
@stop
