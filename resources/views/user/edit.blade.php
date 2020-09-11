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
        <form class="layui-form" lay-filter="user">
            <table class="layui-table">
                <tbody>
                <tr>
                    <td class="xuehao">学号</td>
                    <td class="xuehao" colspan="5">{{$user->uid}}</td>
                </tr>
                <tr>
                    <td>学生姓名</td>
                    <td><input class="layui-input" name="name" type="text" value=></td>
                    <td>性别</td>
                    <td>
                        <input type="radio" name="sex" value="男" title="男">
                        <input type="radio" name="sex" value="女" title="女">
                    </td>
                    <td>联系电话</td>
                    <td><input class="layui-input" name="phone" lay-filter="phone" type="text">
                    </td>
                </tr>
                <tr>
                    <td>身份证号</td>
                    <td><input class="layui-input" name="sysid"></td>
                    <td>出生日期</td>
                    <td><input id="birth" class="layui-input" name="birth" type="text" value="{{$user->birth}}"></td>
                    <td>民族</td>
                    <td><input class="layui-input" name="minzu" type="text" value="{{$user->minzu}}"></td>
                </tr>
                <tr>
                    <td>家庭经济状况</td>
                    <td><input class="layui-input" name="jingji" type="text" value="{{$user->jingji}}"></td>
                    <td>户口所在地</td>
                    <td><input class="layui-input" name="hukou" type="text" value="{{$user->hukou}}"></td>
                    <td>是否寄宿</td>
                    <td>
                        <select name="jishu">
                            <option value=""></option>
                            @foreach($jishuMap as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>户籍地址</td>
                    <td colspan="5"><input class="layui-input" name="huji" type="text" value="{{$user->huji}}"></td>
                </tr>
                <tr>
                    <td>现住址</td>
                    <td colspan="5"><input class="layui-input" name="xianzz" type="text" value="{{$user->xianzz}}"></td>
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
                @forelse($user->parents as $parent)
                    <tr>
                        <td><input class="layui-input" name="parent[name][]" type="text" value="{{$parent->name}}"
                                   lay-verify="required"
                                   placeholder="必填项"></td>
                        <td><input class="layui-input" name="parent[age][]" type="text" value="{{$parent->age}}"
                                   lay-verify="required"
                                   placeholder="必填项"></td>
                        <td><input class="layui-input" name="parent[relation][]" type="text"
                                   value="{{$parent->relation}}" lay-verify="required" placeholder="必填项"></td>
                        <td><input class="layui-input" name="parent[unit][]" type="text" value="{{$parent->unit}}"></td>
                        <td><input class="layui-input" name="parent[job][]" type="text" value="{{$parent->job}}"></td>
                        <td><input class="layui-input" name="parent[phone][]" type="text" value="{{$parent->phone}}">
                        </td>
                        <td class="delete">
                            <input type="hidden" value="{{$parent->id}}">
                            <button type="button" class="layui-btn layui-btn-xs layui-btn-danger"><i class="layui-icon">&#xe640;</i>删除
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr id="nodata">
                        <td colspan="7">暂未添加家庭主要成员情况</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <table class="layui-table">
                <tbody>
                <tr>
                    <td width="200">曾担任班干部的情况</td>
                    <td colspan="5" style="text-align: left;"><input class="layui-input" name="ganbu" type="text"></td>
                </tr>
                <tr>
                    <td>获奖情况</td>
                    <td colspan="5" style="text-align: left;"><input class="layui-input" name="huojiang" type="text">
                    </td>
                </tr>
                <tr>
                    <td>毕业学校</td>
                    <td colspan="5" style="text-align: left;"><input class="layui-input" name="biye" type="text"></td>
                </tr>
                </tbody>
            </table>
            <div class="layui-form-item" style="text-align: center;">
                <button class="layui-btn layui-btn-lg" lay-filter="update" lay-submit="">提交</button>
            </div>
        </form>

    </div>
@stop

@section('js')
    <script>
        layui.use(['laydate', 'form', 'layer', 'jquery'],
            function () {
                $ = layui.jquery;
                var laydate = layui.laydate;
                var form = layui.form,
                    layer = layui.layer;
                //常规用法
                laydate.render({
                    elem: '#birth'
                });
                // 为表单赋值初始值
                form.val('user',{
                    'name': "{{$user->name}}",
                    'sex': "{{$user->sex}}",
                    'phone': "{{$user->phone}}",
                    'sysid': "{{$user->sysid}}",
                    'birth': "{{$user->birth}}",
                    'minzu': "{{$user->minzu}}",
                    'jingji': "{{$user->jingji}}",
                    'hukou': "{{$user->hukou}}",
                    'jishu': "{{array_search($user->jishu, $jishuMap)}}",
                    'huji': "{{$user->huji}}",
                    'xianzz': "{{$user->xianzz}}",
                    'liushou': "{{$user->liushou}}",
                    'liushouqk': "{{$user->liushouqk}}",
                    'liushoutgqk': "{{$user->liushoutgqk}}",
                    'ganbu': "{{$user->ganbu}}",
                    'huojiang': "{{$user->huojiang}}",
                    'biye': "{{$user->biye}}"
                });
                // 点击添加家庭主要成员
                $('#add_parents').click(function () {
                    var dom = '<tr><td><input class="layui-input" name="parent[name][]" type="text" lay-verify="required" placeholder="必填项"></td><td><input class="layui-input" name="parent[age][]" type="text" lay-verify="required"  placeholder="必填项"></td><td><input class="layui-input" name="parent[relation][]" type="text" lay-verify="required" placeholder="必填项"></td><td><input class="layui-input" name="parent[unit][]" type="text"></td><td><input class="layui-input" name="parent[job][]" type="text"></td><td><input class="layui-input" name="parent[phone][]" type="text"></td><td></td></tr>';
                    if ($('#nodata').length) {
                        $('#nodata').remove();
                    }
                    $(this).parents('tbody').append(dom);
                });

                $('.delete button').click(function () {
                    var that = this;
                    layer.confirm('确定删除这个家庭成员吗?', function () {
                        var id = $(that).prev(':hidden').val();
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('user.destroy',$user->id) }}",
                            data: {id: id},
                            success: function (res) {
                                if (res.status === 'success') {
                                    layer.alert(res.msg, {icon: 6}, function (index) {
                                        layer.close(index);
                                        window.location.href = "{{route('user.show',$user->id)}}";
                                    });
                                } else {
                                    layer.alert(res.msg, {icon: 5});
                                }
                            }
                        });
                    });

                    return false;
                });
                //自定义验证规则
                form.verify({
                    username: function (value) {
                        if (value.length < 5) {
                            return '昵称至少得5个字符啊';
                        }
                    },
                    nickname: function (value) {
                        if (value.length < 3) {
                            return '昵称至少得3个字符啊';
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
                form.on('submit(update)',
                    function (data) {
                        $.ajax({
                            type: "PUT",
                            url: "{{ route('user.update',$user->id) }}",
                            data: data.field,
                            success: function (res) {
                                if (res.status === 'success') {
                                    layer.alert(res.msg, {
                                            icon: 6
                                        },
                                        function (index) {
                                            layer.close(index);
                                            window.location.href = "{{route('user.show',$user->id)}}";
                                        });
                                } else {
                                    layer.alert(res.msg, {
                                        icon: 5
                                    });
                                }
                            }
                        });
                        return false;
                    });


            });</script>
@stop
