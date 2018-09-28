<?php
namespace app\common\model;
use think\Model;
use app\common\model\AdminUser;
use app\common\model\LabelList;

class LabelArticle extends Model{

	protected	$autoWriteTimestamp	=	true;
	
	public function getAuthorIdAttr($value){
		$user = AdminUser::get(function($query) use ($value){
			$query->where('id',$value)->field('account');
		});
		return $user->data['account'];
	}

	public function getLabelIdAttr($value){
		$label = LabelList::get(function($query) use ($value){
			$query->where('id',$value)->field('name');
		});
		return $label->data['name'];
	}
}