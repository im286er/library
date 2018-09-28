<?php
namespace app\admin\taglib;
use think\template\TagLib;
use think\Loader;  
use think\Url;
 
class Tag extends TagLib{
	protected $tags = [
		'widget'=>['attr'=>'param' ,'close'=>0],
		'menu'=>['close'=>0]
	];
 
	public function tagWidget($tag){
		$param = empty($tag['param'])?'':$tag['param'];
		return "<?php echo \\think\\Loader::action('Index/index',{$param},'widget');?>";
	}

	public function tagMenu($tag){
		$menu = !empty($tag['option'])?explode(',', $tag['option']):['add','forbid','normal','isdelete','recycle'];
		$parse_str = "";
		foreach ($menu as $value) {
			$option = substr($value, 0,1)=='s'? substr($value, 1):$value;
			$url = Url::build($option);
			$parse_str.="<?php if(\Rbac::checkAccess('{$option}')): ?>";
			switch ($value) {
				case 'add':
					$parse_str.="<a class='layui-btn' onclick=\"layer_open('新增','{$url}')\" >增加</a>";
					break;
				case 'forbid':
					$parse_str.="<a class='layui-btn layui-btn-normal' onclick=\"cycle_data('{$url}')\" >禁用</a>";
					break;
				case 'normal':
					$parse_str.="<a class='layui-btn layui-btn-warm' onclick=\"cycle_data('{$url}')\" >正常</a>";
					break;
				case 'isdelete':
					$parse_str.="<a class='layui-btn layui-btn-danger' onclick=\"cycle_data('{$url}')\" >删除</a>";
					break;
				case 'recycle':
					$parse_str.="<a class='layui-btn' onclick=\"layer_open('回收站','{$url}')\" >回收站</a>";
					break;
				case 'recover':
					$parse_str.="<a class='layui-btn' onclick=\"cycle_data('{$url}')\" >恢复</a>";
					break;
				case 'delete':
					$parse_str.="<a class='layui-btn layui-btn-danger' onclick=\"cycle_data('{$url}')\" >彻底删除</a>";
					break;
				case 'sedit':
					$parse_str.="<a class='layui-btn layui-btn-xs' onclick=\"layer_open('编辑','{$url}?id={{d.id}}')\" >编辑</a>";
					break;
				case 'sisdelete':
					$parse_str.="<a class='layui-btn layui-btn-xs layui-btn-danger' onclick=\"cycle_data('{$url}',{{d.id}})\" >删除</a>";
					break;
				case 'saccess':
					$parse_str.="<a class='layui-btn layui-btn-xs' onclick=\"layer_open('权限列表','{$url}?id={{d.id}}')\" >权限列表</a>";
					break;
				case 'suser':
					$parse_str.="<a class='layui-btn layui-btn-warm layui-btn-xs' onclick=\"layer_open('用户列表','{$url}?id={{d.id}}')\" >用户列表</a>";
					break;
				
			}
			$parse_str.="<?php endif ;?>";
		}
		return $parse_str;
	}
	
}
