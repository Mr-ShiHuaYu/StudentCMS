@extends('common.layout')

@section('content')
    <table id="user_table" lay-filter="test"></table>
@stop

@section('js')
    @include('common.addbtn',['name'=>'添加'])
    @include('common.operation')

    <script>
        layui.use(['laydate', 'table'],
            function () {
                var $ = layui.jquery,
                    laydate = layui.laydate
                    , table = layui.table;
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
                    , method: 'post'
                    , url: '{{route('getteacher')}}' //数据接口
                    , page: true //开启分页
                    , cellMinWidth: 50 //全局定义常规单元格的最小宽度
                    , cols: [[ //表头
                        {type: 'numbers', title: '序号', width: 100, align: 'center'}
                        , {field: 'name', title: '姓名', sort: true, align: 'center'}
                        , {field: 'sex', title: '性别', sort: true, align: 'center'}
                        , {field: 'phone', title: '电话', sort: true, align: 'center'}
                        , {field: 'qq', title: 'QQ', sort: true, align: 'center'}
                        @can('isAdmin')
                        , {title: '操作', toolbar: '#barDemo', width: 150}
                        @endcan
                    ]]
                    , limit: 10
                    , limits: [10, 20, 30, 50, 100]
                    , toolbar: '#toolbarDemo'
                    , defaultToolbar: ['filter', 'print', 'exports']
                });

                @can('isAdmin')
                //监听行双击事件（双击事件为：row）
                table.on('rowDouble(test)', function (obj) {
                    var data = obj.data;
                    // 在这里显示某个学生具体的弹窗
                    var url = '{{route('teacher.edit','xxx')}}'.replace('xxx', data.id);
                    my.open('编辑<span style="color:red;">' + data.name + '</span>老师信息', url, 40, 60);
                    //标注选中样式
                    obj.tr.addClass('layui-table-click').siblings().removeClass('layui-table-click');
                });
                @endcan

                //头工具栏事件
                table.on('toolbar(test)', function (obj) {
                    switch (obj.event) {
                        case 'add':
                            my.open('添加老师', '{{route('teacher.create')}}', 40);
                            break;
                    }
                });
                //监听行工具事件
                table.on('tool(test)', function (obj) {
                    var data = obj.data;
                    if (obj.event === 'del') {
                        layer.confirm('真的删除<span style="color:red;">' + data.name + '</span>老师么', function (index) {
                            var url = '{{route('teacher.destroy','xxx')}}'.replace('xxx', data.id);
                            $.ajax({
                                type: 'delete',
                                url: url,
                                success: function (res) {
                                    my.msg(res);
                                }
                            });
                        });
                    } else if (obj.event === 'edit') {
                        var url = '{{route('teacher.edit','xxx')}}'.replace('xxx', data.id);
                        my.open('编辑<span style="color:red;">' + data.name + '</span>老师信息', url);
                    }
                });
            });
    </script>
@stop
