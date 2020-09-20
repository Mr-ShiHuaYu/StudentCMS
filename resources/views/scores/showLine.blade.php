@extends('common.layout')

@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-sm12  layui-col-md4">
                <div class="layui-card-body">
                    <blockquote class="layui-elem-quote layui-word-aux">
                        1. 表中为至少有一门成绩的人,没成绩则不显示<br>
                        2. 单击某个学生来具体查看成绩变化图
                    </blockquote>
                    <form class="layui-form" style="text-align: center;">
                        <div class="layui-inline layui-show-xs-block">
                            <input type="text" name="name_uid" placeholder="可模糊搜索姓名,学号" autocomplete="off"
                                   class="layui-input">
                        </div>
                        <div class="layui-inline">
                            <button class="layui-btn" lay-submit="" lay-filter="search" data-type="reload">
                                <i class="layui-icon">&#xe615;</i></button>
                        </div>
                    </form>
                    <table id="showline_table" lay-filter="test" lay-skin="line"></table>
                </div>
            </div>
            <div class="layui-col-sm12  layui-col-md8">
                <div class="layui-card">
                    <div class="layui-card-header uname"><span style="color: red;"></span>个人分析----分数变化拆线图</div>
                    <div class="layui-card-body" style="min-height: 300px;">
                        <div id="main1" class="layui-col-sm12" style="height: 300px;"></div>
                    </div>
                </div>

                <div class="layui-card">
                    <div class="layui-card-header uname"><span style="color: red;"></span>个人分析----排名变化拆线图</div>
                    <div class="layui-card-body" style="min-height: 300px;">
                        <div id="main2" class="layui-col-sm12" style="height: 300px;"></div>
                    </div>
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
                var form = layui.form
                    , table = layui.table;

                var myChart = echarts.init(document.getElementById('main1'));
                var myChart2 = echarts.init(document.getElementById('main2'));

                var showline_table = table.render({
                    elem: '#showline_table'
                    , height: 'full-130'
                    , method: 'post'
                    , url: '{{route('analyze.hasscore')}}' //数据接口
                    , page: false //开启分页
                    , cellMinWidth: 50 //全局定义常规单元格的最小宽度
                    , cols: [[ //表头
                        {field: 'id', hide: true}
                        , {type: 'numbers', title: '序号', width: 100, align: 'center'}
                        , {field: 'uid', title: '学号', sort: true, align: 'center'}
                        , {field: 'name', title: '姓名', sort: true, align: 'center'}
                    ]]
                });

                //监听行单击事件（双击事件为：rowDouble）
                table.on('row(test)', function (obj) {
                    var data = obj.data;
                    // 在这里向后台请求数据,并在右边的图表显示
                    $.post('{{route('analyze.getrank')}}', {uid: data.id}, function (res) {
                        if (res.status === 'success') {
                            // 在这里改变上面的uname,改变option里面的内容,渲染echarts
                            var d = res.data;
                            $('.uname span').text(d.uname);
                            option.legend.data = d.courses;
                            option.xAxis.data = d.exams;
                            // 这里要用到对象的深层拷贝,不然,两个对象之间会互相影响
                            var option2 = $.extend(true, {}, option);
                            option.series = d.score_series;
                            option2.series = d.rkdata_series;
                            myChart.setOption(option);
                            myChart2.setOption(option2);
                        }
                    });
                    //标注选中样式
                    obj.tr.addClass('layui-table-click').siblings().removeClass('layui-table-click');
                });

                // 表格的搜索重载
                form.on('submit(search)',
                    function (data) {
                        showline_table.reload({
                            where: data.field
                            , page: {
                                curr: 1 //重新从第 1 页开始
                            }
                        });
                        return false;
                    });

                var option = {
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        selectedMode: 'single',
                        data: []
                    },
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '3%',
                        containLabel: true
                    },
                    xAxis: {
                        type: 'category',
                        boundaryGap: false,
                        data: []
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series: []
                };
            });
    </script>
@stop
