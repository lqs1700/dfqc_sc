<?php
namespace app\index\controller;
use think\Db;

class Product extends BaseController
{
    public function index()
    {
        $products = Db::table('product a')
            ->field('a.id,a.name,a.price,a.stock,a.main_image_url as image,b.name as version,c.name as category,d.name as serious')
            ->join('version b','a.version_id=b.id','left')
            ->join('category c','a.category_id=c.id','left')
            ->join('serious d','a.serious_id=d.id','left')
            ->order('a.id desc')
            ->limit(10)
            ->paginate();
        $page= $products->render();
        $this->assign(['products'=>$products,'page' => $page]);
        return $this->fetch();
    }

    public function add()
    {
        if($_POST){
            $file = request()->file('image');
            if($file){
                $data = input('');
                $table = 'product';
                $toUrl = 'index';
                $this->addWithImg($table,$toUrl,$data);
            }
        }
        $version = Db::table("version")->select();
        $serious = Db::table("serious")->select();
        $category = Db::table("category")->select();
        $this->assign(['version'=>$version,'serious'=>$serious,'category'=>$category]);
        return $this->fetch();
    }

    public function edit()
    {
        if($_POST){
            $file = request()->file('image');
            $data = input('');
            if($file){
                $data['main_image_url'] = $this->editWithImg();
            }
            $res = Db::table('product')->where('id',$data['id'])->update($data);
            if($res){
                $this->success('修改成功','product/index');
            }else{
                $this->error('修改失败');
            }
        }
        $id = input('get.id');
        $product = Db::table('product a')
            ->field('a.id,a.name,a.price,a.stock,a.main_image_url as image,b.name as version,c.name as category,d.name as serious')
            ->join('version b','a.version_id=b.id','left')
            ->join('category c','a.category_id=c.id','left')
            ->join('serious d','a.serious_id=d.id','left')
            ->where('a.id','=',$id)
            ->find();
        $category = Db::table('category')->select();
        $version = Db::table('version')->select();
        $serious = Db::table('serious')->select();
        $this->assign(['product'=>$product,'category'=>$category,'version'=>$version,'serious'=>$serious]);
        return $this->fetch();
    }

    public function del()
    {
        $id = input('get.id');
        $res = Db::table('product')->where('id',$id)->delete();
        if($res){
            $this->success('删除成功','product/index');
        }
    }

    private function addWithImg($table,$toUrl,$data){
        $file = request()->file('image');
        $info1 = $file->getInfo();
        $name = $info1['name'];
        $arr = explode(".",$name);
        $ext = $arr[1];
        $arr5 = ['jpg','jpeg','png','gif'];
        if(!in_array($ext,$arr5)){
            $this->error('图片格式不正确');
        }else{
            $data['main_image_url'] = $name;
            $res = Db::table($table)->insert($data);
            if($res){
                $this->success('添加成功',$toUrl);
            }
        }
    }
}