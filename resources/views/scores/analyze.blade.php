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
                    <form class="layui-form layui-col-space5">
                        <div class="layui-form-mid layui-word-aux">请选择考试,若不选,默认为一</div>
                        <div class="layui-inline layui-show-xs-block">
                            <div class="layui-input-inline">
                                <select name="exam_id" lay-search="">
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

                var analyze_table = table.render({
                    elem: '#analyze_table'
                    , height: 'full-130'
                    , url: '{{route('score.showall')}}'
                    , page: false
                    , cellMinWidth: 40
                    , where: {'exam_id': 1}
                    , cols: [[
                        {field: 'cid', hide: true}
                        , {field: 'eid', hide: true}
                        , {type: 'numbers', title: '序号', width: 100, align: 'center'}
                        , {field: 'exam', title: '考试', sort: true, align: 'center'}
                        , {
                            field: 'course',
                            title: '课程',
                            event: 'show_analyze',
                            sort: true,
                            align: 'center',
                            templet: function (d) {
                                return '<span style="cursor: pointer;" class="layui-badge layui-bg-blue">' + d.course + '</span>';
                            }
                        }
                        , {field: 'full', title: '满分', sort: true, align: 'center'}
                        , {field: 'join_num', title: '参考人数', sort: true, align: 'center'}
                        , {field: '优秀', title: '优秀', sort: true, align: 'center'}
                        , {field: '良好', title: '良好', sort: true, align: 'center'}
                        , {field: '及格', title: '及格', sort: true, align: 'center'}
                        , {field: '不及格', title: '不及格', sort: true, align: 'center'}

                        , {field: 'max', title: '最高分', sort: true, align: 'center'}
                        , {field: 'min', title: '最低分', sort: true, align: 'center'}
                        , {
                            field: 'avg', title: '平均分', sort: true, align: 'center', templet: function (d) {
                                return (d.avg * 1).toFixed(2);
                            }
                        }
                    ]]
                });

                //监听行工具事件
                table.on('tool(test)', function (obj) {
                    var data = obj.data;
                    switch (obj.event) {
                        case 'show_analyze':
                            var url = "{{route('analyze.getpie',['cid','eid'])}}".replace('cid', data.cid).replace('eid',data.eid);
                            xadmin.open('', url, 800, 400);
                            break;
                    }
                });

                // 表格的搜索重载
                form.on('submit(search)',
                    function (data) {
                        //执行重载
                        // table.reload('test', {
                        //     where: data.field
                        // }, 'data');
                        analyze_table.reload({
                            where: data.field
                        });
                        return false;
                    });
            });
    </script>
@stop
