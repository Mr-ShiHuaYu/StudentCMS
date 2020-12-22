<?php

namespace App\Http\Controllers;

class InitController extends Controller
{
    // 获取初始化数据
    public function systemInit()
    {
        $homeInfo = [
            'title' => '首页',
            'href' => route('welcome'),
        ];
        /*        $homeInfo = [
                    'title' => '个人信息',
                    'href'  => route('user.show',auth()->user()->id)
                ];*/
        $logoInfo = [
            'title' => config('app.name'),
            'href' => route('index'),
            'image' => asset('images/logo.png'),
        ];
        $menuInfo = $this->getMenuList();
        $systemInit = [
            'homeInfo' => $homeInfo,
            'logoInfo' => $logoInfo,
            'menuInfo' => $menuInfo,
        ];

        return response()->json($systemInit);
    }

    // 获取菜单列表
    private function getMenuList()
    {
        // 获取登录用户的菜单列表
        $user = auth()->user();
        $stu_roles = $user->roles()->get(); // 获取用户的角色列表
        $menuList = collect(); // 创建一个空菜单集合
        foreach ($stu_roles as $srole) {
            $menuList = $menuList->merge(
                $srole->menus()
                    ->where('status', 1)
                    ->orderBy('sort', 'desc')
                    ->orderBy('id', 'asc')
                    ->get(['id', 'pid', 'title', 'icon', 'href', 'target'])
            );
        }
        $menuList = $this->changeRoute($menuList);
        $menuList = $this->buildMenuChild(0, $menuList);

        return $menuList;
    }

    //递归获取子菜单
    private function buildMenuChild($pid, $menuList)
    {
        $treeList = [];
        foreach ($menuList as $v) {
            if ($pid == $v->pid) {
//                $node = (array)$v;
                $node = $v->toArray(); // 就修改了这里
                $child = $this->buildMenuChild($v->id, $menuList);
                if ( ! empty($child)) {
                    $node['child'] = $child;
                }
                // todo 后续此处加上用户的权限判断
                $treeList[] = $node;
            }
        }

        return $treeList;
    }

    // 自己新增的修改数据库路由的方法
    public function changeRoute($menuList)
    {
        foreach ($menuList as $v) {
            if ( ! empty($v->href)) {
                $v->href = route($v->href);
            }
        }

        return $menuList;
    }

    // 缓存清理接口
    public function clear()
    {
        \Cache::flush();

        return response()->json(
            [
                "code" => 1,
                "msg" => "服务端清理缓存成功",
            ]
        );
    }
}
