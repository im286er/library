<?php
namespace app\common\validate;
use think\Validate;

class Pub extends Validate{
	protected $rule =[
		'account|帐号'=>"require|max:20|chsAlphaNum",
		'password|密码'=>"require|max:20",
		'realname|真实姓名'=>'require|max:20',
		'email|邮箱'=>'require|email',
		'repeat_password|重复新密码'=>'require|max:20'
	];

	protected $scene = [
		'login'=>['account','password'],
		'info'=>['account','realname','email'],
		'password'=>['password','repeat_password']
	];
}
