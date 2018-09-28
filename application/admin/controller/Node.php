<?php
namespace app\admin\controller;
use app\admin\Controller;
use think\Db;

class Node extends Controller{
	use \app\admin\traits\controller\Controller;

	public function index(){
		$module_arr =[];
		$group_arr = [];
		$node_arr = [];
		$nodes = Db::name('node')->field(['id,pid,group_id,name,title,status'])->order('sort,id')->select();
		$tree = list_to_tree($nodes);
		foreach ($tree as $key => $value) {
			$module_arr[$key]=['id'=>$value['id'],'title'=>$value['title']];
			if(!empty($value['_child'])){
				foreach ($value['_child'] as $k => $v) {
					$group_arr[$value['id']][$k]=$v['group_id'];
					if(!empty($v['_child'])){
						$node_arr[$v['group_id']][$k]=$v;
					}
				}
			}
		}
		$this->view->assign('modules',$module_arr);

		$module_id =$this->request->param('module_id'); 
		if($module_id && isset($group_arr[$module_id])){
			$group_arr = $group_arr[$module_id];
		}else{
			$group_arr = array_shift($group_arr);
		}
		$group_arr = array_unique($group_arr);
		$group_info = Db::name('admin_group')->field('id,name,icon')->where(['id'=>['in',$group_arr]])->select();
		$this->view->assign('groups',$group_info);

		$group_id =$this->request->param('group_id'); 
		if($group_id && isset($node_arr[$group_id])){
			$node_arr = $node_arr[$group_id];
		}else{ 
			$node_arr = array_shift($node_arr);
		}
		$tree = $this->getTree($node_arr);

		$this->view->assign('nodes',json_encode($tree));

		return $this->view->fetch();
	}

	private function getTree($node_arr=[]){
			$tree = [];
			foreach ($node_arr as $key => $value) {
				if(!empty($value['_child'])){
					$tree[]=['id'=>$value['id'],'open'=>true,'name'=>$value['title'],'children'=>$this->getTree($value['_child'])];
				}else{
					$tree[]=['id'=>$value['id'],'open'=>true,'name'=>$value['title']."(".($value['status']?'正常':'禁用').")"];
				}
			}
			return $tree;
	}
}
