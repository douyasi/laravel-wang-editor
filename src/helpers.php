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
<link rel="stylesheet" type="text/css" href="/vendor/wangEditor/static/highlightjs/github.css">
<style>
        .we-container {
            width: 100%;
            height: 400px;
            margin: 0 auto;
            position: relative;
        }
</style>

';

}

/**
 * wangEditor js 相关依赖
 * 实际上，editor.md 某些功能组件（如`flowChart`）置 false，可减少对应的js依赖，但为了安全起见还是将所有可能的js依赖列出。
 * 
 * @return string
 */
function we_js($using_min = true)
{

    if ($using_min) {
        return '<!--editor.md js-->
<script type="text/javascript">
    window.jQuery || document.write(unescape("%3Cscript%20type%3D%22text/javascript%22%20src%3D%22//cdn.bootcss.com/jquery/2.2.4/jquery.min.js%22%3E%3C/script%3E"));
</script>
<script type="text/javascript" src="/vendor/wangEditor/dist/js/wangEditor.min.js"></script>';
    } else {
        return '<!--editor.md js-->
<script type="text/javascript">
    window.jQuery || document.write(unescape("%3Cscript%20type%3D%22text/javascript%22%20src%3D%22//cdn.bootcss.com/jquery/2.2.4/jquery.min.js%22%3E%3C/script%3E"));
</script>
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
    'img',
    'video',
    // 'location',
    'insertcode',
    '|',
    'undo',
    'redo',
    'fullscreen'
];
wangEditor.config.printLog = {$printLog};
var _{$editor_id} = new wangEditor('{$editor_id}');
_{$editor_id}.config.uploadImgUrl = "{$uploadImgUrl}";
_{$editor_id}.config.uploadParams = {
        token : '{$token}'
};
_{$editor_id}.config.mapAk = '{$mapAk}';
_{$editor_id}.config.zindex = {$z_index};
var _pasteFilter = {$pasteFilter};
_{$editor_id}.config.pasteFilter = _pasteFilter;
if (_pasteFilter == true) {
    _{$editor_id}.config.pasteText = {$pasteText};
}
_{$editor_id}.config.uploadImgFileName = 'wang-editor-image-file';
_{$editor_id}.config.emotions = {
        'default': {
            title: '默认',
            data: '/vendor/wangEditor/emotions.data'
        },
        'weibo': {
            title: '微博表情',
            data: [
                {
                    icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/7a/shenshou_thumb.gif',
                    value: '[草泥马]'    
                },
                {
                    icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/60/horse2_thumb.gif',
                    value: '[神马]'    
                },
                {
                    icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/bc/fuyun_thumb.gif',
                    value: '[浮云]'    
                },
                {
                    icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c9/geili_thumb.gif',
                    value: '[给力]'    
                },
                {
                    icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/f2/wg_thumb.gif',
                    value: '[围观]'    
                },
                {
                    icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/70/vw_thumb.gif',
                    value: '[威武]'
                },
                {
                    icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/6e/panda_thumb.gif',
                    value: '[熊猫]'
                },
                {
                    icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/81/rabbit_thumb.gif',
                    value: '[兔子]'
                },
                {
                    icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/bc/otm_thumb.gif',
                    value: '[奥特曼]'
                },
                {
                    icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/15/j_thumb.gif',
                    value: '[囧]'
                },
                {
                    icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/89/hufen_thumb.gif',
                    value: '[互粉]'
                },
                {
                    icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c4/liwu_thumb.gif',
                    value: '[礼物]'
                },
                {
                    icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/ac/smilea_thumb.gif',
                    value: '[呵呵]'
                },
                {
                    icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/0b/tootha_thumb.gif',
                    value: '[哈哈]'
                }
            ]
        }
    };
_{$editor_id}.create();
</script>
EOT;

return $we_script;

}
