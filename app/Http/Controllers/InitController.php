<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;

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

    // 获取菜用户的菜单列表,如果在role_menu中有的菜单,说明需要老师或管理员才能访问
    private function getMenuList()
    {
        $user = auth()->user();
        $stu_roles = $user->roles()->get(); // 获取用户的角色列表
        $specialMenu = \DB::table('role_menu')->pluck('menu_id')->toArray();
        $menuList = MenuModel::query()
            ->where('status', 1)
            ->whereNotIn('id',$specialMenu)
            ->get();

        foreach ($stu_roles as $srole) {
            $menuList = $menuList->merge(
                $srole->menus()->where('status', 1)->get()
            );
        }
        $menuList = $menuList->sortByDesc('sort');
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

    // 自己新增的修改数据库路由的方法,将数据表system_menu表中的href字段user.index改为相应的路由
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
        \Artisan::call('optimize:clear');
        // 手动清理权限缓存
        \Artisan::call('cache:forget spatie.permission.cache');

        return response()->json(
            [
                "code" => 1,
                "msg" => "服务端清理缓存成功",
            ]
        );
    }
}
