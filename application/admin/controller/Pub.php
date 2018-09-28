<?php
namespace app\admin\controller;
use think\Session;
use think\Config;
use think\Url;
use think\View;
use think\Request;
use think\Loader;
use think\Db;

class Pub{

		use \traits\controller\Jump;
	
		protected $view;
		protected $request;

		public function __construct(){

			defined('UID') or define('UID',Session::get(Config::get('rbac.user_auth_key')) );
			
			if(null==$this->view){
				$this->view = View::instance(Config::get('template'),Config::get('view_replace_str')); 
			}

			if(null==$this->request){
				$this->request = Request::instance();
			}
		}

		public function login(){
			if(null!==UID){
				$this->redirect(Url::build('Index/index'));
			}else{
				return $this->view->fetch();
			}
		}


		public function login_frame(){
			if(Session::has(Config::get('rbac.user_auth_key'))){
				$this->redirect(Url::build('Index/index'));
			}else{
				return $this->view->fetch();
			}	
		}

		public function checkLogin(){
			$form_data = $this->request->only(['account','password'],'post');

			if($this->request->isAjax() && $this->request->isPost()){
				$validate =  Loader::validate('Pub');
				if($validate->scene('login')->check($form_data)){
					$map['status']=1;
					$map['account'] = $form_data['account'];
					$user = \Rbac::authenticate($map);
					if(null!==$user){
						if($user['password']===tp_hash_password($form_data['password'])){
							
							Session::set('realName',$user['realname']);
							Session::set('last_login_time',$user['last_login_time']); 
							Session::set(Config::get('rbac.user_auth_key'),$user['id']);

							if($user['id']==1){
								Session::set(Config::get('rbac.admin_auth_key'),true);
							}

							Db::name('admin_user')->where('id',$user['id'])->update([
								'login_account'=>Db::raw('login_account+1'),
								'last_login_time'=>time()
							]);

 
							return ajax_return_adv('登陆成功','current',Url::build('Index/index'));
						}else{
							return ajax_return_adv_error('密码错误');
						}
					}else{
						return ajax_return_adv_error('帐号错误，或者该帐号被禁用');
					}

				}else{
					return ajax_return_adv_error($validate->getError());
				}
			}
		}

		public function info(){
			if($this->request->isAjax() && $this->request->isPost()){
				$form_data = $this->request->only(['account','realname','email'],'post');
				$validate = Loader::validate('Pub');

				if($validate->scene('info')->check($form_data)){
					if(false!==Db::name('admin_user')->where('id',UID)->update($form_data)){
						return ajax_return_adv();
					}else{
						return ajax_return_adv_error();
					}
				}else{
					return ajax_return_adv_error($validate->getError());
				}

			}else{
				$info = Db::name('admin_user')->field('account,realname,email')->where('id',UID)->find();
				$this->view->assign('info',$info);
				return $this->view->fetch();
			}		
		}

		public function password(){
			if($this->request->isAjax() && $this->request->isPost()){
				$form_data = $this->request->only(['password','repeat_password'],'post');
				$validate = Loader::validate('Pub');
				if($validate->scene('password')->check($form_data)){
					if($form_data['password']==$form_data['repeat_password']){
						if(false!==Db::name('admin_user')->where('id',UID)->update(['password'=>tp_hash_password($form_data['password'])])){
							return ajax_return_adv();
						}else{
							return ajax_return_adv_error();
						}
					}else{
						return ajax_return_adv_error('重复密码与新密码不相同');
					}
				}else{
					return ajax_return_adv_error($validate->getError());
				}

			}else{
				return $this->view->fetch();
			}		
		}

		public function logout(){
			if(null==UID){
				return ajax_return_adv('你已经退出了','current',Url::build('Pub/login'));
			}else{
				Session::clear();
				return ajax_return_adv('退出成功','current',Url::build('Pub/login'));
			}
		}
}
