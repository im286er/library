<?php
use think\Request;
use	think\exception\Handle;
use	think\exception\HttpException;
class TpException extends Handle{
	public function render(Exception $e){
		if($e instanceof HttpException){
			http_response_code($e->getStatusCode());
		}

		if(Request::instance()->isAjax()){
			$error_code = $this->getCode($e) ?: 1;
			return ajax_return_adv_error($this->getMessage($e), $error_code);
		}

		return parent::render($e);
	}
}