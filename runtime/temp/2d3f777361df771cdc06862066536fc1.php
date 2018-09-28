<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"/usr/local/apache/htdocs/public/../application/admin/view/pub/login.html";i:1536805186;s:66:"/usr/local/apache/htdocs/application/admin/view/template/base.html";i:1537011502;}*/ ?>
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

<div class="login-main">
    <header class="layui-elip">后台登录</header>
    <form class="layui-form">
        <div class="layui-input-inline">
            <input type="text" name="account" required lay-verify="required" placeholder="帐号" autocomplete="off"
                   class="layui-input">
        </div>
        <div class="layui-input-inline">
            <input type="password" name="password" required lay-verify="required" placeholder="密码" autocomplete="off"
                   class="layui-input">
        </div>
        <div class="layui-input-inline login-btn">
            <button lay-submit  lay-filter='login_btn' class="layui-btn">登录</button>
        </div>
        <hr/>
    </form>
</div>

</body>
<script type="text/javascript">
    
layui.use(['form','layer'], function () {

        // 操作对象
        var form = layui.form
                , $ = layui.jquery
                ,layer = layui.layer

       form.on('submit(login_btn)',function(data){
          $.post("<?php echo \think\Url::build('Pub/checkLogin'); ?>",data.field,function(res){
            ajax_process(res);
          })
          return false;
       })

    });

</script>
</html>
