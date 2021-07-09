<?php
declare (strict_types = 1);

namespace app\middleware;

use app\controller\LoginController;

class CheckLogin
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        return LoginController::isLogin() ? $next($request) : redirect($request->root().'/login/index');
    }
}
