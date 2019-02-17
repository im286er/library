<?php
$rootname = \think\Request::instance()->root();
if (pathinfo($rootname, PATHINFO_EXTENSION) == 'php') {
    $rootname = dirname($rootname);
}

return [
	'view_replace_str'=>[
		'__RES__'=>'/static/index/res',
		'__JS__'=>'/static/admin/js',
	]
];