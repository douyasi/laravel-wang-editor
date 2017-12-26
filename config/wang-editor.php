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
    }',  // 粘贴内容自定义回调函数

    /**
     * 下面两个配置，使用其中一个即可显示 “上传图片” 的tab。但是两者不要同时使用！！！
     *
     * 参考：https://www.kancloud.cn/wangfupeng/wangeditor3/335780
     */
    'uploadImgShowBase64' => 'true',  // true - 使用 base64 编码图片；当为 false 时会使用下面服务器上传图片
    'uploadImgServer' => '/laravel-wang-editor/upload',  // 上传图片的服务器端接口地址

    /**
     * 前端限制上传的图片大小，默认5MB = 5*1024*1024 
     *
     * 如果使用本扩展包上传服务，后台也是限制 5MB ，某些条件下上传成功与否还受 php.ini 相关配置限制， 如 upload_max_filesize ， post_max_size 等配置
     */
    'uploadImgMaxSize' => 5*1024*1024,

    /**
     * 限制一次最多能传几张图片
     * 
     */
    'uploadImgMaxLength' => 5,

    /**
     * 是否使用本扩展包提供的本地图片上传组件服务
     */
    'usingLocalPackageUploadServer' => true,  // true - 使用本扩展包提供的本地图片上传组件服务，请保持 'uploadImgServer' => '/laravel-wang-editor/upload' 为默认值

    /**
     * 隐藏 “网络图片” tab
     *
     * 参考：https://www.kancloud.cn/wangfupeng/wangeditor3/335780
     */
    'showLinkImg' => 'false',  // false - 隐藏 “网络图片” tab

];
