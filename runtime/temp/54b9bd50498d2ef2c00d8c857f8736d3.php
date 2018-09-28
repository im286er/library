<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"/usr/local/apache/htdocs/public/../application/index/view/index/detail.html";i:1537625270;s:66:"/usr/local/apache/htdocs/application/index/view/template/base.html";i:1537622998;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>MissWeb极简社区</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="keywords" content="MissWeb前端社区">
  <meta name="description" content="MissWrb社区是模块化前端UI框架Layui的社区，致力于为web开发提供强劲动力">
 <link rel="stylesheet" type="text/css" href="/static/index/res/css/bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="/static/index/res/layui/css/layui.css" />
   <link rel="stylesheet" type="text/css" href="/static/index/res/css/global.css" />
  <script type="text/javascript" src="/static/index/res/layui/layui.js"></script>
 
</head>
<body> 
<div class="fly-header layui-bg-black">
  <div class="layui-container">
    <a class="fly-logo" href="<?php echo \think\Url::build('index/Index/index'); ?>">
      <img src="/static/index/res/images/logo.png" alt="layui">
    </a> 
    <ul class="layui-nav fly-nav layui-hide-xs">
      <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
        <li class="layui-nav-item">
          <a href="<?php echo \think\Url::build('Index/index',['label_id'=>$value['id']]); ?>"><?php echo $value['name']; ?></a>
        </li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
</div>
<div class="fly-panel fly-column layui-hide-md">
  <div class="layui-container">
    <ul class="layui-clear">
      <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
        <li class="layui-nav-item">
          <a href="<?php echo \think\Url::build('Index/index',['label_id'=>$value['id']]); ?>"><?php echo $value['name']; ?></a>
        </li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
</div>

<style type="text/css">
  img{
    width: 100%
  }
</style>
<div class="layui-container">
  <div class="layui-row ">
    <div class="layui-col-md12" style="padding: 5px">
    <h1><?php echo $info['name']; ?></h1>
    <hr class="layui-bg-green">
    <div style="line-height: 30px">
    	<?php echo $info['content']; ?>
    </div>
    </div>
  </div>
</div>

<div class="fly-footer">
  <h3>MissWeb welcome for you</h3>
</div>
</body>
<script type="text/javascript">
  
</script>

</html>