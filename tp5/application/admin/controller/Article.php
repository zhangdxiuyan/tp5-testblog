<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use app\admin\validate\Article as ArticleValidate;
use app\admin\model\Article as ArticleModel;
class Article extends Base
{
    public function add()
    {
        if (request()->ispost()) {
            //dump($_POST);die;
            $data=[
                'title'=>input('title'),
                'brief'=>input('brief'),
                'keywords'=>str_replace('，', ',',input('keywords')),
                'author'=>input('author'),
                'cateid'=>input('cateid'),
                'content'=>input('content'),
                'time'=>time(),
            ];
            if(input('state')=="on"){
                $data['state']=1;
            }
            if ($_FILES['pic']['tmp_name']) {
                $file = request()->file('pic');
                $info = $file->move( '../public/static/admin/uploads');
                $data['pic']='/uploads/'.$info->getSaveName();
            }
            $validate = new ArticleValidate;
            if (!$validate->scene('add')->check($data)) {
                $this->error($validate->getError());
                die;
            }         

            if(Db::name('article')->insert($data)){
                return $this->success('添加文章成功！','lst');
            }else{
                return $this->error('添加文章失败！');
            }
            return ;
        }
        $cateres=Db::table('tp_cate')->select();
        $this->assign('cateres',$cateres);
        return $this->fetch();
    }



   public function lst()
    {

        // 查询状态为1的用户数据 并且每页显示2条数据
        $list = ArticleModel::paginate(2);
        //$list=Db::table('tp_article')->alias('a')->join('cate c','c.id=a.cateid')->field('a.id,a.title,a.author,a.pic,a.state,c.catename')->paginate(2);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);

        return $this->fetch();
    }

    public function edit()
    {
        $id=input('id');
        $articles=Db::table('tp_article')->find($id);
        if(request()->ispost()){
            
            $data=[
                'id'  =>input('id'),
                'title'=>input('title'),
                'brief'=>input('brief'),
                'keywords'=>str_replace('，', ',',input('keywords')),
                'author'=>input('author'),
                'cateid'=>input('cateid'),
                'content'=>input('content'),
                'time'=>time(),

            ];
            if(input('state')=="on"){
                $data['state']=1;
            }else{
                $data['state']=0;
            }
            if ($_FILES['pic']['tmp_name']) {
                $file = request()->file('pic');
                $info = $file->move( '../public/static/admin/uploads');
                $data['pic']='/uploads/'.$info->getSaveName();
            }
            $validate = new ArticleValidate;
            if (!$validate->scene('edit')->check($data)) {
                $this->error($validate->getError());
                die;
            }
            if(Db::name('article')->update($data)){
                return $this->success('修改文章成功！','lst');
            }else{
                return $this->error('修改文章失败！');   
            }
            return;
        }
        $this->assign('articles',$articles);
        $cateres=Db::table('tp_cate')->select();
        $this->assign('cateres',$cateres);
        return $this->fetch();
    }

    public function del(){
        $id=input('id');
        if (Db::table('tp_article')->delete($id)) {
            return $this->success('删除文章成功！','lst');
        }else{
            return $this->error('删除文章失败！');
        }
        
        return $this->fetch();
    }


    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
