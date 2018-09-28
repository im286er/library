<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"/usr/local/apache/htdocs/public/../application/admin/view/pub/password.html";i:1536807774;s:66:"/usr/local/apache/htdocs/application/admin/view/template/base.html";i:1537011502;}*/ ?>
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
            <label class="layui-form-label">新密码：</label>

            <div class="layui-input-inline">
                <input type="password" name="password" class="layui-input" lay-verify="required" required placeholder="新密码" autocomplete="on" maxlength="20"/>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">重复密码：</label>
            <div class="layui-input-inline">
                <input type="password" name="repeat_password" class="layui-input" lay-verify="required" required placeholder="重复密码" autocomplete="on" maxlength="20" />
            </div>
        </div>
        <div class="layui-form-item">
            <button style="width: 100%" type="button" class="layui-btn btn-submit" lay-submit lay-filter="sub_password">确定</button>
        </div>
    </form>
</div>


</body>
<script type="text/javascript">
    
layui.use(['form','layer'], function () {

        // 操作对象
        var form = layui.form
                , $ = layui.jquery
                ,layer = layui.layer

       form.on('submit(sub_password)',function(data){
          $.post("<?php echo \think\Request::instance()->action(); ?>",data.field,function(res){
            ajax_process(res);
          })
          return false;
       })

    });

</script>
</html>
