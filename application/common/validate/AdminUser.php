<?php
namespace app\common\validate;
use think\Validate;

class AdminUser extends Validate{
	protected $rule =[
		'account|帐号'=>"require|max:20|chsAlphaNum",
		'realname|真实姓名'=>'require|max:20',
		'email|邮箱'=>'require|email',
	];

	protected $secen = [
		'add'=>['account','realname','email']
	];
}
