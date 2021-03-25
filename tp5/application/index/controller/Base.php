<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Base extends Controller
{
    public function initialize(){
    	$this->right();
        $cateres=Db::table('tp_cate')->order('id des')->select();
    	$this->assign('cateres',$cateres);
    }

    public function right(){
    	$clicks=Db::table('tp_article')->order('click desc')->limit(4)->select();
    	$tjyd=Db::table('tp_article')->where('state','=',1)->order('click desc')->limit(4)->select();
    	$this->assign(array(
    		'clicks'=>$clicks,
    		'tjyd'=>$tjyd
    	));
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
