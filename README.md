## 关于 Larawe
Larawe是一个微擎模块开发框架，基于Laravel精简开发。双入口设计，尽量兼容微擎...作者实在太懒，文笔太菜，实在编不出来。至于为什么开发这个框架，那说来就话长了。

## 使用
在微擎的 ` addons ` 目录下执行以下命令
```php
composer create-project --prefer-dist larawe/larawe my_module
```
然后你可以发现，` addons ` 目录下生成了一个名为 ` my_module ` 的模块

```php
cd addons/my_module
```
进来以后你可以发现，跟laravel项目的目录很像嘛(如果你用过laravel的话)，没错，就是抄 laravel 的，我觉得目录这样设计没啥问题，使用方法也跟 laravel 有 99.99% 相似，省的我再写文档了，emmm...

接下来讲重点，有几个地方需要手动设置（为什么不做成自动设置？因为作者懒啊，要赶项目啊）

- `.env` ：填写 `MODULE_NAME` 跟模块名一致，蛇形命名法
- `site.php` 中的类名修改：把 `{Module_name}` 占位符改成模块名，首字母大写，这个是第一个应用入口，也就是从微擎进入的入口
- `site.php` 中 `getMenus` 里面 `'m' => 'module_name'` 把 `'module_name'` 改成你的模块名
- `module.php` 文件同样修改这两处
- 配置 `manifest.xml` 文件，这个是微擎模块的安装信息，具体配置方法请百度或Google
- 看你要不要把 `icon.jpg` 替换掉...佛系...

接下来就可以到微擎管理后台愉快的安装模块了

从微擎进入的路由参数用在URL里增加参数 `r` 来表示，默认为空

例：` http://yourhost/web/index.php?c=site&a=entry&m=module_name&do=index&r=index ` 将匹配到下面这条路由

```php
$router->get('/index', function () {
    return view('welcome');
});
```

等等，不是说有双入口吗？在哪里？

别急，继续往下看

## 双入口

Larawe 的一个入口是模块下的 `site.php` 这个是微擎体系内的入口，另一个入口就是 `public` 目录下的 `index.php` , 这个入口的执行路径是不经过微擎路由的，但有加载微擎的框架，所以微擎的数据库函数，缓存函数等等，大部分的功能还是可以使用的，可以用Nginx绑定一个域名到 `puiblic` 文件夹，就跟部署 laravel 一样，开发api接口的时候可以使用这个入口，省的URL后面接着又臭又长的微擎参数。

## 注意事项

由于精简了laravel框架，有一些特性是使用不了的，如下：

- 使用 `site.php` 入口的话，路由的Restful风格参数绑定无法使用，例如： `/posts/{id}` 将无法使用
- 移除了Facade
- 移除了Queue
- 移除了Eloquent
- 未完...

基本上只保留laravel的基本骨架，容器、路由、中间件、模板、请求、响应还有一些常用的函数，就这些...