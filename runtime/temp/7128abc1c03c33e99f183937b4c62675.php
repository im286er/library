<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"/data/www/www.tp.cn/public/../application/index/view/index/index.html";i:1538127135;s:61:"/data/www/www.tp.cn/application/index/view/template/base.html";i:1538127136;}*/ ?>
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

<div class="layui-container">
  <div class="layui-row ">
    <div class="layui-col-md12">
        <div class="layui-container">
        <div class="layui-row layui-col-space15">
          <div class="layui-col-md8">
              <div class="fly-panel">
                <div class="fly-panel-title fly-filter">
                  <a>Aeticle</a>
                </div>
                <ul class="fly-list">
                  <?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
                       <li>
                          <h2>
                            <a class="layui-badge"><?php echo $value['label_id']; ?></a>
                            <a href="<?php echo \think\Url::build('Index/detail',['detail'=>$value['id']]); ?>"><?php echo $value['name']; ?></a>
                          </h2>
                          <div class="fly-list-info">
                            <a href="javascript::" link>
                              <cite><?php echo $value['author_id']; ?></cite>
                            </a>
                            <span><?php echo $value['create_time']; ?></span>
                            <span class="fly-list-nums"> 
                              <i class="iconfont icon-yulan"></i> <?php echo $value['read_account']; ?>
                          </div>
                          <div class="fly-list-badge">
                          </div>
                        </li>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <?php echo $articles->render(); ?>
              </div>
          </div>
          
          <div class="layui-col-md4">
            <div class="fly-panel">
              <h3 class="fly-panel-title">本周热议</h3>
              <ul class="fly-panel-main fly-list-static">
                <?php if(is_array($hot_article) || $hot_article instanceof \think\Collection || $hot_article instanceof \think\Paginator): $i = 0; $__LIST__ = $hot_article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
                    <li>
                      <a  href="<?php echo \think\Url::build('Index/detail',['detail'=>$value['id']]); ?>"><?php echo $value['name']; ?>
                      <span><i class="iconfont icon-yulan"></i><?php echo $value['read_account']; ?></span></a>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="fly-footer">
  <h3>MissWeb welcome for you</h3>
</div>
</body>
<script type="text/javascript">
  
  layui.use(['element','jquery'],function(){
      var element = layui.element
      var $ = layui.jquery

      $(function(){
        $(".layui-tab-title li:first").addClass('layui-this');
       $(".layui-tab-content div:first").addClass('layui-show');
      })
  })

</script>

</html>