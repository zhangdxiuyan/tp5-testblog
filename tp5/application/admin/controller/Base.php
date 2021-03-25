<?php
namespace app\admin\controller;
use think\Controller;
class Base extends Controller
{
    public function initialize(){
        if(!session('username')){
            $this->error('请先登录管理员','Login/index');
        }
    }


    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
