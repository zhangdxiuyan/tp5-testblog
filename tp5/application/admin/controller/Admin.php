<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use app\admin\validate\Admin as AdminValidate;
use app\admin\model\Admin as AdminModel;
class Admin extends Base
{
    public function add()
    {
        if (request()->ispost()) {
            $data=[
                'username'=>input('username'),
                'password'=>md5(input('password')),
            ];
            $validate = new AdminValidate;
            if (!$validate->scene('add')->check($data)) {
                $this->error($validate->getError());
                die;
            }         

            if(Db::name('admin')->insert($data)){
                return $this->success('添加管理员成功！','lst');
            }else{
                return $this->error('添加管理员失败！');
            }
            return ;
        }

        return $this->fetch();
    }

   public function lst()
    {

        // 查询状态为1的用户数据 并且每页显示2条数据
        $list = AdminModel::where('status',1)->paginate(2);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        AdminModel::e($data1=1,$data2=2);
        return $this->fetch();
    }

    public function edit()
    {
        $id=input('id');
        $admins=Db::table('tp_admin')->find($id);
        if(request()->ispost()){
            
            $data=[
                'id'=>input('id'),
                'username'=>input('username'),
            ];
            if (input('password')) {
                $data['password']=md5(input('password'));
            }else{
                $data['password']=$admins['password'];
            }
            $validate = new AdminValidate;
            if (!$validate->scene('edit')->check($data)) {
                $this->error($validate->getError());
                die;
            }
            $amdinsave=Db::name('admin')->update($data);
            if($amdinsave !== false){
                return $this->success('修改管理员成功！','lst');
            }else{
                return $this->error('修改管理员失败！');   
            }
            return;
        }
        
        $this->assign('admins',$admins);
        return $this->fetch();
    }

    public function del(){
        $id=input('id');
        if ($id != 1) {
            if (Db::table('tp_admin')->delete($id)) {
                return $this->success('删除管理员成功！','lst');
            }else{
                return $this->error('删除管理员失败！');
            }
        }else{
            return $this->error('初始化管理员不得删除！');
        }
        return $this->fetch();
    }
    public function logout(){
        session(null);
        $this->success('退出登录成功','login/index');
    }


    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
