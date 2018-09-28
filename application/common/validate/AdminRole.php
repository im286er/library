<?php
namespace app\common\validate;
use think\Validate;

class AdminRole extends Validate{
	protected $rules = [
		'name|名称'=>'require|max:20',
	];

	protected $secen = [
		'add'=>['name']
	];
}
