<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use app\admin\validate\Cate as CateValidate;
use app\admin\model\Cate as CateModel;
class Cate extends Base
{
    public function add()
    {
        if (request()->ispost()) {
            $data=[
                'catename'=>input('catename'),
                
            ];
            $validate = new CateValidate;
            if (!$validate->scene('add')->check($data)) {
                $this->error($validate->getError());
                die;
            }         

            if(Db::name('cate')->insert($data)){
                return $this->success('添加栏目成功！','lst');
            }else{
                return $this->error('添加栏目失败！');
            }
            return ;
        }
        return $this->fetch();
    }



   public function lst()
    {

        // 查询状态为1的用户数据 并且每页显示2条数据
        $list = CateModel::paginate(2);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);

        return $this->fetch();
    }

    public function edit()
    {
        $id=input('id');
        $cates=Db::table('tp_cate')->find($id);
        if(request()->ispost()){
            
            $data=[
                'id'=>input('id'),
                'catename'=>input('catename'),
            ];
            
            $validate = new CateValidate;
            if (!$validate->scene('edit')->check($data)) {
                $this->error($validate->getError());
                die;
            }
            if(Db::name('cate')->update($data)){
                return $this->success('修改栏目成功！','lst');
            }else{
                return $this->error('修改栏目失败！');   
            }
            return;
        }
        
        $this->assign('cates',$cates);
        return $this->fetch();
    }

    public function del(){
        $id=input('id');
        if (Db::table('tp_cate')->delete($id)) {
            return $this->success('删除栏目成功！','lst');
        }else{
            return $this->error('删除栏目失败！');
        }
       
        return $this->fetch();
    }


    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
