<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/usr/local/apache/htdocs/public/../application/admin/view/admin_user/edit.html";i:1537011196;s:66:"/usr/local/apache/htdocs/application/admin/view/template/base.html";i:1537011502;}*/ ?>
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

<div>
	<div class="login-box">
    <form class="layui-form layui-form-pane">
      <input type="hidden" name="id" value="<?php echo (isset($info['id']) && ($info['id'] !== '')?$info['id']:0); ?>">
        <div class="layui-form-item">
            <label class="layui-form-label">帐号:</label>
            <div class="layui-input-inline">
                <input type="text" name="account" class="layui-input" required lay-verify="required" placeholder="帐号" autocomplete="on" maxlength="20" value="<?php echo (isset($info['account']) && ($info['account'] !== '')?$info['account']:''); ?>"/>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">姓名:</label>
            <div class="layui-input-inline">
                <input type="text" name="realname" class="layui-input" required lay-verify="required" placeholder="姓名" autocomplete="on" maxlength="20" value="<?php echo (isset($info['realname']) && ($info['realname'] !== '')?$info['realname']:''); ?>"/>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱:</label>
            <div class="layui-input-inline">
                <input type="text" name="email" class="layui-input" required lay-verify="required" placeholder="邮箱" autocomplete="on" maxlength="20" value="<?php echo (isset($info['email']) && ($info['email'] !== '')?$info['email']:''); ?>"/>
            </div>
        </div>
          <div class="layui-form-item">
		    <label class="layui-form-label">状态:</label>
		    <div class="layui-input-block">
		      <input type="radio" name="status" value="1" title="正常">
		      <input type="radio" name="status" value="0" title="禁用">
		    </div>
		  </div>
        
        <div class="layui-form-item">
            <button style="width: 100%" type="button" class="layui-btn btn-submit" lay-submit lay-filter="sub_info">确定</button>
        </div>
    </form>
</div>
</div>

</body>
<script type="text/javascript">
    
  layui.use(['form'], function () {

        // 操作对象
        var form = layui.form,
          $ = layui.jquery

        $("[name='status'][value=<?php echo isset($info)?($info['status']?1:0):1 ?>]").attr('checked',true)
        form.render()

       form.on('submit(sub_info)',function(data){
          $.post("<?php echo \think\Request::instance()->action(); ?>",data.field,function(res){
            ajax_process(res);
          })
          return false;
       })

    });

</script>
</html>
