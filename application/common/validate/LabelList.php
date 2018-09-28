<?php
namespace app\common\validate;
use think\Validate;

class LabelList extends Validate{
	protected $rules = [
		'name|栏目名称'=>'require|max:20',
		'sort|排序'=>'require|number'
	];

	protected $secen = [
		'add'=>['name','sort']
	];
}
