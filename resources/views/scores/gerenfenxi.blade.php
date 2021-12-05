@extends('common.layout')

@section('content')
    @can('isAdmin')
        <div class="layui-col-sm12  layui-col-md3">
            <div class="layui-card-body">
                <blockquote class="layui-elem-quote layui-word-aux">
                    1. 表中为至少有一门成绩的人,没成绩则不显示<br>
                    2. 单击某个学生来具体查看成绩变化图
                </blockquote>
                <form class="layui-form layuimini-form" style="text-align: center;">
                    <div class="layui-inline layui-show-xs-block">
                        <input type="text" name="name_uid" placeholder="可模糊搜索姓名,学号" autocomplete="off"
                               class="layui-input">
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="search" data-type="reload">
                            <i class="layui-icon">&#xe615;</i></button>
                    </div>
                </form>
                <table id="showline_table" lay-filter="test" lay-skin="line"></table>
            </div>
        </div>
    @endcan
    <div class="layui-col-sm12  layui-col-md8 @cannot('isAdmin')layui-col-md-offset2 @endcannot">
        <div class="layui-row  layui-col-space10">
            <div class="layui-col-sm12  layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header uname">各科分数折线图<span style="color: red;"></span></div>
                    <div class="layui-card-body" style="min-height: 200px;">
                        <div id="main1" class="layui-col-sm12" style="height: 200px;"></div>
                    </div>
                </div>
            </div>
            <div class="layui-col-sm12  layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header uname">各科排名折线图<span style="color: red;"></span></div>
                    <div class="layui-card-body" style="min-height: 200px;">
                        <div id="main2" class="layui-col-sm12" style="height: 200px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-row  layui-col-space10">
            <div class="layui-col-sm12  layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header uname">总分折线图<span style="color: red;"></span></div>
                    <div class="layui-card-body" style="min-height: 200px;">
                        <div id="main3" class="layui-col-sm12" style="height: 200px;"></div>
                    </div>
                </div>
            </div>
            <div class="layui-col-sm12  layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header uname">总分排名折线图<span style="color: red;"></span></div>
                    <div class="layui-card-body" style="min-height: 200px;">
                        <div id="main4" class="layui-col-sm12" style="height: 200px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        layui.use(['laydate', 'form', 'table', 'echarts'],
            function () {
                var form = layui.form
                    , table = layui.table
                    , echarts = layui.echarts
                    , $ = layui.jquery;

                var myChart = echarts.init(document.getElementById('main1'));
                var myChart2 = echarts.init(document.getElementById('main2'));
                var myChart3 = echarts.init(document.getElementById('main3'));
                var myChart4 = echarts.init(document.getElementById('main4'));

                var showline_table = table.render({
                    elem: '#showline_table'
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

                function showLine(uid) {
                    $.post('{{route('analyze.getrank')}}', {uid: uid}, function (res) {
                        if (res.status === 'success') {
                            // 在这里改变上面的uname,改变option里面的内容,渲染echarts
                            var d = res.data;
                            $('.uname span').text('(' + d.uname + ')');
                            tpl_option.legend.data = d.courses;
                            tpl_option.xAxis.data = d.exams;
                            // 这里要用到对象的深层拷贝,不然,两个对象之间会互相影响
                            var option1 = $.extend(true, {}, tpl_option);
                            option1.series = d.score_series;
                            option1.tooltip = tooltip1;

                            var option2 = $.extend(true, {}, tpl_option);
                            // 让图2,排名图的y轴坐标上下反转,设置y轴坐标的最小值min,刻度最小间隔数minInterval
                            option2.yAxis = {type: 'value', inverse: true, min: 1, minInterval: 1};
                            option2.series = d.rkdata_series;
                            var option3 = $.extend(true, {}, tpl_option);
                            option3.series = d.sum_series;
                            option3.tooltip = tooltip3;

                            var option4 = $.extend(true, {}, tpl_option);
                            option4.series = d.sum_rank_series;
                            option4.yAxis = {type: 'value', inverse: true, min: 1, minInterval: 1};
                            myChart.setOption(option1);
                            myChart2.setOption(option2);
                            myChart3.setOption(option3);
                            myChart4.setOption(option4);
                        }
                    });
                }

                @cannot('isAdmin')
                showLine({{auth()->user()->bind_user_id}});
                @endcannot
                //监听行单击事件（双击事件为：rowDouble）
                table.on('row(test)', function (obj) {
                    var data = obj.data;
                    // 在这里向后台请求数据,并在右边的图表显示
                    showLine(data.id);
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

                var tooltip1 = {
                    trigger: 'axis',
                    formatter: function (params) {
                        var d = params[0];
                        return params[0].name + '<br>' + d.marker + '成绩:' + d.data.value + '<br>' + d.marker + '排名:' + d.data.score
                    }
                };

                var tooltip3 = {
                    trigger: 'axis',
                    formatter: function (params) {
                        var d = params[0];
                        return params[0].axisValueLabel + '<br>总分:' + d.data.value + "<br>排名:" + d.data.rank
                    }
                };

                var tpl_option = {
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
                        axisLabel: {
                            interval: 0
                        },
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
