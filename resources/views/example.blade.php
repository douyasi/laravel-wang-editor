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
