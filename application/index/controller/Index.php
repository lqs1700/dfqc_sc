<?php
	namespace app\index\controller;
	use think\Db;

	class Index extends BaseController
	{
		public function index()
		{
			$name = session('is_login');
			$this->assign(['pri_name'=>$name,'admin'=>$name]);
			return $this->fetch();
		}

		public function backendIndex()
		{
			return $this->fetch();
		}
	}