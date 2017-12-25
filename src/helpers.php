<?php

/**
 * wangEditor css 相关依赖
 * 
 * @return string
 */
function we_css()
{

    return '<!--wangEditor css-->
<link rel="stylesheet" type="text/css" href="/vendor/wangEditor/dist/css/wangEditor.min.css">
<link rel="stylesheet" type="text/css" href="/vendor/wangEditor/static/highlightjs/github.css">';

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
        return '<!--wangEditor js-->
<script type="text/javascript" src="/vendor/wangEditor/dist/js/wangEditor.min.js"></script>';
    } else {
        return '<!--wangEditor js-->
<script type="text/javascript" src="/vendor/wangEditor/dist/js/wangEditor.js"></script>';
    }

}

/**
 * wangEditor 初始化配置js代码
 * 
 * @param  string $editor_id 编辑器 `textarea` 所属id值，默认取 `mdeditor` 字符串
 * @param int $z_index 编辑器全屏时z-index值
 * @return string
 */
function we_config($editor_id = 'wangeditor', $z_index = 999999)
{
    $printLog = config('wang-editor.printLog', 'true');
    $uploadImgUrl = config('wang-editor.uploadImgUrl', '/laravel-wang-editor/upload');
    $mapAk = config('wang-editor.mapAk', 'TVhjYjq1ICT2qqL5LdS8mwas');
    $pasteFilter = config('wang-editor.pasteFilter', 'false');
    $pasteText = 'true';
    if ($pasteFilter == 'true') {
        $pasteText = config('wang-editor.pasteText', 'true');
    }
    $token = csrf_token();

    $we_script = <<<EOT
<!--wangEditor config-->
<script type="text/javascript">
var E = window.wangEditor;
// 默认菜单
var menus = [
    'head',  // 标题
    'bold',  // 粗体
    'italic',  // 斜体
    'underline',  // 下划线
    'strikeThrough',  // 删除线
    'foreColor',  // 文字颜色
    'backColor',  // 背景颜色
    'link',  // 插入链接
    'list',  // 列表
    'justify',  // 对齐方式
    'quote',  // 引用
    'emoticon',  // 表情
    'image',  // 插入图片
    'table',  // 表格
    'video',  // 插入视频
    'code',  // 插入代码
    'undo',  // 撤销
    'redo'  // 重复
];
wangEditor.config.printLog = {$printLog};
var _{$editor_id} = new E('#{$editor_id}');
_{$editor_id}.customConfig.menu = menus;
_{$editor_id}.customConfig.debug = 1;  // 开启 debug 模式
_{$editor_id}.customConfig.onchange = function (html) {
    // html 即变化之后的内容
    console.log(html);
};
_{$editor_id}.customConfig.zIndex = 100;  // z_index 设置
_{$editor_id}.customConfig.lang = {
    '设置标题': 'title',
    '正文': 'p',
    '链接文字': 'link text',
    '链接': 'link',
    '上传图片': 'upload image',
    '上传': 'upload',
    '创建': 'init'
    // 还可自定添加更多
};
var _pasteFilter = {$pasteFilter};

// 关闭粘贴样式的过滤
_{$editor_id}.customConfig.pasteFilterStyle = _pasteFilter;
// 自定义处理粘贴的文本内容
_{$editor_id}.customConfig.pasteTextHandle = function (content) {
    // content 即粘贴过来的内容（html 或 纯文本），可进行自定义处理然后返回
    return content + '<p>在粘贴内容后面追加一行</p>';
};
// 插入网络图片回调
_{$editor_id}.customConfig.linkImgCallback = function (url) {
    console.log(url); // url 即插入图片的地址
}
// 插入链接的校验
_{$editor_id}.customConfig.linkCheck = function (text, link) {
    console.log(text); // 插入的文字
    console.log(link); // 插入的链接

    return true; // 返回 true 表示校验成功
    // return '验证失败' // 返回字符串，即校验失败的提示信息
};
// 插入网络图片的校验
_{$editor_id}.customConfig.linkImgCheck = function (src) {
    console.log(src); // 图片的链接
    return true; // 返回 true 表示校验成功
    // return '验证失败' // 返回字符串，即校验失败的提示信息
};
// 配置 onfocus 函数
_{$editor_id}.customConfig.onfocus = function () {
    console.log("onfocus");
};
// 配置 onblur 函数
_{$editor_id}.customConfig.onblur = function (html) {
    // html 即编辑器中的内容
    console.log('onblur', html);
};
// 自定义配置颜色（字体颜色、背景色）
_{$editor_id}.customConfig.colors = [
    '#000000',
    '#eeece0',
    '#1c487f',
    '#4d80bf',
    '#c24f4a',
    '#8baa4a',
    '#7b5ba1',
    '#46acc8',
    '#f9963b',
    '#ffffff'
];
_{$editor_id}.customConfig.uploadImgServer = "{$uploadImgUrl}";
_{$editor_id}.customConfig.uploadImgParams = {
        token : '{$token}'
};

_{$editor_id}.customConfig.uploadImgFileName = 'wang-editor-image-file';

_{$editor_id}.create();
</script>
EOT;

    return $we_script;

}

/**
 * wangEditor 简版配置js代码
 * 移除以下组件：
 * 图片（包含图片上传）、视频（iframe）、位置（百度地图）、插入代码
 * 
 * @param  string $editor_id 编辑器 `textarea` 所属id值，默认取 `mdeditor` 字符串
 * @param int $z_index 编辑器全屏时z-index值
 * @return string
 */
function we_simple_config($editor_id = 'wangeditor', $z_index = 999999)
{
    $printLog = config('wang-editor.printLog', 'true');
    $pasteFilter = config('wang-editor.pasteFilter', 'false');
    $pasteText = 'true';
    if ($pasteFilter == 'true') {
        $pasteText = config('wang-editor.pasteText', 'true');
    }
    $we_script = <<<EOT
<!--wangEditor config-->
<script type="text/javascript">
var menus = [
    'source',
    '|',
    'bold',
    'underline',
    'italic',
    'strikethrough',
    'eraser',
    'forecolor',
    'bgcolor',
    '|',
    'quote',
    'fontfamily',
    'fontsize',
    'head',
    'unorderlist',
    'orderlist',
    'alignleft',
    'aligncenter',
    'alignright',
    '|',
    'link',
    'unlink',
    'table',
    'emotion',
    '|',
    'undo',
    'redo',
    'fullscreen'
];
wangEditor.config.printLog = {$printLog};
var _{$editor_id} = new wangEditor('{$editor_id}');
_{$editor_id}.config.menus = menus;
_{$editor_id}.config.zindex = {$z_index};
var _pasteFilter = {$pasteFilter};
_{$editor_id}.config.pasteFilter = _pasteFilter;
if (_pasteFilter == true) {
    _{$editor_id}.config.pasteText = {$pasteText};
}
_{$editor_id}.config.emotions = {
        'default': {
            title: '默认',
            data: '/vendor/wangEditor/emotions.data'
        }
    };
_{$editor_id}.create();
</script>
EOT;

    return $we_script;

}