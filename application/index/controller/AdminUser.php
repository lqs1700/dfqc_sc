<?php
	namespace app\index\controller;
	use think\Db;
	use think\Session;

	class AdminUser extends BaseController
{
	public function index(){
		$prigou= Db::table('third_app')->select();
		$this->assign('prigou',$prigou);
		return view();
	}

	public function add(){
		if($_POST){
			$data['app_id'] = input('post.admin_user');
			$data['app_secret'] = md5(md5(input('post.admin_pwd')).'8888');
			if(session('errorusr')){
				Session::delete('errorusr');
				$this->error('用户名错误');
			};
			if(session('errorpas')){
				Session::delete('errorpas');
				$this->error('密码错误');
			};
			$res2 = Db::table('third_app')->where('app_id',$data['app_id'])->select();
			if($res2){
				$this->error('该名称已经存在');
			}
			$res = Db::table('third_app')->insert($data);
			if($res){
				$this->success('添加成功','index');
			}
		}
		return $this->fetch();
	}

	public function edit(){
		if($_POST)
		{
			$id = input('get.id');
			$data['app_secret'] = md5(md5(input('post.admin_pwd')).'8888');
			if(session('errorpas')){
				Session::delete('errorpas');
				$this->error('密码格式不正确');
			};
			$res = Db::table('third_app')->where('id',$id)->update($data);
			if($res){
				$this->success('修改成功','index');
			}else{
				$this->error('修改失败');
			}
		}
		$id = input('get.id');
		$val = Db::table('third_app')->where('id',$id)->find();
		$this->assign('val',$val);
		return $this->fetch();
	}

	public function del(){
		$id = input('get.id');
		$res = Db::table('third_app')->where('id',$id)->delete();
		if($res){
			$this->error('删除成功');
		}
	}

	public function checka(){
		Session::delete('errorusr');
		$admin_user = input('get.admin_user');
		$res = Db::table('third_app')->where('app_id',$admin_user)->select();
		$arr_return = ['error' => 0, 'msg' => ''];
		if ($res) {
			$arr_return = ['error' => 1, 'msg' => '该用户已经存在'];
			session::set('errorusr','1');
		}

		$pattern='/^[a-zA-Z]\w{3,17}$/';
		$return=preg_match_all($pattern,$admin_user);
		if(!$return){
			$arr_return = ['error' => 2, 'msg' => '用户名必须字母开头，长度4-18位'];
			session::set('errorusr','1');
		}
		echo json_encode($arr_return);
		exit;
	}

	public function checkp(){
		Session::delete('errorpas');
		$admin_pwd = input('get.admin_pwd');
		$pattern='/^[a-zA-Z_]\w{7,17}$/';
		$return=preg_match_all($pattern,$admin_pwd);
		$arr_return = ['error' => 0, 'msg' => ''];
		if(!$return){
			$arr_return = ['error' => 2, 'msg' => '密码必须下划线或字母开头，长度8-18位'];
			session::set('errorpas','2');
		}
		echo json_encode($arr_return);
		exit;
	}
}