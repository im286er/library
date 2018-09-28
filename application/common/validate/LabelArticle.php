<?php
namespace app\common\validate;
use think\Validate;

class LabelArticle extends Validate{
	protected $rules = [
		'name|标题'=>'require|max:255',
		'remark|文章简介'=>'require',
		'content|文章内容'=>'require'
	];

	protected $secen = [
		'add'=>['name','remark','content']
	];
}
