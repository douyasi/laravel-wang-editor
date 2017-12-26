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
