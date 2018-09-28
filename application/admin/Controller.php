<?php
namespace app\admin;
use think\Session;
use think\Config;
use think\View;
use think\Request;
use app\admin\logic\Pub as PubLogic;
use think\Loader;
use think\Db;
use think\exception\ HttpResponseException;
use think\Response;

class Controller{

	protected $view;
	protected $request;

	//构造函数，命名UID，ADMIN
	public function __construct(){

		defined('UID') or define('UID',Session::get(Config::get('rbac.user_auth_key')) );
		defined('ADMIN') or define('ADMIN',Session::get(Config::get('rbac.admin_auth_key')) );

		if(null==$this->view){
			$this->view = View::instance(Config::get('template'),Config::get('view_replace_str')); 
		}
		if(null==$this->request){
			$this->request = Request::instance();
		}

		if(null==UID){ 
			PubLogic::unLogin();
		}else{
			$this->auth();
		}
	}
 
	private function auth(){
		if(!\Rbac::checkAccess()){
			throw new HttpResponseException(new Response("<script>alert('你没有该操作权限')</script>"));
		}
	}

	protected function getModel(){
		$controller = $this->request->controller();
		$model = '';
		if(class_exists($modelClass=Loader::parseClass('common','model',$controller)) || class_exists($modelClass=Loader::parseClass('common','model',$this->parseTable($controller)))){
			$model = new $modelClass();
		}else{
			$model = Db::name($this->parseTable($controller));
		}
		return $model;
	}

	private function parseTable($controller){
		return str_replace('.', '', $controller);
	}

	protected function getMap($field_arr,$model)
	{
		$map = [];
		$table_field = $model->getTableInfo()['fields'];
		foreach ($field_arr as $key => $value) {
			if(in_array($key, $table_field)){
				$map[$key]=$value;
			}
		}
		return $map;
	}
 
	protected function dataList($map,$model,$_field=null){
		$sort = $this->request->param('_sort')?:$model->getPk();
		$order = $this->request->param('_sort')=='asc'?'asc':'desc';
		$sort_by = $sort.' '.$order;
		$page = $this->request->param('page');
		$limit = $this->request->param('limit');

		$data = $model->field($_field)->where($map)->order($sort_by)->limit(($page-1)*$limit,$limit)->select();
		$total = $model->where($map)->count();

  		return ['code'=>0,'message'=>'','count'=>$total,'data'=>$data];
	}

}
