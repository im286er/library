<?php
namespace app\common\validate;
use think\Validate;

class AdminGroup extends Validate{
	protected $rules = [
		'name|分组名称'=>'require|max:20',
		'icon|图标'=>'require',
		'sort|排序'=>'require|number'
	];

	protected $secen = [
		'add'=>['name','icon','sort']
	];
}
