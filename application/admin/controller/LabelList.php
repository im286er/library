<?php
namespace app\admin\controller;
use app\admin\Controller;
use think\Db;
class LabelList extends Controller{
	use \app\admin\traits\controller\Controller;

	protected function before_isdelete(){
		return [1,2];
	}
}