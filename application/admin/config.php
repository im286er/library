<?php
$rootname = \think\Request::instance()->root();
if (pathinfo($rootname, PATHINFO_EXTENSION) == 'php') {
    $rootname = dirname($rootname);
}

return [
	'template'=>	[
		//	模板引擎类型	支持	php	think	支持扩展
		'type'									=>	'Think',
		//	模板路径
		'view_path'=>	'',
		//	模板后缀
		'view_suffix'		=>	'.html',
		//	预先加载的标签库
		'taglib_pre_load'=>'app\\admin\\taglib\\Tag',	
	],
	'view_replace_str'=>[
		'__FRAME__'=>$rootname.'/static/admin/frame',
		'__JS__'=>$rootname.'/static/admin/js',
	],
	// 异常处理 handle 类 留空使用 \think\exception\Handle
    'exception_handle' => '\\TpException',
];