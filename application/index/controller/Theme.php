<?php

namespace app\index\controller;


use think\Db;
use app\exception\Image as ImageException;

class Theme extends BaseController
{
    public function index(){
        $theme = Db::table('theme a')
            ->field('a.*,b.url')
            ->join('image b','a.topic_image_id=b.id','left')
            ->paginate(10);
        $page = $theme->render();
        $this->assign(['theme'=>$theme,'page'=>$page]);
        return $this->fetch();
    }

    public function add(){
        if($_POST){
            $data = input('');
            $table = 'theme';
            $toUrl = 'index';
            $this->addWithImg($table,$toUrl,$data);
        }
        return $this->fetch();
    }

    public function themeProduct(){
        $themeproduct = Db::table('theme_product a')
            ->field('a.id,b.description,c.name,d.url')
            ->join('theme b','a.theme_id = b.id','left')
            ->join('product c','a.product_id = c.id','left')
            ->join('image d','b.topic_image_id = d.id','left')
            ->order('theme_id')
            ->paginate(10);
        $page = $themeproduct->render();
        $this->assign(['themeproduct'=>$themeproduct,'page'=>$page]);
        return $this->fetch();
    }

    private function addWithImg($table,$toUrl,$data)
    {
        $file = request()->file('image');
        $info1 = $file->getInfo();
        $name = $info1['name'];
        $arr = explode(".",$name);
        $ext = $arr[1];
        $arr5 = ['jpg','jpeg','png','gif'];
        if(!in_array($ext,$arr5)){
            $this->error('图片格式不正确');
        }else{
            Db::startTrans();
            try{
                Db::table('image')->insert(['url'=>$name]);
                $image = Db::table('image')->where('url',$name)->find();
                if(!$image){
                    throw new ImageException();
                }
                $data['topic_image_id'] = $image['id'];
                $res = Db::table($table)->insert($data);
                Db::commit();
                if($res){
                    $this->success('添加成功',$toUrl);
                }
            }catch(\Exception $ex){
                Db::rollback();
                throw $ex;
            }
        }
    }

    public function addThemeProduct(){
        $theme_id = input('get.id');
        if($_POST){
            $data['theme_id'] = $theme_id;
            $data['product_id'] = input('post.product_id');
            $res = Db::table('theme_product')->insert($data);
            if($res){
                $this->success('添加成功','themeproduct');
            }
        }
        $theme = Db::table('theme')->where('id',$theme_id)->find();
        $product = Db::table('product')->select();
        $this->assign(['theme_id'=>$theme_id,'product'=>$product,'theme'=>$theme]);
        return $this->fetch();
    }

    public function delThemeProduct(){
        $id = input('get.id');
        $image_id = input('get.image_id');
        $res = Db::table('theme_product')->where('id',$id)->delete();
        $res2 =Db::table('image')->where('id',$image_id)->delete();
        if($res&&$res2){
            $this->success('删除成功','themeproduct');
        }
    }
    public function del(){
        $id = input('get.id');
        $image_id = input('get.image_id');
        $res = Db::table('theme_product')->where('theme_id',$id)->select();
        if($res){
            $this->error('此主题下面有产品，无法删除');
        }
        Db::startTrans();
        try{
            $res = Db::table('theme')->where('id',$id)->delete();
            $res2 = Db::table('image')->where('id',$image_id)->delete();
            Db::commit();
            if($res && $res2){
                $this->success('删除成功','index');
            }
        }catch(\Exception $ex){
            Db::rollback();
            throw $ex;
        }
    }
}