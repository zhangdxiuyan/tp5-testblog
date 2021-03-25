<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Db;
class Article extends Base
{
    public function index()
    {
    	$arid=input('arid');
    	$articles=Db::table('tp_article')->find($arid);
        $recommendres=$this->recommend($articles['keywords'],$articles['id']);
    	$cates=Db::table('tp_cate')->find($articles['cateid']);
    	$recres=Db::table('tp_article')->where(array('cateid'=>$cates['id'],'state'=>1))->limit(8)->select();
    	Db::table('tp_article')->where('id','=',$arid)->setInc('click');
    	$this->assign(array(
    		'articles'=>$articles,
    		'cates'=>$cates,
    		'recres'=>$recres,
            'recommendres'=>$recommendres
    	));
        return $this->fetch('article');
    }

    public function recommend($keywords,$id){
        $arr=explode(',',$keywords);
        static $recommendres=array();
        foreach ($arr as $k => $v) {
            $map[]=['keywords','like','%'.$v.'%'];
            $map[]=['id','neq',$id];
            $remres=Db::table('tp_article')->where($map)->order('click desc')->limit(8)->select();
            $recommendres=array_merge($recommendres,$remres);
        }
        if ($recommendres) {
            $recommendres=arr_unique($recommendres);
        return $recommendres;
        }
        
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
