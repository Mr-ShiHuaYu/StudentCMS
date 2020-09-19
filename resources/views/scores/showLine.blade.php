@extends('common.layout')

@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-sm12  layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header"><span style="color: red;">{{$uname}}</span>个人分析----分数变化拆线图</div>
                    <div class="layui-card-body" style="min-height: 300px;">
                        <div id="main1" class="layui-col-sm12" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="layui-col-sm12  layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header"><span style="color: red;">{{$uname}}</span>个人分析----排名变化拆线图</div>
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
                var laydate = layui.laydate
                    , form = layui.form
                    , table = layui.table;

                var myChart = echarts.init(document.getElementById('main1'));
                var option = {
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        selectedMode: 'single',
                        data: @json($courses)
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
                        data: @json($exams)
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series: [
                        @foreach($scdata as $d)
                        {
                            name: '{{$d->name}}',
                            type: 'line',
                            smooth: true,
                            data: @json($d->scores)
                        },
                        @endforeach
                    ]
                };
                myChart.setOption(option);

                var myChart2 = echarts.init(document.getElementById('main2'));
                option = {
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        selectedMode: 'single',
                        data: @json($courses)
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
                        data: @json($exams)
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series: [
                        @foreach($rkdata as $d)
                        {
                            name: '{{$d->name}}',
                            type: 'line',
                            smooth: true,
                            data: @json($d->scores)
                        },
                        @endforeach
                    ]
                };
                myChart2.setOption(option);
            });
    </script>
@stop
