<?php
namespace app\index\controller;
use think\Db;
use app\index\controller\Base;
class Search extends Base
{
    public function index()
    {
        $keywords=input('keywords');
        if ($keywords) {
            $map[]=['title','like','%'.$keywords.'%'];
            $searchres=Db::table('tp_article')->where($map)->order('click desc')->paginate(1,false,['query'=>request()->param()]);
            $this->assign(array(
                'searchres'=>$searchres,
                'keywords'=>$keywords
            ));
        }else{
            $this->assign(array(
                'searchres'=>null,
                'keywords'=>$keywords
            ));
        }
        return $this->fetch('search');
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
