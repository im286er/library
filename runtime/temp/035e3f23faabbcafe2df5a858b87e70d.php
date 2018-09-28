<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"/data/www/www.tp.cn/public/../application/admin/view/admin_group/index.html";i:1538127139;s:61:"/data/www/www.tp.cn/application/admin/view/template/base.html";i:1538127142;}*/ ?>
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

<div class="my-btn-box">
  <span class="fl"><?php if(\Rbac::checkAccess('add')): ?><a class='layui-btn' onclick="layer_open('新增','/admin/admin_group/add.html')" >增加</a><?php endif ;if(\Rbac::checkAccess('forbid')): ?><a class='layui-btn layui-btn-normal' onclick="cycle_data('/admin/admin_group/forbid.html')" >禁用</a><?php endif ;if(\Rbac::checkAccess('normal')): ?><a class='layui-btn layui-btn-warm' onclick="cycle_data('/admin/admin_group/normal.html')" >正常</a><?php endif ;if(\Rbac::checkAccess('isdelete')): ?><a class='layui-btn layui-btn-danger' onclick="cycle_data('/admin/admin_group/isdelete.html')" >删除</a><?php endif ;if(\Rbac::checkAccess('recycle')): ?><a class='layui-btn' onclick="layer_open('回收站','/admin/admin_group/recycle.html')" >回收站</a><?php endif ;?> </span>
  <span class="fr">
      <span class="layui-form-label">搜索条件：</span>
      <div class="layui-input-inline">
        <input  placeholder="请输入分组名称" class="layui-input" name="search" type="text">
      </div>
      <button class="layui-btn mgl-20" id="search_btn">查询</button>
            
  </span>
</div>
<table id="table"></table>
<script type="text/html" id="bar">
  <?php if(\Rbac::checkAccess('edit')): ?><a class='layui-btn layui-btn-xs' onclick="layer_open('编辑','/admin/admin_group/edit.html?id={{d.id}}')" >编辑</a><?php endif ;if(\Rbac::checkAccess('isdelete')): ?><a class='layui-btn layui-btn-xs layui-btn-danger' onclick="cycle_data('/admin/admin_group/isdelete.html',{{d.id}})" >删除</a><?php endif ;?>
</script>

</body>
<script type="text/javascript">
    
  layui.use(['table','jquery'], function () {
        var table = layui.table,
          $ = layui.jquery

          //第一个实例
       table.render({
          elem: '#table'
          ,height:'full'
          ,cellMinWidth: 100
          ,url:"<?php echo \think\Request::instance()->action(); ?>"
          ,cols: [[
            {type:'checkbox'}
            ,{field:'id', title: 'ID', sort: true,align:'center'}
            , {field:'name',  title: '分组名称',align:'center'}
            , {field:'icon', title: '图标',align:'center',templet:function(d){
                return "<i class='layui-icon "+d.icon+"'></i>"
            }}
            , {field:'sort', title: '排序', sort: true,align:'center'}
            , {field:'status',  title: '状态', sort: true,align:'center',templet:function(d){
                if(d.status==1){
                  return "<i class='layui-icon layui-icon-face-smile'></i>"
                }else{
                  return "<i class='layui-icon layui-icon-face-cry' style='color: red'></i>"
                }
            }}
            ,{title:'操作', toolbar: '#bar',align:'center'}
          ]]
          ,id:'checkData'
          ,page: true
        });

        $("#search_btn").click(function(){
            table.reload('checkData', {
              page: {
                curr: 1 //重新从第 1 页开始
              }
              ,where: {
                  name:$("[name='search']").val()
              }
            });
        })

    });

</script>
</html>
