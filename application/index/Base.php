<?php
namespace app\index;
use think\Controller;
use think\Db;

class Base extends Controller{
	
	public function _initialize(){
		$menus = Db::name('label_list')->field('id,name')->where(['status'=>1,'isdelete'=>0])->select();
		$this->view->assign('menus',$menus);
	}
}