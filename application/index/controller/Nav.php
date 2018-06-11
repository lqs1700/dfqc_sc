<?php
	namespace app\index\controller;
	use think\Db;
	use think\Request;

	class Nav extends BaseController
{
	public function index()
	{
		$nav = Db::table('nav')->paginate(10);
		$page = $nav->render();
		$this->assign(['nav' => $nav,'page'=>$page]);
		return $this->fetch();
	}

	public function addNav()
	{
		if($_POST){
			$data['name']=input('post.name');
			$res1 = Db::table('nav')->where('name',$data['name'])->select();
			if($res1){
				$this->error('该名称已经存在');
			}
			$data['url'] =input('post.url')?input('post.url'):'';
			$res =Db::table('nav')->insert($data);
			if($res){
				$this->success('添加成功','index');
			}
		}else{
			return $this->fetch();
		}
	}

	public function edit(){
		if($_POST){
			$data = input('');
			$res = Db::table('nav')->where('id',$data['id'])->update($data);
			if($res){
				$this->success('修改成功','index');
			}else{
				$this->error('修改失败');
			}
		}
		$id=input('get.id');
		$nav = Db::table('nav')->where('id',$id)->find();
		$this->assign(['nav'=>$nav]);
		return $this->fetch();
	}

	public function delNav()
	{
		$id = input('get.id');
		$res = Db::table('nav')->where('id',$id)->delete();
		if($res){
			$this->success('删除成功','index');
		}
	}

	public function ajax()
	{
		$nav_name = $_GET['nav_name'];
		$res = Db::table('nav')->where('name',$nav_name)->select();

		$arr_return = ['error' => 0, 'msg' => ''];
		if ($res) {
		  $arr_return = ['error' => 1, 'msg' => '该导航栏已经存在,请换个名字'];
		}
		echo json_encode($arr_return);
	}
}
