@extends('common.layout')

@section('content')

    <fieldset class="table-search-fieldset">
        <legend>搜索学生信息</legend>
        <div style="margin: 10px 10px 10px 10px">
            <form class="layui-form layui-form-pane">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <input class="layui-input" autocomplete="off" placeholder="出生日期开始"
                               name="birth_start"
                               id="start">
                    </div>
                    <div class="layui-inline">
                        <input class="layui-input" autocomplete="off" placeholder="出生日期结束" name="birth_end"
                               id="end">
                    </div>
                    <div class="layui-inline">
                        <input type="text" name="keyword" placeholder="支持任意字段模糊查找" autocomplete="off"
                               class="layui-input">
                    </div>
                    <div class="layui-inline">
                        <button type="submit" class="layui-btn layui-btn-normal" lay-submit lay-filter="search"><i
                                class="layui-icon"></i> 搜 索
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </fieldset>
    <table id="user_table" lay-filter="test"></table>
@stop

@section('js')
    @include('common.addbtn',['name'=>'添加'])
    @include('common.operation')

    <script>
        layui.use(['laydate', 'form', 'table', 'miniAdmin'],
            function () {
                var $ = layui.jquery,
                    laydate = layui.laydate
                    , form = layui.form
                    , table = layui.table;

                var startDate = laydate.render({
                    elem: '#start',
                    trigger: 'click',
                    min: '1900-1-1',
                    type: 'month',
                    done: function (value, date) {
                        endDate.config.min = {
                            year: date.year,
                            month: date.month - 1,
                            date: date.date
                        };
                        endDate.config.start = {
                            year: date.year,
                            month: date.month - 1,
                            date: date.date
                        };
                    }
                });

                var endDate = laydate.render({
                    elem: '#end',
                    trigger: 'click',
                    type: 'month',
                    done: function (value, date) {
                        startDate.config.max = {
                            year: date.year,
                            month: date.month - 1,
                            date: date.date
                        }
                    }
                });

                var user_table = table.render({
                    elem: '#user_table'
                    , title: "学生信息表"
                    , height: 'full-130'
                    , method: 'post'
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
                        , {field: 'jishu', title: '寄宿', sort: true, align: 'center'}
                        @can('isAdmin')
                        , {title: '操作', toolbar: '#barDemo', width: 150}
                        @endcan
                    ]]
                    , limits: [10, 20, 30, 50, 100]
                    , limit: 10
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

                //监听行工具事件
                table.on('tool(test)', function (obj) {
                    var data = obj.data;
                    switch (obj.event) {
                        //监听单元格事件
                        case 'edit':
                            var url = '{{route('user.show','xxx')}}'.replace('xxx', data.id);
                            my.open('个人信息', url, 90);
                            break;

                        case 'del':
                            layer.confirm('真的删除<span style="color:red;">' + data.name + '</span>学生么', function (index) {
                                var url = '{{route('user.destroy','xxx')}}'.replace('xxx', data.id);
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


                //监听行双击事件（双击事件为：row）
                table.on('rowDouble(test)', function (obj) {
                    var data = obj.data;
                    // 在这里显示某个学生具体的弹窗
                    var url = '{{route('user.show','xxx')}}'.replace('xxx', data.id);
                    my.open('个人信息', url, 90);
                    //标注选中样式
                    obj.tr.addClass('layui-table-click').siblings().removeClass('layui-table-click');
                });

                //头工具栏事件
                table.on('toolbar(test)', function (obj) {
                    switch (obj.event) {
                        case 'add':
                            my.open('添加学生', '{{route('user.create')}}', 100, 100);
                            break;
                        case 'export_excel':
                            window.open('{{route('user.export')}}', '_blank');
                    }
                });

                form.on('submit(search)', function (data) {
                    user_table.reload({
                        where: data.field,
                        page: {
                            curr: 1
                        }
                    });
                    return false;
                })
            });
    </script>
@stop
