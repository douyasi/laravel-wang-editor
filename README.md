# wangEditor for Laravel

>  `wangEditor` 基于javascript和css开发的 Web富文本编辑器， 轻量、简洁、易用、开源免费。官方网站：http://www.wangeditor.com/ 。

[![Latest Stable Version](https://poser.pugx.org/douyasi/laravel-wang-editor/v/stable.svg?format=flat-square)](https://packagist.org/packages/douyasi/laravel-wang-editor)
[![Latest Unstable Version](https://poser.pugx.org/douyasi/laravel-wang-editor/v/unstable.svg?format=flat-square)](https://packagist.org/packages/douyasi/laravel-wang-editor)
[![License](https://poser.pugx.org/douyasi/laravel-wang-editor/license?format=flat-square)](https://packagist.org/packages/douyasi/laravel-wang-editor)
[![Total Downloads](https://poser.pugx.org/douyasi/laravel-wang-editor/downloads?format=flat-square)](https://packagist.org/packages/douyasi/laravel-wang-editor)

## 更新日志

2017-12-26 更新 `wangEditor` 到 `3.0.15` 大版本，发布 `v2.0` 版本，并归档 2016-11-15 旧版本为 `1.x` 。

主要修改点：

1. 支持多图片文件上传（包含拖曳上传）;
2. 上传的图片使用 其自身文件 `md5` 值作为文件名，以减少当天相同图片重复上传占用存储空间问题；
3. `wangEditor` 静态资源目录变更，`config/wang-editor.php` 相关配置项的变更。

>   旧版 `wangEditor` （2.x版本）适配包请查阅 [1.x](https://github.com/douyasi/laravel-wang-editor/tree/1.x) 分支说明。

## 兼容版本

本扩展包经过测试，适配 `Laravel 5.1` 以上稳定版本（`5.0` 版本理论上也是可行的，但未经测试）。

## 安装与配置

在 `composer.json` 新增 `"douyasi/laravel-wang-editor": "~2.0"` 依赖，然后执行： `composer update` 操作。

依赖安装完毕之后，在 `app.php` 中添加：

```php
'providers' => [
        'Douyasi\WangEditor\EditorServiceProvider',
],
```

然后，执行下面 `artisan` 命令，发布该扩展包配置等项。

```bash
php artisan vendor:publish --force
```

现在您可以访问 `/laravel-wang-editor/example` 路由，不出意外，您可以看到扩展包提供的示例页面。

演示视频： http://s1.ystatic.cn/v/9067ff068918189ef850da17acb1d806.mp4

编辑器图片默认会上传到 `public/uploads/content` 目录下；编辑器相关功能配置位于 `config/wang-editor.php` 文件中。

## 使用说明

在 `blade` 模版里面使用下面三个方法：`we_css()` 、`we_js()` 、`we_field()` 和 `we_config()` 。

>   请注意 `we_field()` 与 `we_config()` 第一个参数（对应下面示例中的 `wangeditor` ) 必须保持一致。 

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>wangEditor example</title>
    {!! we_css() !!}
    {!! we_js() !!}
</head>
<body>
<h2>wangEditor example</h2>
{!! we_field('wangeditor', 'content', '<p>wangEditor for Laravel</p>') !!}
{!! we_config('wangeditor') !!}
</body>
</html>
```

