<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function list_to_tree($list=[],$root=0,$pid='pid',$pk='id',$child="_child"){
	$refer = [];
	$tree=[];
	foreach ($list as $key => $value) {
		$refer[$value['id']] = &$list[$key];
	}

	foreach ($list as $key => $value) {
		if(!isset($value[$child])){
			$list[$key][$child] = [];
		}

		if($value[$pid]==$root){
			$tree[] = &$list[$key];
		}else{
			$parent = &$refer[$value[$pid]];
			$parent[$child][] = &$list[$key];
		}
	}

	return $tree;
}