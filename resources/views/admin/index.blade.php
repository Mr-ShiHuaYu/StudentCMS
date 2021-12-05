@extends('common.layout')

@section('content')
    <table id="adin_table" lay-filter="test"></table>
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


                table.render({
                    elem: '#adin_table'
                    , height: 'full-130'
                    , method: 'post'
                    , url: '{{route('admin.data')}}' //数据接口
                    , page: true //开启分页
                    , cellMinWidth: 50 //全局定义常规单元格的最小宽度
                    , cols: [[ //表头
                        {type: 'numbers', title: '序号', width: 100, align: 'center'}
                        , {field: 'username', title: '用户名', sort: true, align: 'center'}
                        , {field: 'name', title: '昵称', sort: true, align: 'center'}
                        , {field: 'role', title: '角色', sort: true, align: 'center'}
                        , {field: 'bind_username', title: '绑定的用户名', sort: true, align: 'center'}

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
                        case 'edit':
                            var url = '{{route('admin.edit','xxx')}}'.replace('xxx', data.id);
                            my.open('修改用户信息', url, 60, 80);
                            break;

                        case 'del':
                            layer.confirm('真的删除用户<span style="color:red;">' + data.name + '</span>么', function (index) {
                                var url = '{{route('admin.destroy','xxx')}}'.replace('xxx', data.id);
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
                            my.open('添加用户', '{{route('admin.create')}}', 50);
                            break;
                    }
                });
            });
    </script>
@stop
