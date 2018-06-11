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

class Serious extends BaseController
{
    public function index(){
        $res = Db::table('serious')->paginate(15);
        $page = $res->render();
        $this->assign(['res'=>$res,'page'=>$page]);
        return $this->fetch();
    }

    public function add(){
        if($_POST){
            $data['name'] = input('post.serious_name');
            if(session('errorusr')){
                session::delete('errorusr');
                $this->error('该名称已经存在');
                exit;
            }
            $res = Db::table('serious')->insert($data);
            if($res){
                $this->success('添加成功','index');
            }
        }
        return $this->fetch();
    }

    public function del(){
        $id = input('get.id');
        $res = Db::table('serious')->where('id',$id)->delete();
        if($res){
            $this->success('删除成功','index');
        }
    }

    public function checka(){
        Session::delete('errorusr');
        $serious_name = input('get.serious_name');
        $res = Db::table('serious')->where('name',$serious_name)->select();
        $arr_return = ['error' => 0, 'msg' => ''];
        if ($res) {
            $arr_return = ['error' => 1, 'msg' => '该分类已经存在'];
            session::set('errorusr','1');
        }
        echo json_encode($arr_return);
        exit;
    }
}