@extends('common.layout')

@section('content')
    <div class="x-nav">
    <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a><cite>课程列表</cite></a>
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
                        <table id="user_table" lay-filter="test"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @include('common.addbtn',['name'=>'添加'])
    @include('common.operation')

    <script>
        layui.use(['laydate', 'form', 'table'],
            function () {
                var table = layui.table;
                var laydate = layui.laydate
                    , form = layui.form;
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

                table.render({
                    elem: '#user_table'
                    , height: 'full-130'
                    , url: '{{route('getcourse')}}' //数据接口
                    , page: true //开启分页
                    , cellMinWidth: 50 //全局定义常规单元格的最小宽度
                    , cols: [[ //表头
                        {field: 'teacher_id', hide: true}
                        , {type: 'numbers', title: '序号', width: 100, align: 'center'}
                        , {field: 'name', title: '课程名称', sort: true, align: 'center'}
                        , {
                            field: 'teacher',
                            event: 'show_teacher',
                            title: '授课老师',
                            sort: true,
                            align: 'center',
                            templet: function (d) {
                                if (!d.teacher) {
                                    return '<button class="layui-btn layui-btn-danger">未指定老师</button>';
                                }
                                return '<button class="layui-btn layui-btn-normal">' + d.teacher.name + '</button>';
                            }
                        }
                        @can('isAdmin')
                        , {fixed: 'right', title: '操作', toolbar: '#barDemo', width: 150}
                        @endcan
                    ]]
                    , limit: 10
                    , limits: [10, 20, 30, 50, 100]
                    , toolbar: '#toolbarDemo'
                });

                //监听行工具事件
                table.on('tool(test)', function (obj) {
                    var data = obj.data;
                    switch (obj.event) {
                        //监听单元格事件
                        case 'show_teacher':
                            if (data.teacher_id) {
                                var url = '{{route('teacher.show','xxx')}}'.replace('xxx', data.teacher_id);
                                xadmin.open('授课老师信息', url, 600);
                            } else {
                                layer.alert('该课程未指定老师,请让管理员双击指定授课老师!', {icon: 5})
                            }
                            break;
                        case 'edit':
                            var url = '{{route('course.edit','xxx')}}'.replace('xxx', data.id);
                            xadmin.open('修改课程信息', url, 800);
                            break;

                        case 'del':
                            layer.confirm('真的删除<span style="color:red;">' + data.name + '</span>课程么', function (index) {
                                var url = '{{route('course.destroy','xxx')}}'.replace('xxx', data.id);
                                $.ajax({
                                    type: 'delete',
                                    url: url,
                                    success: function (res) {
                                        if (res.status === 'success') {
                                            layer.alert(res.msg, {icon: 6}, function (index) {
                                                // obj.del();
                                                // layer.close(index);
                                                window.location.reload();
                                            })
                                        } else {
                                            layer.alert(res.msg, {icon: 5});
                                        }
                                    }
                                });

                            });
                            break;
                    }

                });

                //头工具栏事件
                table.on('toolbar(test)', function (obj) {
                    var data = obj.data;

                    switch (obj.event) {
                        case 'add':
                            xadmin.open('添加课程', '{{route('course.create')}}', 700, 400);
                            break;

                    }
                    ;
                });

                @can('isAdmin')
                //监听行双击事件（双击事件为：row）
                table.on('rowDouble(test)', function (obj) {
                    var data = obj.data;
                    // 在这里显示某个学生具体的弹窗
                    var url = '{{route('course.edit','xxx')}}'.replace('xxx', data.id);
                    xadmin.open('修改课程信息', url, 800);
                    //标注选中样式
                    obj.tr.addClass('layui-table-click').siblings().removeClass('layui-table-click');
                });
                @endcan
            });
    </script>
@stop
