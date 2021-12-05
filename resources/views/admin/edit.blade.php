@extends('common.layout')

@section('content')
    <form class="layui-form layuimini-form" lay-filter="user">
        <div class="layui-form-item">
            <label class="layui-form-label required">用户名</label>
            <div class="layui-input-inline">
                <input type="text" name="username" lay-verify="required" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">姓名</label>
            <div class="layui-input-inline">
                <input type="text" name="name" lay-verify="required" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">重置密码</label>
            <div class="layui-input-inline">
                <input type="text" name="password" class="layui-input">
            </div>
        </div>


        <div class="layui-form-item">
            <label class="layui-form-label required">角色</label>
            <div class="layui-input-inline">
                <select name="role_id" lay-verify="required" lay-search="" lay-filter="select_role">
                    <option value=""></option>
                    @foreach($roles as $v)
                        <option value="{{$v->id}}">{{$v->nickname}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="layui-form-item" id="students" style="display: none;">
            <label class="layui-form-label">绑定学生</label>
            <div class="layui-input-inline">
                <select name="bind_student_id" lay-search="">
                    <option value=""></option>
                    @foreach($students as $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-form-item" id="teachers" style="display: none;">
            <label class="layui-form-label">绑定老师</label>
            <div class="layui-input-inline">
                <select name="bind_teacher_id" lay-search="">
                    <option value=""></option>
                    @foreach($teachers as $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-form-item" style="text-align: center;">
            <button class="layui-btn layui-btn-normal" lay-filter="save" lay-submit="">修  改</button>
        </div>
    </form>
@stop

@section('js')
    <script>
        layui.use(['form', 'layer'],
            function () {
                var $ = layui.jquery,
                    form = layui.form,
                    layer = layui.layer;

                var data = @json($user)

                form.val('user', data);
                form.render();
                if (data.role_id === 3){
                    // 学生,显示绑定学生
                    $("#students").show();
                    $("#teachers").hide();
                }else {
                    $("#students").hide();
                    $("#teachers").show();
                }

                form.on('select(select_role)', function(data){
                    var role = $(data.elem[data.value]).text();
                    if (role === '学生'){
                        $("#students").show();
                        $("#teachers").hide();
                    }else {
                        $("#students").hide();
                        $("#teachers").show();
                    }
                    form.render();
                });


                //监听提交
                form.on('submit(save)',
                    function (data) {

                        $.ajax({
                            type: 'put',
                            url: '{{route('admin.update',$user->id)}}',
                            data: data.field,
                            success: function (res) {
                                my.msg(res);
                            }
                        });
                        return false;
                    });
            });
    </script>
@stop
