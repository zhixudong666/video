<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use app\api\model\Video as VideoModel;
class Video extends Controller
{
  //删除视频
  public function del()
  {
      $id = $_GET['id'];
      $video = VideoModel::get($id);
      if($video){
        $video->delete();
        $data = ['code'=>0,'msg'=>'删除成功'];
        return json($data);
      }else{
        $data = ['code'=>1,'msg'=>'操作失败'];
        return json($data);
      }
  }
}
