<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin;
use think\Db;
class Login extends Controller
{
    public function index(){
        if (request()->ispost()) {
            $admin=new Admin;
            $data=input('post.');
            if ($admin->login($data)==3) {
                $this->success('登录成功正在跳转...','index/index');
            }elseif($admin->login($data)==4){
                $this->error('验证码输入错误...');
            }else{
                $this->error('用户名或者密码错误，登录失败');
            }
        }
        return $this->fetch('login');
    }


    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
