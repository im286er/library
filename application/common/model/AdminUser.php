<?php
namespace app\common\model;
use think\Model;

class AdminUser extends Model{
	public function getLastLoginTimeAttr($value){
		return date('Y-m-d H:m',$value);
	}
}