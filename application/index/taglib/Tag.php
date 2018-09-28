<?php
namespace app\index\taglib;
use think\template\TagLib;

class Tag extends TagLib{
	protected $tags = [
			'close'=>['attr'=>'param,formate','close'=>0]
	];

	public function tagClose($tag){
		$param = empty($tag['param'])?time():$tag['param'];
		$formate = empty($tag['formate'])?'Y-m':$tag['formate'];
		return "<?php echo date('".$formate."',".$param.")?>";
	}
}