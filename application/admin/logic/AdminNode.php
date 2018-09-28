<?php
namespace app\admin\logic;
use think\Session;
use think\Config;
use think\Db;

class AdminNode{
	public static function getMenu(){
		$menu=[];
		if(Session::get(Config::get('rbac.admin_auth_key'))){
			$menu = Db::name('node')->field(['id','pid','group_id','name','title'])->order('sort ,id')->where(['status'=>1,'isdelete'=>0,'group_id'=>['>',0]])->select();
		}else{
			$user_id = Session::get(Config::get('rbac.user_auth_key'));
			$sql = "select node.id,node.pid,node.group_id,node.name,node.title from lib_node as node,lib_admin_role_user as user,lib_admin_role as role,lib_admin_access as access where user.user_id='{$user_id}' and user.role_id =role.id and role.id=access.role_id and access.node_id = node.id and role.status=1 and node.status=1 and group_id>0 order by sort,id";
			$menu = Db::query($sql);
		}
		return $menu;
	}
}