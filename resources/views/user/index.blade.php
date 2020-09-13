@extends('common.layout')

@section('content')
    <div class="x-nav">
    <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">用户管理</a>
        <a><cite>学生列表</cite></a>
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
                            <div class="layui-inline layui-show-xs-block">
                                <input class="layui-input" autocomplete="off" placeholder="开始日" name="start" id="start">
                            </div>
                            <div class="layui-inline layui-show-xs-block">
                                <input class="layui-input" autocomplete="off" placeholder="截止日" name="end" id="end">
                            </div>
                            <div class="layui-inline layui-show-xs-block">
                                <input type="text" name="username" placeholder="请输入用户名" autocomplete="off"
                                       class="layui-input"></div>
                            <div class="layui-inline layui-show-xs-block">
                                <button class="layui-btn" lay-submit="" lay-filter="sreach">
                                    <i class="layui-icon">&#xe615;</i></button>
                            </div>
                        </form>
                    </div>
                    <div class="layui-card-body ">
                        <table id="user_table" lay-filter="test"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container">
            <button class="layui-btn layui-btn-xs" lay-event="add"><i class="layui-icon"></i>添加</button>
        </div>
    </script>

{{--    <script type="text/html" id="activeTpl">
        <span
            class="layui-btn layui-btn-normal layui-btn-mini @{{ d.jishu==='否'?'layui-btn-disabled':''}}">@{{d.jishu}}</span>
    </script>--}}

    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>
    <script>
        layui.use(['laydate', 'form'],
            function () {
                var laydate = layui.laydate
                    , form = layui.form;
                //执行一个laydate实例
                laydate.render({
                    elem: '#start' //指定元素
                });

                //执行一个laydate实例
                laydate.render({
                    elem: '#end' //指定元素
                });
            });
    </script>
    <script>
        layui.use('table',
            function () {
                var table = layui.table;
                table.render({
                    elem: '#user_table'
                    , title: "学生信息表"
                    , height: 'full-130'
                    , url: '{{route('getuser')}}' //数据接口
                    , page: true //开启分页
                    , cellMinWidth: 50 //全局定义常规单元格的最小宽度
                    , initSort: {field: 'uid', type: 'asc'}
                    , cols: [[ //表头
                        {type: 'numbers', title: '序号', width: 100, align: 'center'}
                        , {field: 'uid', title: '学号', sort: true, align: 'center'}
                        , {field: 'name', title: '姓名', sort: true, align: 'center'}
                        , {field: 'sex', title: '性别', sort: true, align: 'center'}
                        , {field: 'phone', title: '手机', sort: true, align: 'center'}
                        , {field: 'birth', title: '出生日期', sort: true, align: 'center'}
                        , {field: 'minzu', title: '民族', sort: true, align: 'center'}
                        // , {field: 'jishu', title: '寄宿', sort: true, align: 'center', templet: '#activeTpl'}
                        , {field: 'jishu', title: '寄宿', sort: true, align: 'center'}
                        , {fixed: 'right', title: '操作', toolbar: '#barDemo', width: 150}
                        // , {minWidth: 200, align: 'center', toolbar: '#barDemo'} //这里的toolbar值是模板元素的选择器
                    ]]
                    , limits: [10, 20, 30, 50, 100]
                    , limit: 10
                    , toolbar: '#toolbarDemo'
                    , defaultToolbar: ['filter', 'print', 'exports']
                });

                //监听行工具事件
                table.on('tool(test)', function (obj) {
                    var data = obj.data;
                    switch (obj.event) {
                        //监听单元格事件
                        case 'edit':
                            var url = '{{route('user.show','xxx')}}'.replace('xxx', data.id);
                            xadmin.open('个人信息', url);
                            break;

                        case 'del':
                            layer.confirm('真的删除<span style="color:red;">' + data.name + '</span>课程么', function (index) {
                                var url = '{{route('user.destroy','xxx')}}'.replace('xxx', data.id);
                                $.ajax({
                                    type: 'delete',
                                    url: url,
                                    success: function (res) {
                                        if (res.status === 'success') {
                                            layer.alert(res.msg, {icon: 6}, function (index) {
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


                //监听行双击事件（双击事件为：row）
                table.on('rowDouble(test)', function (obj) {
                    var data = obj.data;
                    // 在这里显示某个学生具体的弹窗
                    var url = '{{route('user.show','xxx')}}'.replace('xxx', data.id);
                    xadmin.open('个人信息', url);
                    //标注选中样式
                    obj.tr.addClass('layui-table-click').siblings().removeClass('layui-table-click');
                });

                //头工具栏事件
                table.on('toolbar(test)', function (obj) {
                    var checkStatus = table.checkStatus(obj.config.id);
                    switch (obj.event) {
                        case 'delAll':
                            var data = checkStatus.data;
                            var names = data.map(function (item) {
                                return item.name;
                            });
                            var ids = data.map(function (item) {
                                return item.id;
                            });
                            if (ids.length) {
                                layer.confirm('确定删除<span style="color:red;">' + names.toString() + '</span>吗?', function () {
                                    $.ajax({
                                        type: 'delete',
                                        url: '{{route('user.delall')}}',
                                        data: {ids: ids},
                                        success: function (res) {
                                            if (res.status === 'success') {
                                                layer.alert(res.msg, {icon: 6}, function () {
                                                    window.location.reload();
                                                });
                                            } else {
                                                layer.msg(res.msg, {icon: 5, time: 1000});
                                            }
                                        }
                                    });
                                });
                            }
                            break;
                        case 'add':
                            xadmin.open('添加学生', '{{route('user.create')}}');
                            break;
                    }
                    ;
                });
            });
    </script>
@stop
