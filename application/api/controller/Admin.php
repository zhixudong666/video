<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use app\api\model\Video as VideoModel;
class Admin extends Controller
{
  //视频上传接口
  public function upload(Request $request)
  {
    $video = new VideoModel;
    // 获取表单上传文件
    $file = $request->file('file');
    if ($file) {
      $name = $request->param('title');
      $desc = $request->param('desc');
      $type = $request->param('type');
      //保存在uploads文件内
      $info = $file->validate(['ext' => 'mp4'])->move($_SERVER['DOCUMENT_ROOT'] . '/uploads');
      if ($info) {
        //getSaveName()获取上传文件所在的目录
        $src = "/uploads/" . $info->getSaveName();
        $res = $video->save([
          'src' => $src,
          'name' => $name,
          'desc' => $desc,
          'category' => $type
        ]);
        $this->success('上传成功');
      } else {
        $this->error('视频上传格式有问题');
      }
    } else {
      $this->error('请选择上传视频');
    }
  }
  //视频列表渲染接口
  public function dataList()
  {
    $data = VideoModel::all();
    $count = count($data);
    $res = ["code"=>0,"msg"=>"success","count"=>$count,"data"=>$data];
    $list = json_encode($res);
    header('Content-Type:text/html;charset=utf-8');
    exit($list);
  }
}
