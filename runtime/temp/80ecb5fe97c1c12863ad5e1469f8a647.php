<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"/usr/local/apache/htdocs/public/../application/admin/view/pub/info.html";i:1536979322;s:66:"/usr/local/apache/htdocs/application/admin/view/template/base.html";i:1537011502;}*/ ?>
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
    
</head>
<body style="padding: 10px 20px">

<div class="login-box">
    <form class="layui-form layui-form-pane" method="get" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">账号：</label>

            <div class="layui-input-inline">
                <input type="text" name="account" class="layui-input" lay-verify="required" required placeholder="账号"
                       autocomplete="on" maxlength="20" value="<?php echo (isset($info['account']) && ($info['account'] !== '')?$info['account']:''); ?>" />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">真实姓名：</label>

            <div class="layui-input-inline">
                <input type="text" name="realname" class="layui-input" required lay-verify="required" placeholder="真实姓名"
                       autocomplete="on" maxlength="20" value="<?php echo (isset($info['realname']) && ($info['realname'] !== '')?$info['realname']:''); ?>"/>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱：</label>

            <div class="layui-input-inline">
                <input type="text" name="email" required class="layui-input" lay-verify="email" placeholder="邮箱"
                       autocomplete="on" value="<?php echo (isset($info['email']) && ($info['email'] !== '')?$info['email']:''); ?>"/>
            </div>
        </div>
        
        <div class="layui-form-item">
            <button style="width: 100%" type="button" class="layui-btn btn-submit" lay-submit lay-filter="sub_info">确定</button>
        </div>
    </form>
</div>

</body>
<script type="text/javascript">
    
  layui.use(['form'], function () {

        // 操作对象
        var form = layui.form,
          $ = layui.jquery

       form.on('submit(sub_info)',function(data){
          $.post("<?php echo \think\Request::instance()->action(); ?>",data.field,function(res){
            ajax_process(res);
          })
          return false;
       })

    });

</script>
</html>
