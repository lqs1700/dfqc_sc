<?php
/**
 * Created by PhpStorm.
 * User: wx
 * Date: 2018/5/31
 * Time: 14:08
 */

namespace app\index\controller;

use think\Db;
use think\Session;

class Version extends BaseController
{
    public function index(){
        $res = Db::table('version')->paginate(15);
        $page = $res->render();
        $this->assign(['res'=>$res,'page'=>$page]);
        return $this->fetch();
    }

    public function add(){
        if($_POST){
            $data['name'] = input('post.version_name');
            if(session('errorusr')){
                session::delete('errorusr');
                $this->error('该名称已经存在');
            }
            $res = Db::table('version')->insert($data);
            if($res){
                $this->success('添加成功','index');
            }
        }
        return $this->fetch();
    }

    public function del(){
        $id = input('get.id');
        $res = Db::table('version')->where('id',$id)->delete();
        if($res){
            $this->success('删除成功','index');
        }
    }

    public function checka(){
        Session::delete('errorusr');
        $version_name = input('get.version_name');

        $res = Db::table('version')->where('name',$version_name)->select();
        $arr_return = ['error' => 0, 'msg' => ''];
        if ($res) {
            $arr_return = ['error' => 1, 'msg' => '该分类已经存在'];
            session::set('errorusr','1');
        }
        echo json_encode($arr_return);
        exit;
    }
}