<?php
namespace app\index\controller;

use think\Controller;

class Video extends Controller
{
  public function play()
  {
    $list = '';
    //视频地址
    $this->assign('list',$list);
    return $this->fetch('index/video');
  }

}
