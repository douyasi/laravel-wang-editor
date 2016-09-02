<?php

/**
 * wangEditor 配置选项，请查阅官网：http://www.wangeditor.com/ 了解具体设置项
 * 这里只列出一些比较重要的可配置项
 */
return [

    /*
     是否关闭浏览器打印log，这里可选字符串的 `true` 或 `false` ，参考：http://www.kancloud.cn/wangfupeng/wangeditor2/113982 
     */
    'printLog' => 'true',

    /*
    上传文件接口，详细介绍：http://www.kancloud.cn/wangfupeng/wangeditor2/113990
    本插件已提供相关Laravel接口，保持默认值即可直接使用
    */
    'uploadImgUrl' => '/laravel-wang-editor/upload',

    /*
    可选 icon 或 value ，参考：http://www.kancloud.cn/wangfupeng/wangeditor2/113977
     */
    'emotionsShow' => 'icon',

    /*
     百度地图key，这里是wangEditor插件作者默认的key，参考：http://www.kancloud.cn/wangfupeng/wangeditor2/113979
     */
    'mapAk' => 'TVhjYjq1ICT2qqL5LdS8mwas',

    /*
    是否关闭关闭粘贴过滤样式，这里可选字符串的 `true` 或 `false` ，参考：http://www.kancloud.cn/wangfupeng/wangeditor2/113984
     */
    'pasteFilter' => 'false',

    /*
    是否只粘贴纯文本，前提你开启着粘贴样式过滤，即 `pasteFilter` 为 `true` ，这里可选字符串的 `true` 或 `false` ，参考：http://www.kancloud.cn/wangfupeng/wangeditor2/156691
     */
    'pasteText' => 'false',

];
