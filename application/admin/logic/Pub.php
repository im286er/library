<?php
namespace app\admin\logic;
use think\Request;
use think\Url;
use think\Response;
use think\response\Redirect;
use think\exception\HttpResponseException;

class Pub{

	public static function unLogin(){

		$request = Request::instance();
		$login= Url::build('Pub/login');
		$login_frame = Url::build('Pub/login_frame');
		
		if($request->isAjax()){
			throw new HttpResponseException('登陆超时，请重新登陆',400,$login_frame);
		}else{

			if(strtolower($request->Controller())=='index' && strtolower($request->action())=='index'){

				throw new HttpResponseException(new Redirect($login));
			}else{
				$response = "<script>if(window.parent.frames.length==0){
					window.location=".$login_frame."?callback=".$this->request->url(true).";
				}else{
					parent.login_frame('".$login_frame."');
				};</script>";

				throw new HttpResponseException(new Response($response));
			}
		}
	}
}
