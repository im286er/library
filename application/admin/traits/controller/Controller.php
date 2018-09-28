<?php
namespace app\admin\traits\controller;
use think\Loader;


trait Controller{
	public function index(){
		if($this->request->isAjax()){
			$model = $this->getModel();
			if(!empty($model)){
				$map = $this->getMap(['isdelete'=>0],$model);
				if(null!==$this->request->param('name')){
					$map['name']=['like','%'.$this->request->param('name').'%'];
				}
				if(null!==$this->request->param('account')){
					$map['account']=['like','%'.$this->request->param('account').'%'];
				}
				return $this->dataList($map,$model);
			}
		}else{
			return $this->view->fetch();
		}
	}

	public function add(){
		if($this->request->isAjax() && $this->request->isPost()){
			$form_data = $this->request->post();
			$validate = Loader::validate($this->request->controller());
			if($validate->scene('add')->check($form_data)){
				$model = $this->getModel();
				if(false!=$model->data($form_data)->save()){
					return ajax_return_adv('操作成功','parent'); 
				}else{
					return ajax_return_adv_error();
				}
			}else{
				return ajax_return_adv_error($validate->getError());
			}
		}else{
			$before_action = 'before_add';
			if(method_exists($this, $before_action)){
				$this->$before_action();
			}
			return $this->view->fetch('edit');
		}
	}

	public function edit(){
		if($this->request->isAjax() && $this->request->isPost()){
 			$form_data = $this->request->post();
 			$validate = Loader::validate($this->request->controller());
			if($validate->scene('add')->check($form_data)){
				$model = $this->getModel();
				if(false!==$model->save($form_data,['id'=>$form_data['id']])){
					return ajax_return_adv('操作成功','parent'); 
				}else{
					return ajax_return_adv_error();
				}
			}else{
				return ajax_return_adv_error($validate->getError());
			}
		}else{
			$before_action = 'before_edit';
				if(method_exists($this, $before_action)){
					$this->$before_action();
			}
			$id = $this->request->param('id');
			$model = $this->getModel();
			$info = $model->where('id',$id)->find();
			$this->view->assign('info',$info);
			return $this->view->fetch();
		}
	}

	public function recycle(){
		if($this->request->isAjax()){
			$model = $this->getModel();
			if(!empty($model)){
				$map = $this->getMap(['isdelete'=>1],$model);
				if(null!==$this->request->param('name')){
					$map['name']=['like','%'.$this->request->param('name').'%'];
				}
				return $this->dataList($map,$model);
			}
		}else{
			return $this->view->fetch();
		}
	}

	public function forbid(){
		return $this->update_filed(['status'=>0]);	
	}

	public function normal(){
		return $this->update_filed(['status'=>1]);	
	}

	public function isdelete(){
		return $this->update_filed(['status'=>0,'isdelete'=>1]);	
	}

	public function recover(){
		return $this->update_filed(['status'=>1,'isdelete'=>0],'parent');	
	}

	private function update_filed($map,$redirect=''){
		if($this->request->isAjax() && $this->request->isPost()){
			$str_arr = explode(',', $this->request->post('checked_str'));
			if(!empty($str_arr)){

				$forbid_arr =[];
				$before_action = 'before_'.$this->request->action();
				if(method_exists($this,$before_action)){
					$forbid_arr = $this->$before_action();
				}
				
				foreach ($str_arr as $key => $value) {
					if(in_array($value, $forbid_arr)){
						unset($str_arr[$key]);
					}
				}

				$model = $this->getModel();
				
				if(false!==$model->where(['id'=>['in',$str_arr]])->update($map)){
					if(empty($redirect)){
						return ajax_return_adv();
					}else{
						return ajax_return_adv('操作成功',$redirect);
					}
				}else{
					return ajax_return_adv_error();
				}
			}
		}
	}

	public function delete(){
		if($this->request->isAjax() && $this->request->isPost()){
			$str_arr = explode(',', $this->request->post('checked_str'));
			if(!empty($str_arr)){
				$model = $this->getModel();
				if(false!=$model->where(['id'=>['in',$str_arr]])->delete()){
					return ajax_return_adv('Yes','current','',false);
				}else{
					return ajax_return_adv_error();
				}
			}
		}
	}
}
