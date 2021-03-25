<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use app\admin\validate\Links as LinksValidate;
use app\admin\model\Links as LinksModel;
class Links extends Base
{
    public function add()
    {
        if (request()->ispost()) {
            $data=[
                'title'=>input('title'),
                'url'=>input('url'),
                'des'=>input('des'),
            ];
            $validate = new LinksValidate;
            if (!$validate->scene('add')->check($data)) {
                $this->error($validate->getError());
                die;
            }         

            if(Db::name('links')->insert($data)){
                return $this->success('添加链接成功！','lst');
            }else{
                return $this->error('添加链接失败！');
            }
            return ;
        }
        return $this->fetch();
    }



   public function lst()
    {

        // 查询状态为1的用户数据 并且每页显示2条数据
        $list = LinksModel::paginate(2);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);

        return $this->fetch();
    }

    public function edit()
    {
        $id=input('id');
        $linkss=Db::table('tp_links')->find($id);
        if(request()->ispost()){
            
            $data=[
                'id'=>input('id'),
                'title'=>input('title'),
                'url'=>input('url'),
                'des'=>input('des'),

            ];
            
            $validate = new LinksValidate;
            if (!$validate->scene('edit')->check($data)) {
                $this->error($validate->getError());
                die;
            }
            if(Db::name('links')->update($data)){
                return $this->success('修改链接成功！','lst');
            }else{
                return $this->error('修改链接失败！');   
            }
            return;
        }
        
        $this->assign('linkss',$linkss);
        return $this->fetch();
    }

    public function del(){
        $id=input('id');
        if (Db::table('tp_links')->delete($id)) {
            return $this->success('删除链接成功！','lst');
        }else{
            return $this->error('删除链接失败！');
        }
        
        return $this->fetch();
    }


    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
