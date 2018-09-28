<?php   
namespace app\admin\controller;
use app\admin\Controller;
use think\Db;
class LabelArticle extends Controller{
	use \app\admin\traits\controller\Controller;

	public function before_add(){
		$parent_nodes = Db::name('label_list')->field('id,name')->where(['status'=>1,'isdelete'=>0])->select();
			$parent_arr =[];
			foreach ($parent_nodes as $key => $value) {
				$parent_arr[]=['id'=>$value['id'],'name'=>$value['name']];
			}
			$this->view->assign('parent_nodes',$parent_arr);
	}

	public function before_edit(){
		$parent_nodes = Db::name('label_list')->field('id,name')->where(['status'=>1,'isdelete'=>0])->select();
			$parent_arr =[];
			foreach ($parent_nodes as $key => $value) {
				$parent_arr[]=['id'=>$value['id'],'name'=>$value['name']];
			}
			$this->view->assign('parent_nodes',$parent_arr);
	}

	public function article_upload(){
		if($this->request->isAjax() && $this->request->isPost()){
			$file = $this->request->file('file');
			if($file){
				$path = ROOT_PATH	.	'public'	.	DS	.	'uploads/article';
				$info = $file->move($path);
				if($info){
					return ['code'=>0,'msg'=>'Yes','data'=>['src'=>'/lib/public/uploads/article/'.$info->getSaveName()]];	
				}else{
					return ['code'=>1,'msg'=>$file->getError()];	
				}
			}
		}
	}
}