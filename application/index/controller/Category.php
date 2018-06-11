<?php
namespace app\index\controller;

use think\Db;
use think\Session;
class Category extends BaseController
{
    public function index(){
        $res = Db::table('category')->paginate(15);
        $page = $res->render();
        $this->assign(['res'=>$res,'page'=>$page]);
        return $this->fetch();
    }

    public function add(){
        if($_POST){
            $data['name'] = input('post.category_name');
            if(session('errorusr')){
                session::delete('errorusr');
                $this->error('该名称已经存在');
            }
            $res = Db::table('category')->insert($data);
            if($res){
                $this->success('添加成功','index');
            }
        }
        return $this->fetch();
    }

    public function del(){
        $id = input('get.id');
        $res = Db::table('category')->where('id',$id)->delete();
        if($res){
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
}