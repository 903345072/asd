<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/Public/admin/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/Public/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <script type="text/javascript" src="/Public/admin/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/admin/js/action.js"></script>

    <title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商户管理 <span class="c-gray en">&gt;</span> 新增/修改商户 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form class="form form-horizontal" id="form-admin-add" action="?id=<?php echo ($id); ?>" method="post" onsubmit="return ac_from();">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商户账号：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text"  placeholder="用户名" name="name" id="name" value="<?php echo ($adminuserinfo["name"]); ?>">
            </div>
        </div>


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>选择城市：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <select class="inp_1" name="city_id" id="city_id" style="width:150px;margin-right:5px;">
                    <!-- 遍历 -->
                    <option value="">选择城市</option>
                    <?php if(is_array($city_list)): $i = 0; $__LIST__ = $city_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($v["id"] == $adminuserinfo['city_id']): ?>selected="selected"<?php endif; ?>>-- <?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    <!-- 遍历 -->
                </select>
                <br>

            </div>
        </div>


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>详细地址：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text"  placeholder="详细地址" name="address" id="address" value="<?php echo ($adminuserinfo["address"]); ?>">
            </div>
        </div>

   <?php if($id): ?>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>请输入新密码：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" name="password" id="newpassword">
            </div>
        </div>

     <?php else: ?>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商户初始密码：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" name="password" id="password">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>请确认密码：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" name="repassword" id="repassword">
            </div>
        </div>
        <?php endif;?>



        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" name="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                <input type="hidden" name="admin_id" value="<?php echo ($adminuserinfo["id"]); ?>">
            </div>
        </div>
    </form>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/Public/admin/lib/laypage/1.2/laypage.js"></script>

<script>
    function ac_from(){
        var name=document.getElementById('name').value;
        if(!name){
            alert('请输入登录账号！');
            return false;
        }


        if(!<?php echo $id; ?>){
            var password=document.getElementById('password').value;
            if(password.length<6){
                alert('密码长度不能少于6');
                return false;
            }
            var repassword = document.getElementById('repassword').value;
            if (password != repassword){
                alert('两次输入密码必须一致');
                return false;
            }
        }

    }
</script>


</body>
</html>