<div class="container">
    <div class="logo">
        <a href="{{ route('index') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i>{{ config('app.name') }}</a></div>
    <div class="left_open">
        <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
    </div>
    <ul class="layui-nav left fast-add" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;">
                <i class="left-nav-li fa fa-user-circle-o" lay-tips="会员管理"></i>
                用户管理</a>
            <dl class="layui-nav-child">
                <dd>
                    <a onclick="xadmin.add_tab('学生列表','{{route('user.index')}}',true)">
                        学生列表</a>
                </dd>
                <dd>
                    <a onclick="xadmin.add_tab('老师列表','{{route('teacher.index')}}',true)">
                        老师列表</a>
                </dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">
                <i class="left-nav-li fa fa-book" lay-tips="成绩管理"></i>
                <cite>成绩管理</cite></a>
            <dl class="layui-nav-child">
                <dd>
                    <a onclick="xadmin.add_tab('成绩录入','{{route('score.create')}}',true)">
                        成绩录入</a>
                </dd>
                <dd>
                    <a onclick="xadmin.add_tab('成绩查询','{{route('score.index')}}',true)">
                        成绩查询</a>
                </dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">
                <i class="left-nav-li fa fa-line-chart" lay-tips="成绩分析"></i>
                <cite>成绩分析</cite></a>
            <dl class="layui-nav-child">
                @can('isAdmin')
                    <dd>
                        <a onclick="xadmin.add_tab('总体分析','{{route('analyze.index')}}',true)">
                            总体分析</a>
                    </dd>
                @endcan
                <dd>
                    <a onclick="xadmin.add_tab('个人分析','{{route('analyze.gerenfx')}}',true)">个人分析</a>
                </dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a onclick="xadmin.add_tab('课程列表','{{route('course.index')}}',true)">
                <i class="fa fa-list-ol" lay-tips="课程列表"></i>
                <cite>课程列表</cite>
            </a>
        </li>
        <li class="layui-nav-item">
            <a onclick="xadmin.add_tab('考试列表','{{route('exam.index')}}',true)">
                <i class="fa fa-etsy" lay-tips="考试列表"></i>
                <cite>考试列表</cite>
            </a>
        </li>
    </ul>
    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;">{{ auth()->user()->name }}</a>
            <dl class="layui-nav-child">
                <!-- 二级菜单 -->
                <dd>
                    <a onclick="xadmin.add_tab('个人信息','{{route('user.show',auth()->user()->id)}}')">个人信息</a></dd>
                <dd>
                <dd>
                    <a onclick="xadmin.open('修改密码','{{route('repwd')}}',700, 400)">修改密码</a></dd>
                <dd>
                    <a href="{{route('logout')}}">退出</a>
                </dd>
            </dl>
        </li>
    </ul>
</div>
