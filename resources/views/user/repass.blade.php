@extends('common.layout')

@section('content')
    <form class="layui-form layuimini-form">
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">姓名</label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="username" disabled value="{{auth()->user()->name}}"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label required">旧密码</label>
            <div class="layui-input-inline">
                <input type="text" id="L_repass" name="oldpass" required="" lay-verify="required"
                       autocomplete="off" class="layui-input"></div>
        </div>
        <div class="layui-form-item">
            <label for="L_pass" class="layui-form-label required">新密码</label>
            <div class="layui-input-inline">
                <input type="text" id="L_pass" name="newpass" required="" lay-verify="required|newpass"
                       autocomplete="off" class="layui-input"></div>
        </div>
        <div class="layui-form-item">
            <label for="R_repass" class="layui-form-label required">确认密码</label>
            <div class="layui-input-inline">
                <input type="text" id="R_repass" name="newpass_confirmation" required=""
                       lay-verify="required|confirmpass"
                       autocomplete="off" class="layui-input"></div>
        </div>
        <div class="layui-form-item" style="text-align: center;">
            <button class="layui-btn" lay-filter="save" lay-submit="">提交</button>
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

                //自定义验证规则
                form.verify({
                    confirmpass: function (value) {
                        if ($('input[name=newpass]').val() !== value)
                            return '两次密码输入不一致！';
                    },
                    /*newpass: [
                        /^[\S]{6,12}$/
                        , '密码必须6到12位，且不能出现空格'
                    ]*/
                });

                //监听提交
                form.on('submit(save)',
                    function (data) {
                        $.post('{{route('dorepwd')}}', data.field, function (res) {
                            if (res.status === 'success') {
                                layer.msg(res.msg, {icon: 6, time: 1000}, function () {
                                    top.window.location.reload();
                                })
                            } else {
                                layer.alert(res.msg, {icon: 5});
                            }
                        });
                        return false;
                    });
            });
    </script>
@stop
