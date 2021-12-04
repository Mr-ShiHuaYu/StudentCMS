## 学生管理系统
### 部署方法

- 下载代码 -- github(国内用户不推荐)
```
git clone https://github.com/974988176/StudentCMS.git
```


- 下载代码 -- gitee(国内用户推荐)
```
git clone https://gitee.com/vip_huage/StudentCMS.git
```

> 如果没有composer的用户,请按说明安装[安装composer](https://www.php.cn/tool/composer/427612.html)

- 添加Composer到环境变量
- 添加php到环境变量

> 添加环境变量教程 [添加环境变量](https://jingyan.baidu.com/article/47a29f24610740c0142399ea.html)

- 进入项目目录
```cmd
cd StudentCMS
```

- 安装依赖包
```
composer install
```


- 创建数据库`stucms`.在.env文件中`DB_DATABASE`选项中可更改

- 更改.env里面`DB_USERNAME`,`DB_PASSWORD`等数据库配置

- 执行命令
```cmd
php artisan stucms:run
```


### 演示站点
http://stu.yushihua.vip

- 管理员账号:admin/admin
- 学生账号:test/test

>
> B站部署视频教程:
>
> https://www.bilibili.com/video/BV1Wv411r7nT
>

### [B站系列视频教程](https://space.bilibili.com/260594621/video)

### 项目介绍
基于php Laravel和layui开发的学生管理系统

### 技术栈
- Laravel
- layui
- layuimini

### 交流群
745821153

### 图片演示

![](https://cdn.jsdelivr.net/gh/974988176/PicsBed/2020/20210403003928.png)


![](https://cdn.jsdelivr.net/gh/974988176/PicsBed/2020/20210403003833.png)


![](https://cdn.jsdelivr.net/gh/974988176/PicsBed/2020/20210403003710.png)


![](https://cdn.jsdelivr.net/gh/974988176/PicsBed/2020/20210403003750.png)

### 常见问题

- 左侧的菜单在哪里修改?
> 在数据库中的system_menu表中更改,其他pid为他的父级ID
>

- 如何区分一个用户是的角色?权限?
> 登录用户是在users表,user_has_role中用role_id关联表roles,记录了这个用户是管理员/老师/学生,且foreign_id表示这个用户对应学students/teachers中的表ID,如果这个用户是学生,那么对应students表的ID,否则对应的是teachers表的ID

