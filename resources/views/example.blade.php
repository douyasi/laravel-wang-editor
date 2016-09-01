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
