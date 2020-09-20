<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="会员管理">&#xe6b8;</i>
                    <cite>用户管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('学生列表','{{route('user.index')}}',true)">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>学生列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('老师列表','{{route('teacher.index')}}',true)">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>老师列表</cite></a>
                    </li>
                </ul>
            </li>
            <li>
                <a onclick="xadmin.add_tab('课程列表','{{route('course.index')}}',true)">
                    <i class="iconfont left-nav-li" lay-tips="课程列表">&#xe6a2;</i>
                    <cite>课程列表</cite>
                </a>
            </li>
            <li>
                <a onclick="xadmin.add_tab('考试列表','{{route('exam.index')}}',true)">
                    <i class="iconfont left-nav-li" lay-tips="考试列表">&#xe6b5;</i>
                    <cite>考试列表</cite>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="成绩管理">&#xe6ae;</i>
                    <cite>成绩管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('成绩录入','{{route('score.create')}}',true)">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>成绩录入</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('成绩查询','{{route('score.index')}}',true)">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>成绩查询</cite></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="layui-icon left-nav-li layui-icon-chart-screen" lay-tips="成绩分析"></i>
                    <cite>成绩分析</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    @can('isAdmin')
                        <li>
                            <a onclick="xadmin.add_tab('总体分析','{{route('analyze.index')}}',true)">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>总体分析</cite></a>
                        </li>
                    @endcan
                    <li>
                        <a onclick="xadmin.add_tab('个人分析','{{route('analyze.gerenfx')}}',true)">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>个人分析</cite></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
