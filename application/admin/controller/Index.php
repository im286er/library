<?php
namespace app\admin\controller;
use app\admin\Controller;
use app\admin\logic\AdminNode as AdminNodeLogic;
use think\Db;

class Index extends Controller
{
	public function index()
	{
		$menu = AdminNodeLogic::getMenu();
		$tree = list_to_tree($menu);
		$groups =[];
		$menus = [];
		if(!empty($tree)){
			foreach ($tree as $key => $value) {
				if($value['pid']==0 && strtolower($value['name'])==strtolower($this->request->module())){
					foreach ($value['_child'] as $k=> $v) {
						$groups[] = $v['group_id'];
						$menus[$v['group_id']][] = $v;
					}
				}
			}
		}
		$groups = array_unique($groups);
		$groups = Db::name('admin_group')->field('id,name,icon')->where(['status'=>1,'isdelete'=>0,'id'=>['in',$groups]])->select();
		$this->view->assign('groups',$groups);
		$this->view->assign('menus',$menus);
		return $this->view->fetch();
	}
	public function welcome(){
		return $this->view->fetch();
	}
}
