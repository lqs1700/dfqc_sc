<?php
	namespace app\index\controller;
	use think\Captcha;
	use think\Db;
	use think\Session;
	use think\Controller;
	class Login extends Controller
{	
	//登陆
	public function index()
	{
		$title="登陆";
		if($_POST)
		{
			$captcha =input('post.verify');
			if(!captcha_check($captcha)){
				$this->success('验证码错误','login/index');
			};
			$username = input('post.username');
			$pwdd = input('post.password');
			$pwd = md5(md5($pwdd).'8888');
			$res = Db::table('third_app')->where('app_id',$username)->where('app_secret',$pwd)->select();
			if($res){
				session::set('is_login',$username);
				$this->success('登陆成功','index/index');
			}else{
				$this->error('用户名或者密码错误');
			}
		}else{
			return $this->fetch('index', ['title' => $title]);
		}
	}
	//退出
	public function loginout()
	{
		session::set('is_login','');
		return $this->fetch('index');
	}
}