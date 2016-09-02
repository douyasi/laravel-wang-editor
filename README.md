# wangEditor for Laravel

>  `wangEditor` 基于javascript和css开发的 Web富文本编辑器， 轻量、简洁、易用、开源免费。官方网站：http://www.wangeditor.com/ 。

## 兼容版本

本扩展包经过测试，适配 `Laravel 5.1` 以上稳定版本（`5.0` 版本理论上也是可行的，但未经测试）。

>   特别说明：
>   `composer` 分析某些依赖时可能会出现问题：比如在 `Laravel 5.2` 主项目中，安装本扩展包，可能会装上 `5.3` 版本的 `illuminate/support` 与 `illuminate/contracts` 相关依赖包，这样可能会造成 `5.2` 主项目出现错误。为此，本包在 `composer.json` 特别移除对 `"illuminate/support": "~5.1"` 的依赖。

## 安装与配置

在 `composer.json` 新增 `"douyasi/laravel-wang-editor": "dev-master"` 依赖，然后执行： `composer update` 操作。

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

![](http://douyasi.com/usr/uploads/2016/09/2381793435.gif)

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

  <textarea class="form-control we-container" name="content" id="wangeditor" style="display:none;" cols="5">
<h1>wangEditor for Laravel</h1>
<p>wangEditor example</p>
  </textarea>

{!! we_js() !!}
{!! we_config('wangeditor') !!}
</body>
</html>
```

