<?php
namespace app\admin\controller;
use app\admin\Controller;
use think\Db;
class AdminRole extends Controller{
	use \app\admin\traits\controller\Controller;

	public function access(){
		if($this->request->isAjax() && $this->request->isPost()){
			$role_id =$this->request->param('role_id');
			$node_arr = explode(',', $this->request->param('checked_str'));

			Db::name('admin_access')->where('role_id',$role_id)->delete();
			if(count($node_arr)>1){
				$checked_nodes=[];
				foreach ($node_arr as $key => $value) {
					$checked_nodes[]=['role_id'=>$role_id,'node_id'=>$value];
				}
				
				if(false!==Db::name('admin_access')->insertAll($checked_nodes)){
					return ajax_return_adv();
				}else{
					return ajax_return_adv_error();
				}
			}else{
				return ajax_return_adv();
			}
		}else{
			$role_id = $this->request->param('id');
			$checked_nodes = Db::name('admin_access')->where('role_id',$role_id)->field('node_id')->select()?:[];
			$check_nodes=[];
			foreach ($checked_nodes as $key => $value) {
				$check_nodes[]=$value['node_id'];
			}
			
			$nodes = Db::name('node')->field(['id','pid'=>'pId','title'])->where(['status'=>1])->select();
			foreach ($nodes as $key => $value) {
				$nodes[$key]['name']=$value['title'];
				$nodes[$key]['open']=true;
				if(in_array($value['id'], $check_nodes)){
					$nodes[$key]['checked']=true;
				}
			}
			$this->view->assign('role_id',$role_id);
			$this->view->assign('nodes',json_encode($nodes));
			return $this->view->fetch();
		}
	}
 
	public function user(){
		if($this->request->isAjax() && $this->request->isPost()){
			$role_id = $this->request->param('role_id');
			$type = $this->request->param('type');
			$checked_str = $this->request->param('checked_str');
			$checked_arr= explode(',', $checked_str);
			if(!empty($checked_arr)){
				if($type==1){
					$insert_arr = [];
					foreach ($checked_arr as $key => $value) {
						$insert_arr[]=['role_id'=>$role_id,'user_id'=>$value];
					}
					if(false!==Db::name('admin_role_user')->insertAll($insert_arr)){
						return ajax_return_adv();
					}else{
						return ajax_return_adv_error();
					}
				}else if($type==0){
					if(false!==Db::name('admin_role_user')->where(['user_id'=>['in',$checked_arr]])->delete()){
						return ajax_return_adv();
					}else{
						return ajax_return_adv_error();
					}
				}
			}
		}else{
			$this->view->assign('role_id',$this->request->param('id'));
			return $this->view->fetch(); 	
		}
	}
	public function checkedTable(){
		if($this->request->isAjax()){
			$checked_user = Db::name('admin_role_user')->where('role_id',$this->request->param('id'))->field('user_id')->select()?:[];
			$check_user=[];
			foreach ($checked_user as $key => $value) {
				$check_user[]=$value['user_id'];
			}
			return $this->getTable(['status'=>1,'isdelete'=>0,'id'=>['in',$check_user]]);
		}
	}

	public function uncheckedTable(){
		if($this->request->isAjax()){
			$checked_user = Db::name('admin_role_user')->where('role_id',$this->request->param('id'))->field('user_id')->select()?:[];
			$check_user=[];
			foreach ($checked_user as $key => $value) {
				$check_user[]=$value['user_id'];
			}
			return $this->getTable(['status'=>1,'isdelete'=>0,'id'=>['not in',$check_user]]);
		}
	}

	private function getTable($map){
		$page = $this->request->param('page');
		$limit = $this->request->param('limit');

		$data = Db::name('admin_user')->field('id,account')->where($map)->limit(($page-1)*$limit,$limit)->select();
		$total = Db::name('admin_user')->where($map)->count();
  		return ['code'=>0,'message'=>'','count'=>$total,'data'=>$data];
	}
}