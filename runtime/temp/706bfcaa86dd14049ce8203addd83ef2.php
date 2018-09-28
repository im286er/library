<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"/data/www/www.tp.cn/public/../application/admin/view/index/welcome.html";i:1538127142;s:61:"/data/www/www.tp.cn/application/admin/view/template/base.html";i:1538127142;}*/ ?>
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

<div style="text-align: center;margin-top: 100px">
 <h1>MissWeb Welcome You:</h1>
 <h1><?php echo \think\Session::get('realName'); ?></h1>
 <h3>Last login time is <?php echo date("Y-m-d H:m:s",\think\Session::get('last_login_time')); ?></h3>
</div>

</body>
<script type="text/javascript">
    
</script>
</html>
