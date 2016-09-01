<?php

namespace Douyasi\WangEditor\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Validator;

class WangEditorController extends Controller
{

    /**
     * 针对editor.md所写的图片上传控制器
     * 
     * @param  Request $requst
     * @return Response
     */
    public function postUploadPicture(Request $request)
    {
        if ($request->hasFile('wang-editor-image-file')) {
            //
            $file = $request->file('wang-editor-image-file');
            $data = $request->all();
            $rules = [
                'wang-editor-image-file'    => 'max:5120',
            ];
            $messages = [
                'wang-editor-image-file.max'    => '文件过大,文件大小不得超出5MB',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->passes()) {
                $realPath = $file->getRealPath();
                $destPath = 'uploads/content/';
                $savePath = $destPath.''.date('Ymd', time());
                is_dir($savePath) || mkdir($savePath);  //如果不存在则创建目录
                $name = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();

                $check_ext = in_array($ext, ['gif', 'jpg', 'png'], true);

                if ($check_ext) {
                    $uniqid = uniqid().'_'.date('s');
                    $oFile = $uniqid.'o.'.$ext;
                    $fullfilename = '/'.$savePath.'/'.$oFile;  //原始完整路径
                    if ($file->isValid()) {
                        $uploadSuccess = $file->move($savePath, $oFile);  //移动文件
                        $oFilePath = $savePath.'/'.$oFile;
                        $res = $fullfilename;
                    } else {
                        $res = 'error|失败原因为：文件校验失败';
                    }
                } else {
                    $res = 'error|失败原因为：文件类型不允许,请上传常规的图片（gif|jpg|png）文件';
                }
            } else {
                $res = 'error|'.$validator->messages()->first();
            }
        }
        return $res;
    }

}
