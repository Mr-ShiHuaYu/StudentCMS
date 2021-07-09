<?php

declare (strict_types=1);

namespace app\controller;

use think\facade\Db;

class InitController
{
    protected $middleware = ['auth'];
    // 获取初始化数据
    public function index()
    {
        $homeInfo = [
            'title' => '首页',
            'href' => url('/index/welcome')->build(),
        ];
        $logoInfo = [
            'title' => config('app.name'),
            'href' => url('/index')->build(),
            'image' => asset('static/images/logo.png'),
        ];
        $menuInfo = $this->getMenuList();
        $systemInit = [
            'homeInfo' => $homeInfo,
            'logoInfo' => $logoInfo,
            'menuInfo' => $menuInfo,
        ];

        return json($systemInit);
    }

    // 获取菜单列表
    private function getMenuList()
    {
        $menuList = Db::table('system_menu')
            ->where('status', 1)
            ->order('sort', 'desc')
            ->order('id', 'asc')
            ->field(['id', 'pid', 'title', 'icon', 'href', 'target'])
            ->select();
        $menuList = $this->changeRoute($menuList);
        $menuList = $this->buildMenuChild(0, $menuList);

        return $menuList;
    }

    //递归获取子菜单
    private function buildMenuChild($pid, &$menuList)
    {
        $treeList = [];
        foreach ($menuList as $v) {
            if ($pid == $v['pid']) {
                $node = $v;
                $child = $this->buildMenuChild($v['id'], $menuList);
                if ( ! empty($child)) {
                    $node['child'] = $child;
                }
                $treeList[] = $node;
            }
        }

        return $treeList;
    }

    // 自己新增的修改数据库路由的方法
    public function changeRoute($menuList)
    {

        foreach ($menuList as $k => &$v) {
            if (($v['href'])) {
                $v['href'] = url($v['href'])->build();
                $menuList[$k] = $v;
            }
        }
        return $menuList;
    }

    // 缓存清理接口
    public function clear()
    {
        // todo
        return json(
            [
                "code" => 1,
                "msg" => "服务端清理缓存成功",
            ]
        );
    }

}
