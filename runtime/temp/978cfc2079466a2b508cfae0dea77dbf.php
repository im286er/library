<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"/data/www/www.tp.cn/public/../application/admin/view/index/index.html";i:1538127142;s:61:"/data/www/www.tp.cn/application/admin/view/template/base.html";i:1538127142;}*/ ?>
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
    
    <script type="text/javascript" src="/static/admin/frame/static/js/vip_comm.js"></script>

</head>
<body style="padding: 10px 20px">

<!-- layout admin -->
<div class="layui-layout layui-layout-admin"> <!-- 添加skin-1类可手动修改主题为纯白，添加skin-2类可手动修改主题为蓝白 -->
    <!-- header -->
    <div class="layui-header my-header">
        <a href="index.html">
            <!--<img class="my-header-logo" src="" alt="logo">-->
            <div class="my-header-logo">MissWeb</div>
        </a>
        <div class="my-header-btn">
            <button class="layui-btn layui-btn-small btn-nav"><i class="layui-icon layui-icon-align-center"></i></button>
        </div>

        <!-- 顶部右侧添加选项卡监听 -->
        <ul class="layui-nav my-header-user-nav" lay-filter="side-top-right">
            <li class="layui-nav-item">
                <a class="name" href="javascript:;"><i class="layui-icon">&#xe629;</i>主题</a>
                <dl class="layui-nav-child">
                    <dd data-skin="0"><a href="javascript:;">默认</a></dd>
                    <dd data-skin="1"><a href="javascript:;">纯白</a></dd>
                    <dd data-skin="2"><a href="javascript:;">蓝白</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo \think\Url::build('index/Index/index'); ?>">前台</a>
            </li>
            <li class="layui-nav-item">
                <a class="name" href="javascript:;"><img src="http://t2.hddhhn.com/uploads/tu/201612/98/st93.png" alt="logo"> <?php echo \think\Session::get('realName'); ?> </a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" onclick="layer_open('个人信息','<?php echo \think\Url::build('Pub/info'); ?>')">个人信息</a></dd>
                    <dd><a href="javascript:;" onclick="layer_open('修改密码','<?php echo \think\Url::build('Pub/password'); ?>')">修改密码</a></dd>
                    <dd><a href="javascript:;" id="logout_btn">退出</a></dd>
                </dl>
            </li>
        </ul>

    </div>
    <!-- side -->
    <div class="layui-side my-side">
        <div class="layui-side-scroll">
            <!-- 左侧主菜单添加选项卡监听 -->
            <ul class="layui-nav layui-nav-tree" lay-filter="side-main">
                <?php if(is_array($groups) || $groups instanceof \think\Collection || $groups instanceof \think\Paginator): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
                    <li class="layui-nav-item ">
                    <a href="javascript:;"><i  class="layui-icon <?php echo $value['icon']; ?>"></i><?php echo $value['name']; ?></a>
                    <dl class="layui-nav-child">
                        <?php if(is_array($menus[$value['id']]) || $menus[$value['id']] instanceof \think\Collection || $menus[$value['id']] instanceof \think\Paginator): $i = 0; $__LIST__ = $menus[$value['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$opt): $mod = ($i % 2 );++$i;?>
                             <?php echo \think\Loader::action('Index/index',['list'=>$opt],'widget');endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

        </div>
    </div>
    <!-- body -->
    <div class="layui-body my-body">
        <div class="layui-tab layui-tab-card my-tab" lay-filter="card" lay-allowClose="true">
            <ul class="layui-tab-title">
                <li class="layui-this" lay-id="1"><span><i class="layui-icon">&#xe638;</i>欢迎页</span></li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <iframe id="iframe" src="<?php echo \think\Url::build('welcome'); ?>" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="layui-footer my-footer">
        MissWeb
    </div>
</div>

<!-- 右键菜单 -->
<div class="my-dblclick-box none">
    <table class="layui-tab dblclick-tab">
        <tr class="card-refresh">
            <td><i class="layui-icon">&#x1002;</i>刷新当前标签</td>
        </tr>
        <tr class="card-close">
            <td><i class="layui-icon">&#x1006;</i>关闭当前标签</td>
        </tr>
        <tr class="card-close-all">
            <td><i class="layui-icon">&#x1006;</i>关闭所有标签</td>
        </tr>
    </table>
</div>

</body>
<script type="text/javascript">
    
layui.use(['layer'], function () {

    // 操作对象
    var layer       = layui.layer,
        $ = layui.jquery;
      
        $("#logout_btn").click(function(){
           layer.confirm('您确定要退出吗？', {
              btn: ['是的','再考虑一下']
            }, function(){
                $.post("<?php echo \think\Url::build('Pub/logout'); ?>",function(res){
                    ajax_process(res)
                })
            }
            );
        })
});

</script>
</html>
