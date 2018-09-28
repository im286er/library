<?php
namespace app\common\model;
use think\Model;

class LabelList extends Model{
	
	public function getPidAttr($value){
		if($value==0){
			$parentName='顶级节点';
		}else{
			$parent = self::get(function($query) use($value){
				$query->where('id',$value)->field('name');
			});
			$parentName = $parent->data['name'];
		}
		return $parentName;
	}
}
