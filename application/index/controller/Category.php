<?php
namespace app\index\controller;

use think\Db;
use think\Session;
class Category extends BaseController
{
    public function index(){
        $res = Db::table('category a')
            ->field('a.*,b.url')
            ->join('image b','a.icon_image_id=b.id','left')
            ->paginate(15);
        $page = $res->render();
        $this->assign(['res'=>$res,'page'=>$page]);
        return $this->fetch();
    }

    public function add(){
        if($_POST){
            if(session('errorusr')){
                session::delete('errorusr');
                $this->error('该名称已经存在');
            }
            $data = [];
            $table = 'image';
            $table2 = 'category';
            $toUrl = 'index';
            $this->addWithImg($table,$toUrl,$data,$table2);
        }
        return $this->fetch();
    }

    public function del(){
        $id = input('get.id');
        $image_id=input('get.img_id');
        $res = Db::table('category')->where('id',$id)->delete();
        $res2 = Db::table('image')->where('id',$image_id)->delete();
        if($res&&$res2){
            $this->error('删除成功');
        }
    }

    public function checka(){
        Session::delete('errorusr');
        $category_name = input('get.category_name');
        $res = Db::table('category')->where('name',$category_name)->select();
        $arr_return = ['error' => 0, 'msg' => ''];
        if ($res) {
            $arr_return = ['error' => 1, 'msg' => '该分类已经存在'];
            session::set('errorusr','1');
        }
        echo json_encode($arr_return);
        exit;
    }

    private function addWithImg($table,$toUrl,$data,$table2)
    {
        $file = request()->file('category_icon');
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
                $data['url'] = $name;
                Db::table($table)->insert($data);
                $res2 = Db::table($table)->where('url', $data['url'])->find();
                $data2['name'] = input('post.category_name');
                $data2['icon_image_id'] = $res2['id'];
                $res3 = Db::table($table2)->insert($data2);
                Db::commit();
            }catch(\Exception $ex){
                Db::rollback();
                throw $ex;
            }
            if($res3){
                $this->success('添加成功',$toUrl);
            }
        }
    }
}