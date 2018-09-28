<?php
namespace app\admin\widget;
use think\Url;
use think\Db;

class Index{
	public function index($list,$controller=''){
    	$parse_str = "";
 		if(empty($list['_child'])){
 			$url = Url::build($controller.$list['name'].'/index');
 			$parse_str.=" <dd><a href='javascript:;'' href-url='".$url."'><i class='layui-icon layui-icon-list'></i>{$list['title']}</a></dd>";
 		}else{
 			$controller = $controller.'.';
 			$group = Db::name('admin_group')->field('id,name,icon')->where(['status'=>1,'isdelete'=>0,'id'=>$list['group_id']])->find();
 			$parse_str.="<li class='layui-nav-item ''>
                    <a href='javascript:;''><i  class='layui-icon ".$group['icon']."'></i>{$group['name']}</a>
                    <dl class='layui-nav-child'>";
             $parse_str.= $this->index($list['_child'],$controller);
             $parse_str.=" </dl></li>";
 		}  
 		return $parse_str;
	}
}
