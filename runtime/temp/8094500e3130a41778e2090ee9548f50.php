<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/usr/local/apache/htdocs/public/../application/admin/view/node/index.html";i:1536996842;s:66:"/usr/local/apache/htdocs/application/admin/view/template/base.html";i:1537011502;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>MissWeb</title>
    <link rel="stylesheet" type="text/css" href="/static/admin/frame/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/frame/static/css/style.css" />
    <script type="text/javascript" src="/static/admin/frame/layui/layui.js"></script>
    <script type="text/javascript" src="/static/admin/js/admin.js"></script>
    <script type="text/javascript" src="/static/admin/frame/zTree/js/jquery-1.4.4.min.js"></script>
    
 <link rel="stylesheet" type="text/css" href="/static/admin/frame/zTree/css/zTreeStyle/zTreeStyle.css" />
 <script type="text/javascript" src="/static/admin/frame/zTree/js/jquery.ztree.core.js"></script>
 <script type="text/javascript" src="/static/admin/frame/zTree/js/jquery.ztree.excheck.js"></script>

</head>
<body style="padding: 10px 20px">

<div class="my-btn-box">
  <span class="fl">
    <a class='layui-btn layui-btn-normal' onclick="sub_data('<?php echo \think\Url::build('forbid'); ?>')" >禁用</a>
    <a class='layui-btn layui-btn-warm' onclick="sub_data('<?php echo \think\Url::build('normal'); ?>')" >正常</a>
  </span>
</div>
<div class="layui-row ">
    <div class="layui-col-md4">
          <fieldset class="layui-elem-field">
            <legend>节点树</legend>
            <div class="layui-field-box" style="height: 300px;overflow-y: auto;">
               <ul id="treeDemo" class="ztree"></ul>
            </div>
          </fieldset>
  </div>
  <div class="layui-col-md6 layui-col-md-offset2">
      <div class="layui-row">
          <fieldset class="layui-elem-field" >
            <legend>模块</legend>
            <div class="layui-field-box" style="height: 100px;overflow-y: auto;">
                <?php if(is_array($modules) || $modules instanceof \think\Collection || $modules instanceof \think\Paginator): $i = 0; $__LIST__ = $modules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
                  <blockquote class="layui-elem-quote">
                      <a href="<?php echo \think\Request::instance()->baseUrl(); ?>?module_id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a>
                  </blockquote>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
          </fieldset>
      </div>
      <div class="layui-row">
         <fieldset class="layui-elem-field">
            <legend>分组</legend>
            <div class="layui-field-box" style="height: 150px;overflow-y: auto;">
                 <?php if(is_array($groups) || $groups instanceof \think\Collection || $groups instanceof \think\Paginator): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
                  <blockquote class="layui-elem-quote" >
                      <a href="<?php echo \think\Request::instance()->baseUrl(); ?>?group_id=<?php echo $value['id']; ?>"><i class="layui-icon <?php echo $value['icon']; ?>"></i><?php echo $value['name']; ?></a>
                  </blockquote>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
          </fieldset>
      </div>
  </div>
</div>

</body>
<script type="text/javascript">
    
let treeObj =null
layui.use(['jquery'],function(){
  var $ = layui.jquery

   var setting = {
          check: {
            enable: true
          },
          data: {
            simpleData: {
              enable: true
            }
          }
        };
        var zNodes =<?php echo $nodes; ?>;
       treeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
})

function sub_data(url){
          var nodes=treeObj.getCheckedNodes(true);
          let id_arr = []
          nodes.forEach(function(item){
            id_arr.push(item.id)
          })
          cycle_data(url,id_arr)
}

</script>
</html>
