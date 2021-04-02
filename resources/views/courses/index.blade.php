@extends('common.layout')

@section('content')
    <table id="course_table" lay-filter="test"></table>
@stop

@section('js')
    @include('common.addbtn',['name'=>'添加'])
    @include('common.operation')

    <script>
        layui.use(['laydate', 'table'],
            function () {
                var $ = layui.jquery,
                    table = layui.table
                    , laydate = layui.laydate;

                laydate.render({
                    elem: '#start' //指定元素
                    , trigger: 'click'
                });

                laydate.render({
                    elem: '#end' //指定元素
                    , trigger: 'click'
                });

                table.render({
                    elem: '#course_table'
                    , height: 'full-130'
                    , method: 'post'
                    , url: '{{route('getcourse')}}' //数据接口
                    , page: true //开启分页
                    , cellMinWidth: 50 //全局定义常规单元格的最小宽度
                    , cols: [[ //表头
                        {field: 'teacher_id', hide: true}
                        , {type: 'numbers', title: '序号', width: 100, align: 'center'}
                        , {field: 'name', title: '课程名称', sort: true, align: 'center'}
                        , {field: 'full', title: '满分', sort: true, align: 'center'}
                        , {
                            field: 'teacher',
                            event: 'show_teacher',
                            title: '授课老师',
                            sort: true,
                            align: 'center',
                            templet: function (d) {
                                if (!d.teacher) {
                                    return '<span style="cursor: pointer;" class="layui-badge">未指定老师</span>';
                                }
                                return '<span style="cursor: pointer;" class="layui-badge layui-bg-blue">' + d.teacher.name + '</span>';
                            }
                        }
                        @can('isAdmin')
                        , {title: '操作', toolbar: '#barDemo', width: 150}
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
                            if (data.teacher) {
                                var url = '{{route('teacher.show','xxx')}}'.replace('xxx', data.teacher_id);
                                my.open('授课老师信息', url, 40);
                            } else {
                                layer.alert('该课程未指定老师,请让管理员双击指定授课老师!', {icon: 5})
                            }
                            break;
                        case 'edit':
                            var url = '{{route('course.edit','xxx')}}'.replace('xxx', data.id);
                            my.open('修改课程信息', url, 40, 50);
                            break;

                        case 'del':
                            layer.confirm('真的删除<span style="color:red;">' + data.name + '</span>课程么', function (index) {
                                var url = '{{route('course.destroy','xxx')}}'.replace('xxx', data.id);
                                $.ajax({
                                    type: 'delete',
                                    url: url,
                                    success: function (res) {
                                        my.msg(res);
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
                            my.open('添加课程', '{{route('course.create')}}', 50);
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
                    my.open('修改课程信息', url, 40, 50);
                    //标注选中样式
                    obj.tr.addClass('layui-table-click').siblings().removeClass('layui-table-click');
                });
                @endcan
            });
    </script>
@stop
