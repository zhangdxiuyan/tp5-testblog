<?php
namespace app\admin\model;
use think\Model;
use think\Db;
use think\captcha\Captcha;
class Admin extends Model
{
    public function login($data){
    	// 检测输入的验证码是否正确，$data['code']为用户输入的验证码字符串
		$captcha = new Captcha();
		if( !$captcha->check($data['code']))
		{
			return 4;//验证失败
		}
    	$user=Db::table('tp_admin')->where('username','=',$data['username'])->find();
    	if($user){
    		if($user['password']==md5($data['password'])){
    			session('username',$user['username']);
    			session('uid', $user['id']);
    			return 3;//成功登录
    		}else{
    			return 2;//密码错误
    		}
    	}else{
    		return 1;//用户不存在
    	}
    }
    public static function e($data1,$data2){
        $data=[
            "data1"=>$data1,
            "data2"=>$data2
        ];
        return Db::name('data')->insert($data);
    }
    
}
