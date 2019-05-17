<?php
namespace app\admin\controller;
use app\admin\model\User as UserModel;
use app\api\model\Video as VideoModel;
use think\Controller;

class Index extends Controller
{
  //系统管理首页
  public function index()
  {
    return $this->fetch();
  }
  //用户列表
  public function user()
  {
    return $this->fetch('index/user');
  }
  //视频列表
  public function video()
  {
    $title = '大番薯-视频列表';
    $this->assign('title',$title);
    return $this->fetch('index/video');
  }
  //上传视频
  public function upload()
  {
    $list = [
      'title'=>'大番薯-视频上传'
    ];
    $this->assign('list',$list);
    return $this->fetch('index/upload');
  }
}