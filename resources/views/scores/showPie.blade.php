@extends('common.layout')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header">{{$data['exam'].$data['name']}}课程分析</div>
        <div class="layui-card-body" style="min-height: 300px;">
            <div id="main1" class="layui-col-sm12" style="height: 300px;"></div>
        </div>
    </div>
@stop

@section('js')
    <script>
        layui.use(['laydate', 'form', 'table', 'echarts'],
            function () {
                var laydate = layui.laydate
                    , form = layui.form
                    , table = layui.table
                    , echarts = layui.echarts;

                var myChart = echarts.init(document.getElementById('main1'));
                // 指定图表的配置项和数据
                var option = {
                    tooltip: {
                        trigger: 'item',
                        formatter: "{a} <br/>{b} : {c} ({d}%)"
                    },
                    legend: {
                        orient: 'vertical',
                        left: 'right',
                        data: ['优秀', '良好', '及格', '不及格']
                    },
                    series: @json($data)
                };
                myChart.setOption(option);
            });
    </script>
@stop
