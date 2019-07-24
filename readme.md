## 项目概述

* 产品名称：LaraBLog
* 项目代号：larablog
* 官方地址：https://www.larahsx.com
* 后台地址：https://www.larahsx.com/admin (用户名:guest 密码:guest)
* GitHub 地址:https://github.com/ishushx/LaraBlog

LaraBlog 是一个简洁的博客应用，使用 Laravel5.8 编写而成。

![](http://qiniu.larahsx.com/01D86869-EF0C-42E1-B6E0-2F9700E372F0.png)

![](http://qiniu.larahsx.com/20190724112029.png)

## 功能如下

#### 前台
- 首页文章展示 —— 使用 with 方法进行关联模型预加载，避免N+1问题；
- 分类详情页 —— 分类数据从缓存中读取，使用视图合成器 viewComposer 传递数据；
- 标签详情页 —— 标签模型与文章模型多对多关联；
- 评论发表删除 —— 使用 ReplyRequest 进行表单验证,ReplyObserver 进行回复数量字段更新.删除时,使用 email 字段作为授权认证方法,通过 axios.delete 方法调用删除接口 
- 搜索页 —— 基于 Laravel Scout 全文搜索的 Algolia 驱动；
- 热门文章 —— 后台使用定时任务加权算出得分存入缓存中；
- 配置化 —— 网站可变处使用 congfig 函数配置化

#### 后台
- 后台使用 laravel-admin 1.7.3 版本
- 文章,评论,分类,标签 crud
- 文章发布时,对应的 Obersver 推送 TranslateSlug 队列任务
- 队列任务管理 —— 使用 admin 中间件, laravel-admin 的RBAC权限控制接管 Horizon 访问权限；
- 自定义 Artisan 命令行 —— 自定义热门文章计算命令；
- 自定义 Trait —— 热门文章的业务逻辑实现；
- laravel-visits —— 记录文章的浏览数目；
- XSS,CSRF 安全防御；

## 运行环境要求

- Nginx 1.8+
- PHP 7.0+
- Mysql 5.7+
- Redis 3.0+

## 开发环境部署/安装

本项目代码使用 PHP 框架 [Laravel 5.8](https://learnku.com/docs/laravel/5.8/) 开发，本地开发环境使用 [Laravel Homestead](https://learnku.com/docs/laravel/5.8/homestead)。

下文将在假定读者已经安装好了 Homestead 的情况下进行说明。如果您还未安装 Homestead，可以参照 [Homestead 安装与设置](https://learnku.com/docs/laravel/5.8/homestead#installation-and-setup) 进行安装配置。

### 基础安装

#### 1. 克隆源代码

克隆 `larabbs` 源代码到本地：

    > git clone https://github.com/ishushx/LaraBlog.git

#### 2. 配置本地的 Homestead 环境

1). 运行以下命令编辑 Homestead.yaml 文件：

```shell
homestead edit
```

2). 加入对应修改，如下所示：

```
folders:
    - map: ~/my-path/larablog/ # 你本地的项目目录地址
      to: /home/vagrant/larablog

sites:
    - map: larablog.test
      to: /home/vagrant/larablog/public

databases:
    - larablog
```

3). 应用修改

修改完成后保存，然后执行以下命令应用配置信息修改：

```shell
homestead provision
```

随后请运行 `homestead reload` 进行重启。

#### 3. 安装扩展包依赖

	composer install

#### 4. 生成配置文件

```
cp .env.example .env
```

你可以根据情况修改 `.env` 文件里的内容，如数据库连接、缓存、邮件设置等：

```
APP_URL=http://larablog.test
...
DB_HOST=localhost
DB_DATABASE=larablog
DB_USERNAME=homestead
DB_PASSWORD=secret

DOMAIN=.larablog.test
```

#### 5. 生成数据表及生成测试数据

在 Homestead 的网站根目录下运行以下命令

```shell
$ php artisan migrate
$ mysql larablog < database/admin.sql
```

初始的用户角色权限已使用数据生成。

#### 7. 生成秘钥

```shell
php artisan key:generate
```

#### 8. 配置 hosts 文件

    echo "192.168.10.10   larablog.test" | sudo tee -a /etc/hosts

### 前端框架安装

1). 安装 node.js

直接去官网 [https://nodejs.org/en/](https://nodejs.org/en/) 下载安装最新版本。

2). 安装 Yarn

请安装最新版本的 Yarn —— http://yarnpkg.cn/zh-Hans/docs/install

3). 安装 Laravel Mix

```shell
yarn install
```

4). 编译前端内容

```shell
// 运行所有 Mix 任务...
yarn run dev

// 运行所有 Mix 任务并缩小输出..
yarn run production
```

5). 监控修改并自动编译

```shell
yarn run watch

// 在某些环境中，当文件更改时，Webpack 不会更新。如果系统出现这种情况，请考虑使用 watch-poll 命令：

yarn run watch-poll
```

### 链接入口

* 首页地址：http://larablog.test/
* 管理后台：http://larablog.test/admin

管理员账号密码如下:

```
username: admin
password: admin
```

至此, 安装完成 ^_^。

## 扩展包使用情况

 |扩展包 | 一句话描述 | 本项目应用场景 |
 | --- | --- | --- |
 |[guzzlehttp/guzzle](https://github.com/guzzle/guzzle) | HTTP 请求套件 | 请求百度翻译 API  |
 |[predis/predis](https://github.com/nrk/predis.git) | Redis 官方首推的 PHP 客户端开发包 | 缓存驱动 Redis 基础扩展包 |
 |[hieu-le/active](https://github.com/letrunghieu/active) | 选中状态 | 顶部导航栏选中状态 |
 |[laravel/horizon](https://github.com/laravel/horizon) | 队列监控 | 队列监控命令与页面控制台 admin/horizon || 
 |[awssat/laravel-visits](https://github.com/awssat/laravel-visits) | 页面统计 | 基于 Redis 有序集合记录文章浏览次数|
 |[laravel/scount](https://github.com/laravel/scount) | 全文搜索 | laravel 官方推荐的搜索包|
 |[algolia/algoliasearch-client-php](https://github.com/algolia/algoliasearch-client-php) | algolia 搜索 | 搜索引擎|
 |[encore/laravel-admin](https://github.com/encore/laravel-admin) |管理后台| laravel-admin管理后台|


## 自定义 Artisan 命令

| 命令行名字 | 说明 | Cron | 代码调用 |
| --- | --- | --- | --- |
| `blog:calculate-hot-posts` |  生成热门文章 | 一小时运行一次 | 无 |

## 队列清单

| 名称 | 说明 | 调用时机 |
| --- | --- | --- |
| TranslateSlug.php | 将文章标题翻译为 Slug | PostObserver 事件 saved() |
