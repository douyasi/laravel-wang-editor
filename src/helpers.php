<?php

/**
 * wangEditor css 相关依赖
 * 
 * @return string
 */
function we_css()
{

    return '<!--wangEditor css-->
<link rel="stylesheet" type="text/css" href="/vendor/wangEditor/dist/wangEditor.min.css">';

}

/**
 * wangEditor js 相关依赖
 *
 * @param boolean $using_min 是否使用压缩版js，默认true
 * @return string
 */
function we_js($using_min = true)
{

    if ($using_min) {
        return '<script type="text/javascript">
    window.jQuery || document.write(unescape("%3Cscript%20type%3D%22text/javascript%22%20src%3D%22//cdn.bootcss.com/jquery/3.2.1/jquery.min.js%22%3E%3C/script%3E"));
</script>
<!--wangEditor js-->
<script type="text/javascript" src="/vendor/wangEditor/dist/wangEditor.min.js"></script>';
    } else {
        return '<script type="text/javascript">
    window.jQuery || document.write(unescape("%3Cscript%20type%3D%22text/javascript%22%20src%3D%22//cdn.bootcss.com/jquery/3.2.1/jquery.min.js%22%3E%3C/script%3E"));
</script>
<!--wangEditor js-->
<script type="text/javascript" src="/vendor/wangEditor/dist/wangEditor.js"></script>';
    }

}

/**
 * wangEditor 初始化配置js代码
 * 
 * @param  string $editor_id 编辑器 `textarea` 所属id值，默认取 `wangeditor` 字符串
 * @return string
 */
function we_config($editor_id = 'wangeditor')
{
    $uploadImgServer = config('wang-editor.uploadImgServer', '/laravel-wang-editor/upload');
    $pasteFilterStyle = config('wang-editor.pasteFilterStyle', 'false');
    $pasteTextHandle = 'function (content) { return content; }';
    if ($pasteFilterStyle == 'false') {
        $pasteTextHandle = config('wang-editor.pasteTextHandle', 'function (content) { return content; }');
    }
    $token = csrf_token();
    $showLinkImg = config('wang-editor.showLinkImg', 'false');
    $uploadImgShowBase64 = config('wang-editor.uploadImgShowBase64', 'false');
    $uploadImgMaxSize = config('wang-editor.uploadImgMaxSize', 5*1024*1024);
    $uploadImgMaxLength = config('wang-editor.uploadImgMaxLength', 5);
    $we_script = <<<EOT
<!--wangEditor config-->
<script type="text/javascript">
var E = window.wangEditor;
var _{$editor_id} = new E('#{$editor_id}');
_{$editor_id}.customConfig.debug = location.href.indexOf('wangeditor_debug_mode=1') > 0;  // 开启 debug 模式
_{$editor_id}.customConfig.zIndex = 1000;  // z_index 设置
var _{$editor_id}_text = $('#{$editor_id}_text');


_{$editor_id}.customConfig.onchange = function (html) {
    // 监控变化，同步更新到 textarea
    _{$editor_id}_text.val(html);
};
// 关闭粘贴样式的过滤
var _pasteFilterStyle = {$pasteFilterStyle};
_{$editor_id}.customConfig.pasteFilterStyle = _pasteFilterStyle;
if (_pasteFilterStyle == false) {
    // 自定义处理粘贴的文本内容
    _{$editor_id}.customConfig.pasteTextHandle = {$pasteTextHandle};
}

var _showLinkImg = {$showLinkImg};
var _uploadImgShowBase64 = {$uploadImgShowBase64}
if (_showLinkImg == false) {
    // 隐藏 "网络图片" tab
    _{$editor_id}.customConfig.showLinkImg = false;
}

if (_uploadImgShowBase64 == false) {
    _{$editor_id}.customConfig.uploadImgServer = "{$uploadImgServer}";
    var _token = "{$token}";
    if (_token != '') {
        _{$editor_id}.customConfig.uploadImgParams = {
            _token : _token
        };
    }

    _{$editor_id}.customConfig.uploadFileName = "wang-editor-image-file[]";
    _{$editor_id}.customConfig.uploadImgMaxSize = {$uploadImgMaxSize};
    _{$editor_id}.customConfig.uploadImgMaxLength = {$uploadImgMaxLength};
    // _{$editor_id}.customConfig.uploadImgParamsWithUrl = true;
    _{$editor_id}.customConfig.customAlert = function (info) {
        alert('上传图片失败， 原因为 ' + info);
    };
} else {
    _{$editor_id}.customConfig.uploadImgShowBase64 = true;
}



_{$editor_id}.create();

// 初始化 textarea 的值
_{$editor_id}_text.val(_{$editor_id}.txt.html());
</script>
EOT;

    return $we_script;

}

/**
 * wangEditor 表单字段快捷生成
 * 
 * @param  string $editor_id 编辑器 `textarea` 所属id值，默认取 `wangeditor` 字符串
 * @param  string $field_name 编辑器 `textarea` name 属性值，默认取 `content` 字符串
 * @param  string $default 编辑器默认正文内容
 * @return string
 */
function we_field($editor_id = 'wangeditor', $field_name = 'content', $default = '')
{
    $html = <<<EOT
<div id="{$editor_id}">
    {$default}
</div>
<textarea class="form-control" name="{$field_name}" id="{$editor_id}_text" style="display:none;height:400px;" cols="5">
</textarea>
EOT;
    return $html;
}
