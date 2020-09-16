@extends('common.layout')

@section('content')
    <div class="x-nav">
    <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">成绩分析</a>
        <a><cite>总体分析</cite></a>
    </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
           onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
        </a>
    </div>
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-sm12">
                <div class="layui-card-body">
                    <table id="analyze_table" lay-filter="test"></table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('lib/echarts/echarts.min.js')}}"></script>
    <script>
        layui.use(['laydate', 'form', 'table'],
            function () {
                var laydate = layui.laydate
                    , form = layui.form
                    , table = layui.table;

                table.render({
                    elem: '#analyze_table'
                    , height: 'full-130'
                    , url: '{{route('score.showall')}}'
                    , page: false
                    , cellMinWidth: 50
                    , cols: [[
                        {field: 'cid', hide: true}
                        , {type: 'numbers', title: '序号', width: 100, align: 'center'}
                        , {
                            field: 'course',
                            title: '课程名称',
                            event: 'show_analyze',
                            sort: true,
                            align: 'center',
                            templet: function (d) {
                                return '<span style="cursor: pointer;" class="layui-badge layui-bg-blue">' + d.course + '</span>';
                            }
                        }
                        , {field: 'join_num', title: '参考人数', sort: true, align: 'center'}
                        , {field: '优秀', title: '优秀', sort: true, align: 'center'}
                        , {field: '良好', title: '良好', sort: true, align: 'center'}
                        , {field: '及格', title: '及格', sort: true, align: 'center'}
                        , {field: '不及格', title: '不及格', sort: true, align: 'center'}
                        , {
                            field: 'avg', title: '平均分', sort: true, align: 'center', templet: function (d) {
                                return (d.avg * 1).toFixed(2);
                            }
                        }
                        , {field: 'max', title: '最高分', sort: true, align: 'center'}
                        , {field: 'min', title: '最低分', sort: true, align: 'center'}
                        , {field: 'sum', title: '总分', sort: true, align: 'center'}
                    ]]
                });

                //监听行工具事件
                table.on('tool(test)', function (obj) {
                    var data = obj.data;
                    switch (obj.event) {
                        case 'show_analyze':
                            var url = "{{route('analyze.getpie','xxx')}}".replace('xxx', data.cid);
                            xadmin.open('', url, 800, 400);
                            break;
                    }
                });
            });
    </script>
@stop
