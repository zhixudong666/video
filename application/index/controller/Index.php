<?php
namespace app\index\controller;
use think\Controller;
use app\api\model\Video as VideoModel;

class Index extends Controller
{
    //渲染视频页
    public function index()
    {
      //动作
      $mv1 = \app\api\model\Video::where('category','=',1)->select();
      $this->assign('mv1',$mv1);
      //动漫
      $mv2 = \app\api\model\Video::where('category','=',2)->select();
      $this->assign('mv2',$mv2);
      //搞笑
      $mv3 = \app\api\model\Video::where('category','=',3)->select();
      $this->assign('mv3',$mv3);
      //体育
      $mv4 = \app\api\model\Video::where('category','=',4)->select();
      $this->assign('mv4',$mv4);
      return $this->fetch();
    }
    //渲染初始提示页面
    public function tips()
    {
      return $this->fetch('index/tips');
    }
}
