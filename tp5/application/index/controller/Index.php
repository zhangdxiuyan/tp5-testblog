<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Db;
class Index extends Base
{
    public function index()
    {
    	$articles=Db::table('tp_article')->order('id desc')->paginate(3);
    	$this->assign('articles',$articles);
        return $this->fetch();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
