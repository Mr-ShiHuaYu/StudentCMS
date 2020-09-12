<!doctype html>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    @include('common.css')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <script src="{{asset('lib/layui/layui.js')}}" charset="utf-8"></script>
<!--[if lt IE 9]>
      <script src="{{asset('js/html5.min.js')}}"></script>
      <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->
    <script>
        // 添加判断iframe是否处于login页,如果是的话,就让父级跳转到login页
        if (window.parent.location.pathname === '/' && window.location.href === '{{route('login')}}') {
            window.parent.location.href = '{{route('login')}}';
        }
    </script>
    <style>
        #login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -223px;
            margin-top: -210px;
            min-height: 390px;
            min-width: 445px;
        }
    </style>
</head>
<body class="login-bg" style="background: #20262e;">
<canvas class="background"></canvas>
<div id="login-form" class="login layui-anim layui-anim-up">
    <div class="message">管理员登录</div>
    <div id="darkbannerwrap"></div>
    <form class="layui-form">
{{--        {{csrf_field()}}--}}
        <input name="uid" placeholder="用户名" type="text" lay-verify="required" class="layui-input">
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码" type="password" class="layui-input">
        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20">
    </form>
</div>

<script src="{{ asset('js/csrf.js') }}"></script>
<script src="{{ asset('js/particles.min.js') }}"></script>
<script>
    window.onload = function () {
        Particles.init({
            selector: '.background',
            color: '#ffffff',
            maxParticles: 80,
            connectParticles: true,
            responsive: [
                {
                    breakpoint: 768,
                    options: {
                        maxParticles: 80
                    }
                }, {
                    breakpoint: 375,
                    options: {
                        maxParticles: 50
                    }
                }
            ]
        });
    };
    layui.use('form', function () {
        var form = layui.form;
        var $ = layui.$;
        // layer.msg('玩命卖萌中', function(){
        //   //关闭后的操作
        //   });
        //监听提交
        form.on('submit(login)', function (data) {
            $.post("{{ route('login.store') }}", data.field, function (res) {
                if (res.status === 'success') {
                    layer.alert(res.msg, {icon: 6}, function () {
                        window.location.href = "/";
                    })
                } else {
                    layer.msg(res.msg, {icon: 5, time: 1000});
                }
            });
            return false;
        });
    });
</script>
<!-- 底部结束 -->
</body>
</html>
