<?php

namespace app\index\controller;

use think\Db;

class Image extends BaseController
{
   public function index(){
       $image = Db::table('image')->paginate(10);
       $page = $image->render();
       $this->assign(['image'=>$image,'page'=>$page]);
       return $this->fetch();
   }
}