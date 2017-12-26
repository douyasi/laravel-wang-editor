<?php

namespace Douyasi\WangEditor\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Validator;

class WangEditorController extends Controller
{

    /**
     * 示例页面
     *
     * @return Response
     */
    public function getExample()
    {
        if (config('app.debug', false)) {
            return view('wang-editor::example');
        } else {
            return 'You can see the example page only in DEBUG mode!';
        }
    }

    /**
     * 针对 wangEditor 所写的图片上传控制器
     * 
     * @param  Request $requst
     * @return Response
     */
    public function postUploadPicture(Request $request)
    {
        if (config('wang-editor.usingLocalPackageUploadServer', false)) {
            $res = [
                'errno' => 9999,
                'data' => [
                ],
                'info' => '上传图片失败，原因为：非法传参',
            ];
            if ($request->hasFile('wang-editor-image-file')) {
                //
                $files = $request->file('wang-editor-image-file');
                $maxCount = config('wang-editor.uploadImgMaxLength', 5);
                if (count($files) > $maxCount) {
                    $res = array_replace(['info' => '上传图片失败，原因为：一次性最多可上传 '.$maxCount.' 张图片'], $res);
                } else {
                    $data = $request->all();
                    $rules = [
                        'wang-editor-image-file.*'    => 'mimes:jpeg,png,gif|max:5120',
                    ];
                    $messages = [
                        'wang-editor-image-file.*.required' => '必须传入文件',
                        'wang-editor-image-file.*.mimes'    => '文件类型不允许,请上传常规的图片(jpg、png、gif)文件',
                        'wang-editor-image-file.*.max'      => '文件过大,文件大小不得超出5MB',
                    ];
                    $validator = Validator::make($data, $rules, $messages);
                    if ($validator->passes()) {
                        $_data = [];
                        foreach ($files as $file) {
                            $realPath = $file->getRealPath();
                            $hash = md5_file($realPath);
                            $destPath = 'uploads/content/';
                            $savePath = $destPath.''.date('Ymd', time());
                            is_dir($savePath) || mkdir($savePath);  //如果不存在则创建目录
                            $name = $file->getClientOriginalName();
                            $ext = $file->getClientOriginalExtension();
                            $oFile = $hash.'.'.$ext;
                            $fullfilename = '/'.$savePath.'/'.$oFile;  //原始完整路径
                            if ($file->isValid()) {
                                $uploadSuccess = $file->move($savePath, $oFile);  //移动文件
                                $oFilePath = $savePath.'/'.$oFile;
                                $_data[] = $fullfilename;
                            }
                        }
                        $res = [
                            'errno' => 0,
                            'data' => $_data,
                        ];
                    } else {
                        $res = array_replace(['info' => $validator->messages()->first()], $res);
                    }
                }
            }
            return response()->json($res);
        } else {
            return abort(404);
        }

    }

}
