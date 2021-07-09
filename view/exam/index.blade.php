@extends('common.layout')

@section('content')
    <table id="exam_table" lay-filter="test"></table>
@stop

@section('js')
    @include('common.addbtn',['name'=>'添加'])
    @include('common.operation')

    <script>
        layui.use(['laydate', 'table'],
            function () {
                var $ = layui.jquery,
                    table = layui.table,
                    laydate = layui.laydate;
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
                    elem: '#exam_table'
                    , height: 'full-130'
                    , method: 'post'
                    , url: '{{url('getexams')}}' //数据接口
                    , page: true //开启分页
                    , cellMinWidth: 50 //全局定义常规单元格的最小宽度
                    , cols: [[
                        {type: 'numbers', title: '序号', width: 100, align: 'center'}
                        , {field: 'name', title: '考试名称', sort: true, align: 'center'}
                        , {field: 'time', title: '考试时间', sort: true, align: 'center'}
                        , {title: '操作', toolbar: '#barDemo', width: 150}
                    ]]
                    , limit: 10
                    , limits: [10, 20, 30, 50, 100]
                    , toolbar: '#toolbarDemo'
                });

                //监听行工具事件
                table.on('tool(test)', function (obj) {
                    var data = obj.data;
                    switch (obj.event) {
                        case 'edit':
                            var url = '{{url('exam/edit',['id'=>'xxx'])}}'.replace('xxx', data.id);
                            my.open('修改考试信息', url, 40, 50);
                            break;

                        case 'del':
                            layer.confirm('真的删除<span style="color:red;">' + data.name + '</span>考试么', function (index) {
                                var url = '{{url('exam/delete',['id'=>'xxx'])}}'.replace('xxx', data.id);
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
                    switch (obj.event) {
                        case 'add':
                            my.open('添加考试', '{{url('exam/create')}}', 40);
                            break;
                    }
                });

                //监听行双击事件（双击事件为：row）
                table.on('rowDouble(test)', function (obj) {
                    var data = obj.data;
                    // 在这里显示某个学生具体的弹窗
                    var url = '{{url('exam/edit',['id'=>'xxx'])}}'.replace('xxx', data.id);
                    my.open('修改考试信息', url, 40, 50);
                    //标注选中样式
                    obj.tr.addClass('layui-table-click').siblings().removeClass('layui-table-click');
                });
            });
    </script>
@stop
