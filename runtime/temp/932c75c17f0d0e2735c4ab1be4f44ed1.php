<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"/usr/local/apache/htdocs/public/../application/admin/view/label_article/edit.html";i:1537625086;s:66:"/usr/local/apache/htdocs/application/admin/view/template/base.html";i:1537011502;}*/ ?>
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

    <form class="layui-form layui-form-pane">
      <input type="hidden" name="id" value="<?php echo (isset($info['id']) && ($info['id'] !== '')?$info['id']:0); ?>">
      <input type="hidden" name="author_id" value="<?php echo !empty($info['author_id'])?$info->getData('author_id'):UID; ?>">
     
        <div class="layui-form-item">
        <label class="layui-form-label">栏目</label>
        <div class="layui-input-inline">
          <select name="label_id" lay-verify="required">
            <?php if(is_array($parent_nodes) || $parent_nodes instanceof \think\Collection || $parent_nodes instanceof \think\Paginator): $i = 0; $__LIST__ = $parent_nodes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
              <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
      </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题:</label>
            <div class="layui-input-block">
                <input type="text" name="name" class="layui-input" required lay-verify="required" placeholder="标题" autocomplete="on" maxlength="255" value="<?php echo (isset($info['name']) && ($info['name'] !== '')?$info['name']:''); ?>"/>
            </div> 
        </div>
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">文章简介</label>
            <div class="layui-input-block">
              <textarea name="remark" placeholder="请输入内容" maxlength="255" required lay-verify="required" class="layui-textarea"><?php echo (isset($info['remark']) && ($info['remark'] !== '')?$info['remark']:''); ?></textarea>
            </div>
          </div>
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">内容:</label>
            <div class="layui-input-block">
                <textarea  id="article" style="display: none;" ><?php echo (isset($info['content']) && ($info['content'] !== '')?$info['content']:''); ?></textarea>
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

</body>
<script type="text/javascript">
    
  layui.use(['form','layedit'], function () {

        // 操作对象
        var form = layui.form,
          $ = layui.jquery,
         layedit = layui.layedit

          layedit.set({
            uploadImage: {
              url: "<?php echo \think\Url::build('article_upload'); ?>"
            }
          });
        let edit =  layedit.build('article'); //建立编辑器

        $("[name='status'][value=<?php echo isset($info)?($info['status']?1:0):1 ?>]").attr('checked',true)
        $("[name='label_id']").val(<?php echo !empty($info['label_id'])?$info->getData('label_id') :''; ?>)

       
        form.render()

       form.on('submit(sub_info)',function(data){
          let form_data = data.field
          form_data.content = layedit.getContent(edit)
          delete form_data.file

          $.post("<?php echo \think\Request::instance()->action(); ?>",form_data,function(res){
            ajax_process(res);
          })
          return false;
       })

    });

</script>
</html>
