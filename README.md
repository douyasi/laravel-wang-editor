# wangEditor for Laravel

>  `wangEditor` 基于javascript和css开发的 Web富文本编辑器， 轻量、简洁、易用、开源免费。官方网站：http://www.wangeditor.com/ 。

[![Latest Stable Version](https://poser.pugx.org/douyasi/laravel-wang-editor/v/stable.svg?format=flat-square)](https://packagist.org/packages/douyasi/laravel-wang-editor)
[![Latest Unstable Version](https://poser.pugx.org/douyasi/laravel-wang-editor/v/unstable.svg?format=flat-square)](https://packagist.org/packages/douyasi/laravel-wang-editor)
[![License](https://poser.pugx.org/douyasi/laravel-wang-editor/license?format=flat-square)](https://packagist.org/packages/douyasi/laravel-wang-editor)
[![Total Downloads](https://poser.pugx.org/douyasi/laravel-wang-editor/downloads?format=flat-square)](https://packagist.org/packages/douyasi/laravel-wang-editor)

## 更新日志

2017-12-26 更新 `wangEditor` 到 `3.0.15` 大版本，发布 `v2.0` 版本，并归档 2016-11-15 旧版本为 `v1.0` 。

主要修改点：

1. 支持多图片文件上传（包含拖曳上传）;
2. 上传的图片使用 其自身文件 `md5` 值作为文件名，以减少当天相同图片重复上传占用存储空间问题。

>   旧版 `wangEditor` （2.x版本）适配包请查阅 [1.0](https://github.com/douyasi/laravel-wang-editor/tree/1.x) 分支说明。

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

![](http://douyasi.com/usr/uploads/2016/09/2381793435.gif?2016-11-15)

编辑器图片默认会上传到 `public/uploads/content` 目录下；编辑器相关功能配置位于 `config/wang-editor.php` 文件中。

## 使用说明

在 `blade` 模版里面使用下面三个方法：`we_css()` 、`we_js()` 和 `we_config()` 。

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>wangEditor example</title>
    {!! we_css() !!}
</head>
<body>
<h2>wangEditor example</h2>

    <div id="wangeditor">
        <p>wangEditor for Laravel</p>
    </div>
    <textarea class="form-control" name="content" id="wangeditor_text" style="display:none;height:400px;" cols="5">
    </textarea>

{!! we_js() !!}
{!! we_config('wangeditor') !!}
</body>
</html>
```

