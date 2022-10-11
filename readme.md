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
已解散

### 配套毕业论文
请联系作者获取（有偿），备注：毕业论文

QQ: 974988176

WX: lg974988176


### 图片演示

![个人分析](https://github.com/974988176/StudentCMS/blob/master/screenshots/%E4%B8%AA%E4%BA%BA%E5%88%86%E6%9E%90.jpg?raw=true)


![学生列表](https://github.com/974988176/StudentCMS/blob/master/screenshots/%E5%AD%A6%E7%94%9F%E5%88%97%E8%A1%A8.jpg?raw=true)


![总体分析](https://github.com/974988176/StudentCMS/blob/master/screenshots/%E6%80%BB%E4%BD%93%E5%88%86%E6%9E%90.jpg?raw=true)


![成绩查询](https://github.com/974988176/StudentCMS/blob/master/screenshots/%E6%88%90%E7%BB%A9%E6%9F%A5%E8%AF%A2.jpg?raw=true)


![课程分析](https://github.com/974988176/StudentCMS/blob/master/screenshots/%E8%AF%BE%E7%A8%8B%E5%88%86%E6%9E%90.jpg?raw=true)


### 常见问题

- 左侧的菜单在哪里修改?
> 在数据库中的system_menu表中更改,其他pid为他的父级ID
>

- 如何区分一个用户是的角色?权限?
> 登录用户是在users表,user_has_role中用role_id关联表roles,记录了这个用户是管理员/老师/学生.users表中的bind_user_id表示这个用户对应学students/teachers中的表ID,如果这个用户是学生,那么对应students表的ID,否则对应的是teachers表的ID

- 菜单图标怎么修改?
> 可在 [Font Awesome 中文网](http://www.fontawesome.com.cn/faicons/)中找图标,然后,在`system_menu`表中的icon字段修改
>

- 数据库中各个表的作用?

> users表保存可登入网站的用户
>
> students表保存学生
>
> teachers表保存老师
>
> parents表保存学生家长
>
> courses表为课程表
>
> exams表为考试列表
>
> role_menu 表为特殊角色专属菜单表,在表中的,只有身份为老师或管理员才可以显示
>
> roles表,角色表,目前为3种角色
>
> scores表为学生成绩表
>
> system_menu表为系统菜单表
>
> user_has_role: 用户拥有的角色表,标记了当前用户是管理员/老师/学生
>
> 其他表目前无用,以下是无用的表,为一些库自动生成的:
> migrations: 迁移文件记录表,自动记录的,不用管
>
> permissions:保存用户特殊权限表,暂时未用到
>
> role_has_permissions:角色对应的权限表,暂时未用
>
> user_has_permissions: 用户拥有的特殊权限表,暂时未用

