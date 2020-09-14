@extends('common.layout')

@section('content')
    <div class="x-nav">
    <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a><cite>成绩列表</cite></a>
    </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
           onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
        </a>
    </div>
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-body ">
                        <form class="layui-form layui-col-space5">
                            <div class="layui-form-mid layui-word-aux">可按学生姓名,学号和考试模糊搜索</div>
                            <div class="layui-inline layui-show-xs-block">
                                <input type="text" name="name_uid" placeholder="请输入学生姓名或学号" autocomplete="off"
                                       class="layui-input">
                            </div>
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
                                <button class="layui-btn" lay-submit="" lay-filter="search" data-type="reload">
                                    <i class="layui-icon">&#xe615;</i></button>
                            </div>
                        </form>
                    </div>
                    <div class="layui-card-body ">
                        <table id="score_table" lay-filter="test"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @include('common.addbtn',['name'=>'成绩录入'])
    @include('common.operation')


    <script>
        layui.use(['laydate', 'form', 'table'],
            function () {
                var laydate = layui.laydate
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
                    , url: '{{route('getscore')}}' //数据接口
                    , page: true //开启分页
                    , cellMinWidth: 50 //全局定义常规单元格的最小宽度
                    , cols: [[
                        {type: 'numbers', title: '序号', width: 80, align: 'center'}
                        , {field: 'uid', title: '学号', sort: true, align: 'center'}
                        , {field: 'name', title: '姓名', sort: true, align: 'center'}
                        , {field: 'exam', title: '考试', sort: true, align: 'center'}
                        // 关键代码,循环课程
                        @foreach($courses as $course)
                        , {
                            field: '{{$course->name}}',
                            edit: 'text',
                            title: '{{$course->name}}',
                            sort: true,
                            align: 'center'
                        }
                        @endforeach
                        , {
                            field: 'avg', title: '平均分', sort: true, align: 'center', templet: function (d) {
                                return (d.avg * 1).toFixed(2);
                            }
                        }
                        , {field: 'sum', title: '总分', sort: true, align: 'center'}

                    ]]
                    , limit: 10
                    , limits: [10, 20, 30, 50, 100]
                    , toolbar: '#toolbarDemo'
                    , defaultToolbar: ['filter', 'print', {
                        title: '导出Excel' //标题
                        , layEvent: 'export_excel' //事件名，用于 toolbar 事件中使用
                        , icon: 'layui-icon-export' //图标类名
                    }]
                });

                //头工具栏事件
                table.on('toolbar(test)', function (obj) {
                    switch (obj.event) {
                        case 'add':
                            xadmin.open('成绩录入', '{{route('score.create')}}');
                            break;
                        case 'export_excel':
                            window.open('{{route('score.export')}}', '_blank');
                    }
                });

                @can('isAdmin')
                //监听行双击事件（双击事件为：row）
                table.on('rowDouble(test)', function (obj) {
                    var data = obj.data;
                    // 在这里显示某个学生具体的弹窗
                    var url = '{{route('exam.edit','xxx')}}'.replace('xxx', data.id);
                    // xadmin.open('修改考试信息', url, 800);
                    //标注选中样式
                    obj.tr.addClass('layui-table-click').siblings().removeClass('layui-table-click');
                });
                @endcan

                //监听单元格编辑
                table.on('edit(test)', function (obj) {
                    var value = obj.value //得到修改后的值
                        , data = obj.data //得到所在行所有键值
                        , field = obj.field; //得到字段  化学
                    var old = $(this).prev().text();//旧值
                    if (value < 0 || value > 150) {
                        layer.msg('成绩应在0-150分之间');
                        $(this).val(old);
                        return false;
                    }
                    layer.confirm('真的要修改' + data.name + '的' + field + '成绩为' + value + '吗?', function (index) {
                        $.ajax({
                            type: 'put',
                            url: '{{route('score.update','x')}}',
                            data: {uid: data.uid, course: field, score: value, exam: data.exam},
                            success: function (res) {
                                if (res.status === 'success') {
                                    layer.msg(res.msg, {icon: 6, time: 1000});
                                } else {
                                    layer.alert(res.msg, {icon: 5});
                                }
                            }
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
