<div class="container">
    <div class="logo">
        <a href="{{ route('index') }}">{{ config('app.name') }}</a></div>
    <div class="left_open">
        <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
    </div>
    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;">{{ auth()->user()->name }}</a>
            <dl class="layui-nav-child">
                <!-- 二级菜单 -->
                <dd>
                    <a onclick="xadmin.add_tab('个人信息','{{route('user.show',auth()->user()->id)}}')">个人信息</a></dd>
                <dd>
                <dd>
                    <a onclick="xadmin.open('修改密码','{{route('repwd')}}',800)">修改密码</a></dd>
                <dd>
                    <a href="{{route('logout')}}">退出</a>
                </dd>
            </dl>
        </li>
    </ul>
</div>
