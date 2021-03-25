<?php
namespace app\index\controller;
use think\Db;
use app\index\controller\Base;
class Cate extends Base
{
    public function index()
    {
        $cateid=input('cateid');
        $cates=Db::table('tp_cate')->find($cateid);
        $this->assign('cates',$cates);
        $articleres=Db::table('tp_article')->where(array('cateid'=>$cateid))->paginate(3);
        $this->assign('articleres',$articleres);
        return $this->fetch('cate');
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
