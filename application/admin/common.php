<?php
use think\Response;

function ajax_return_adv_error($msg='操作失败',$code=1,$url='',$redirect='',$close=false,$data=[]){
	return ajax_return_adv($msg,$redirect,$url,$close,$code,$data);
}

function ajax_return_adv($msg='操作成功',$redirect='current',$url='',$close=true,$code=0,$data=[]){
	$extend['opt']=['close'=>$close,'redirect'=>$redirect,'url'=>$url];

	return ajax_return($data,$msg,$code,$extend);
}

function ajax_return($data=[],$msg,$code,$extend=[]){
	$arr=['msg'=>$msg,'code'=>$code,'data'=>$data];
	$arr =array_merge($arr,$extend);
	return Response::create($arr,'json');
}

function tp_hash_password($password,$type='md5'){
	return hash($type, $password);
}
