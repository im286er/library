<?php
namespace app\admin\controller;
use app\admin\Controller;
class AdminGroup extends Controller{
	use \app\admin\traits\controller\Controller;

	protected function before_forbid(){
		return [1,4];
	}
	protected function before_isdelete(){
		return [1,4];
	}
}