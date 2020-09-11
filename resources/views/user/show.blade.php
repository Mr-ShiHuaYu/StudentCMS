@extends('common.layout')
@section('css')
    <style>
        .xuehao {
            font-weight: bold;
            font-size: 18px !important;
            color: red;
        }
    </style>
@stop
@section('content')
    <div class="layui-fluid">
        <table class="layui-table">
            <tbody>
            <tr>
                <td class="xuehao">学号</td>
                <td class="xuehao" colspan="5">{{$user->uid}}</td>
            </tr>
            <tr>
                <td>学生姓名</td>
                <td>{{$user->name}}</td>
                <td>性别</td>
                <td>{{$user->sex}}</td>
                <td>联系电话</td>
                <td>{{$user->phone}}</td>
            </tr>
            <tr>
                <td>身份证号</td>
                <td>{{$user->sysid}}</td>
                <td>出生日期</td>
                <td>{{$user->birth}}</td>
                <td>民族</td>
                <td>{{$user->minzu}}</td>
            </tr>
            <tr>
                <td>家庭经济状况</td>
                <td>{{$user->jingji}}</td>
                <td>户口所在地</td>
                <td>{{$user->hukou}}</td>
                <td>是否寄宿</td>
                <td>{{$user->jishu}}</td>
            </tr>
            <tr>
                <td>户籍地址</td>
                <td colspan="5">{{$user->huji}}</td>
            </tr>
            <tr>
                <td>现住址</td>
                <td colspan="5">{{$user->xianzz}}</td>
            </tr>
            <tr>
                <td>是否农村留守儿童</td>
                <td>@if ($user->liushou)
                        是
                    @else
                        否
                    @endif</td>
                <td>留守儿童情况</td>
                <td>{{$user->liushouqk}}</td>
                <td>留守儿童托管情况</td>
                <td>{{$user->liushoutgqk}}</td>
            </tr>
            </tbody>
        </table>
        <table class="layui-table">
            <tbody>
            <tr>
                <td rowspan="100">家庭主要成员情况</td>
                <td>姓名</td>
                <td>年龄</td>
                <td>与学生关系</td>
                <td>工作(学习)单位</td>
                <td>职业</td>
                <td>联系电话</td>
            </tr>
            @forelse($user->parents as $parent)
                <tr>
                    <td>{{$parent->name}}</td>
                    <td>{{$parent->age}}</td>
                    <td>{{$parent->relation}}</td>
                    <td>{{$parent->unit}}</td>
                    <td>{{$parent->job}}</td>
                    <td>{{$parent->phone}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">暂未添加家庭主要成员情况</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <table class="layui-table">
            <tbody>
            <tr>
                <td width="200">曾担任班干部的情况</td>
                <td colspan="5" style="text-align: left;">{{$user->ganbu}}</td>
            </tr>
            <tr>
                <td>获奖情况</td>
                <td colspan="5" style="text-align: left;">{{$user->huojiang}}</td>
            </tr>
            <tr>
                <td>毕业学校</td>
                <td colspan="5" style="text-align: left;">{{$user->biye}}</td>
            </tr>
            </tbody>
        </table>
        <div style="text-align: center;">
            <a href="{{route('user.edit',$user->id)}}" class="layui-btn layui-btn-danger">修&nbsp;&nbsp;改</a>
        </div>
    </div>
@stop
