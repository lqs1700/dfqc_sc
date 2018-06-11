<?php
	namespace app\index\controller;

	use think\Db;
	use think\Exception;

	class Banner extends BaseController
{
	public function index()
	{
		$banner = Db::table('banner_item a')
				->field('a.id,a.img_id,a.banner_id,b.name,c.url')
				->join('banner b','a.banner_id = b.id','left')
				->join('image c','a.img_id = c.id','left')
				->paginate(15);
		$page = $banner->render();
		$this->assign(['banner'=>$banner,'page'=>$page]);
		return $this->fetch();
	}

	public function add()
	{
		$file = request()->file('image');
		if($file){
			$data = [];
			$table = 'image';
			$toUrl = 'index';
			$table2 = 'banner_item';
			$this->addWithImg($table,$toUrl,$data,$table2);
		}
		return $this->fetch();
	}

	public function del()
	{
		$id = input('get.id');
		$img_id = input('get.img_id');
		Db::startTrans();
		try{
			$res = Db::table('banner_item')->where('id',$id)->delete();
			$res2 = Db::table('image')->where('id',$img_id)->delete();
			Db::commit();
			if($res && $res2){
				$this->success('删除成功','index');
			}
		}catch(\Exception $ex){
			Db::rollback();
			throw $ex;
		}
	}

	private function addWithImg($table,$toUrl,$data,$table2)
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
				$data['url'] = $name;
				Db::table($table)->insert($data);
				$res2 = Db::table($table)->where('url', $data['url'])->find();
				$data2['img_id'] = $res2['id'];
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