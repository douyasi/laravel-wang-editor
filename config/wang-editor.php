<?php

/**
 * wangEditor 配置选项，请查阅官网：http://www.wangeditor.com/ 了解具体设置项
 * 这里只列出一些比较重要的可配置项
 */
return [

    /**
     * 粘贴文本，这里可选字符串的 `true` 或 `false` 
     *
     * 参考：https://www.kancloud.cn/wangfupeng/wangeditor3/448202
     */
    'pasteFilterStyle' => 'false',  // false - 关闭掉粘贴样式的过滤
    'pasteTextpasteTextHandle' => 'function (content) {
        // content 即粘贴过来的内容（html 或 纯文本），可进行自定义处理然后返回
        return content;
    }',

    /**
     * 下面两个配置，使用其中一个即可显示 “上传图片” 的tab。但是两者不要同时使用！！！
     *
     * 参考：https://www.kancloud.cn/wangfupeng/wangeditor3/335780
     */
    'uploadImgShowBase64' => 'true',
    'uploadImgServer' => '/laravel-wang-editor/upload',

    /**
     * 隐藏 “网络图片” tab
     *
     * 参考：https://www.kancloud.cn/wangfupeng/wangeditor3/335780
     */
    'showLinkImg' => 'false',  // false - 隐藏 “网络图片” tab

];
