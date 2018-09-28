<?php
namespace app\index\controller;
use app\index\Base;
use think\Db; 
use think\Loader;
use think\Cookie;
class Index extends Base
{
    public function index(){
        $hot_article = Db::name('label_article')->field('id,name,read_account')->where(['status'=>1,'isdelete'=>0])->order('read_account desc,id')->limit(5)->select();
        $this->view->assign('hot_article',$hot_article);

        if(null!==$this->request->param('label_id')){
            $map['label_id']=$this->request->param('label_id');
        }else if(null!==$this->request->param('name')){
            $map['name']=['like','%'.$this->request->param('name').'%'];
        }else{
            $label = Db::name('label_list')->field('id')->where(['status'=>1,'isdelete'=>0])->select();
            $label_arr=[];
            foreach ($label as $key => $value) {
                $label_arr[]=$value['id'];
            }
            $map['label_id']=['in',$label_arr];
        }
        $articles = \think\Loader::model('LabelArticle')->field('id,name,read_account,label_id,author_id,create_time')->order('create_time desc')->where($map)->paginate(5);

        $this->view->assign('articles',$articles);
        return $this->view->fetch();
    }

    public function detail(){
        $article_id = $this->request->param('detail');
        $info = Db::name('label_article')->field('id,name,content')->where('id',$article_id)->find();
        $this->view->assign('info',$info);
        if(!Cookie::get('article_'.$article_id)){
            Db::name('label_article')->where('id',  $article_id)->setInc('read_account',    1);
            Cookie::set('article_'.$article_id,true);
        }
        return $this->view->fetch();
    }
}
