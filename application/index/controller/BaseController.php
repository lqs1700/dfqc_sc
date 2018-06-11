<?php
    namespace app\index\controller;
    use think\Controller;
    use think\Session;
    use think\Db;
    use think\Exception;
    class BaseController extends Controller
{
    public function _initialize(){
        $this->checkSession();
    }

    private function checkSession()
    {
        if(session::get('is_login')){
            return true;
        }else{
            $this->redirect('login/index');
            exit;
        }
    }

    //含图片添加
    public function addWithImg2($table,$toUrl,$data)
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
            $data['main_image_url'] = $name;
            $res = Db::table($table)->insert($data);
            if($res){
                $this->success('添加成功',$toUrl);
            }
        }
    }
    //修改带图片
    public function editWithImg()
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
            $img = $name;
        }
        $data['main_image_url'] = $img;
        return $data['main_image_url'];
    }
}