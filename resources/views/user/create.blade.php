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
        <form class="layui-form layuimini-form" lay-filter="userForm">
            <table class="layui-table">
                <tbody>
                <tr>
                    <td class="xuehao">学号</td>
                    <td class="xuehao" colspan="5"><input class="layui-input" name="uid" type="text"
                                                          lay-verify="required"></td>
                </tr>
                <tr>
                    <td>学生姓名</td>
                    <td><input class="layui-input" name="name" type="text" lay-verify="required"></td>
                    <td>性别</td>
                    <td>
                        <input type="radio" name="sex" value="男" title="男">
                        <input type="radio" name="sex" value="女" title="女">
                    </td>
                    <td>联系电话</td>
                    <td><input class="layui-input" name="phone" lay-verify="phone" type="text">
                    </td>
                </tr>
                <tr>
                    <td>身份证号</td>
                    <td><input class="layui-input" name="sysid" lay-verify="required" type="text"></td>
                    <td>出生日期</td>
                    <td><input id="birth" class="layui-input" name="birth" type="text" lay-verify="required"></td>
                    <td>民族</td>
                    <td><input class="layui-input" name="minzu" type="text" lay-verify="required"></td>
                </tr>
                <tr>
                    <td>家庭经济状况</td>
                    <td><input class="layui-input" name="jingji" type="text"></td>
                    <td>户口所在地</td>
                    <td><input class="layui-input" name="hukou" type="text"></td>
                    <td>是否寄宿</td>
                    <td>
                        <select name="jishu" lay-filter="jishu" lay-verify="required">
                            <option value=""></option>
                            @foreach($jishuMap as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>户籍地址</td>
                    <td colspan="5"><input class="layui-input" name="huji" type="text"></td>
                </tr>
                <tr>
                    <td>现住址</td>
                    <td colspan="5"><input class="layui-input" name="xianzz" type="text"></td>
                </tr>
                <tr>
                    <td>是否农村留守儿童</td>
                    <td>
                        <input type="radio" name="liushou" value="1" title="是">
                        <input type="radio" name="liushou" value="0" title="否">
                    <td>留守儿童情况</td>
                    <td><input class="layui-input" name="liushouqk" type="text"></td>
                    <td>留守儿童托管情况</td>
                    <td><input class="layui-input" name="liushoutgqk" type="text"></td>
                </tr>
                </tbody>
            </table>
            <table class="layui-table">
                <tbody>
                <tr>
                    <td rowspan="100">家庭主要成员情况<i id="add_parents" class="layui-icon layui-icon-add-1"
                                                 style="color: red;"></i></td>
                    <td>姓名</td>
                    <td>年龄</td>
                    <td>与学生关系</td>
                    <td>工作(学习)单位</td>
                    <td>职业</td>
                    <td>联系电话</td>
                    <td>操作</td>
                </tr>
                </tbody>
            </table>
            <table class="layui-table">
                <tbody>
                <tr>
                    <td width="200">曾担任班干部的情况</td>
                    <td colspan="5" style="text-align: left;"><input class="layui-input" name="ganbu" type="text"
                        ></td>
                </tr>
                <tr>
                    <td>获奖情况</td>
                    <td colspan="5" style="text-align: left;"><input class="layui-input" name="huojiang" type="text"
                        >
                    </td>
                </tr>
                <tr>
                    <td>毕业学校</td>
                    <td colspan="5" style="text-align: left;"><input class="layui-input" name="biye" type="text"></td>
                </tr>
                </tbody>
            </table>
            <div class="layui-form-item" style="text-align: center;">
                <button class="layui-btn layui-btn-lg" lay-filter="create" lay-submit="">提交</button>
            </div>
        </form>

    </div>
@stop

@section('js')
    <script>
        layui.use(['laydate', 'form', 'layer', 'jquery'],
            function () {
                var $ = layui.jquery,
                    laydate = layui.laydate;
                var form = layui.form,
                    layer = layui.layer;
                //常规用法
                laydate.render({
                    elem: '#birth'
                    , trigger: 'click'
                });
                form.val('userForm', {
                    'sex': '男',
                    'jishu': 0,
                    'liushou': '0'
                });
                // 点击添加家庭主要成员
                $('#add_parents').click(function () {
                    var dom = '<tr><td><input class="layui-input" name="parent[name][]" type="text" lay-verify="required" placeholder="必填项"></td><td><input class="layui-input" name="parent[age][]" type="text" lay-verify="required"  placeholder="必填项"></td><td><input class="layui-input" name="parent[relation][]" type="text" lay-verify="required" placeholder="必填项"></td><td><input class="layui-input" name="parent[unit][]" type="text"></td><td><input class="layui-input" name="parent[job][]" type="text"></td><td><input class="layui-input" name="parent[phone][]" type="text"></td><td></td></tr>';
                    $(this).parents('tbody').append(dom);
                });

                //自定义验证规则
                form.verify({
                    username: function (value) {
                        if (value.length < 5) {
                            return '昵称至少得5个字符啊';
                        }
                    },
                    pass: [/(.+){6,12}$/, '密码必须6到12位'],
                    repass: function (value) {
                        if ($('#L_pass').val() != $('#L_repass').val()) {
                            return '两次密码不一致';
                        }
                    }
                });

                //监听提交
                form.on('submit(create)',
                    function (data) {
                        $.ajax({
                            type: "post",
                            url: "{{ route('user.store') }}",
                            data: data.field,
                            success: function (res) {
                                my.msg(res);
                            }
                        });
                        return false;
                    });


            });</script>
@stop
