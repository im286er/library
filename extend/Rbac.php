<?php
use think\Db;
use think\Request;
use think\Config;
use think\Session;
use think\Cache;
 
class Rbac{
	public static function authenticate($map){
		$user = Db::name('admin_user')->field('id,realname,password,last_login_time')->where($map)->find();
		return $user;
	}  

	public static function checkAccess($action=null,$controller=null,$module=null){
		$request = Request::instance();
		if(null===$controller){
			$controller = $request->controller();
		}
		if(null===$action){
			$action = $request->action();

		}
		if(null===$module){
			$module =strtoupper($request->module());
		}

		if(self::accessCheck($action,$controller)){
			if(Session::get(Config::get('rbac.admin_auth_key'))){
				return true;
			}else{  
				$user_id = Session::get(Config::get('rbac.user_auth_key'));
				if(!$access_list = Cache::get('access_list_'.$user_id)){
					$access_list = self::getAccessList($user_id);
					Cache::set('access_list_'.$user_id,$access_list,600);
				}
				$controller_arr = explode('.', strtoupper($controller));
				array_unshift($controller_arr, $module);
				array_push($controller_arr, strtoupper($action));
				return self::keyExist($controller_arr,$access_list);
			}
		}else{
			return true;
		}
	}

	private static function keyExist($access,$list){
		$tmp = $list;
		while ($access_key = array_shift($access)) {
			if(isset($tmp[$access_key])){
				$tmp=$tmp[$access_key];
			}else{
				return false;
			}
		}
		return true;
	}

	private static function getAccessList($id){
		$sql = "select node.id,node.pid,node.name from lib_node as node,lib_admin_role_user as user,lib_admin_role as role,lib_admin_access as access where user.user_id='{$id}' and role.id = user.role_id and access.role_id=role.id and access.node_id=node.id and role.status=1 and node.status=1";

		$nodes = Db::query($sql);
		$tree = list_to_tree($nodes);
		if(!empty($tree)){
			$tree = self::accessTree($tree);
		}
		return $tree;
	}

	private static function accessTree($tree=[]){
		$access=[];
		foreach ($tree as $key => $value) {
			if(!empty($value['_child'])){
				$access[strtoupper($value['name'])]=self::accessTree($value['_child']);
			}else{
				$access[strtoupper($value['name'])]=[];
			}
		}
		return $access;
	} 

	private static function accessCheck($action,$controller){
		$controller_arr=[];
		$controller_arr['no'] = explode(',',Config::get('rbac.uncheck_controller'));
		$controller_arr['yes'] = explode(',',Config::get('rbac.check_controller'));


		if($controller_arr['no'] && !in_array($controller, $controller_arr['no']) || $controller_arr['yes'] && in_array($controller, $controller_arr['yes'])){

			$action_arr=[];
			$action_arr['no'] = explode(',',Config::get('rbac.uncheck_action'));
			$action_arr['yes'] = explode(',',Config::get('rbac.check_action'));

			if($action_arr['no'] && !in_array($action, $action_arr['no']) || $action_arr['yes'] && in_array($action, $action_arr['yes'])){
				return true;
			}else{
				return false;
			}

		}else{
			return false;
		}
	}
}