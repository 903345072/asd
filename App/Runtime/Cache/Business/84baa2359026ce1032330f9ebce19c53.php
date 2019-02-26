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
    <script type="text/javascript" src="/Public/admin/js/action.js"></script>
    <script type="text/javascript" src="/Public/admin/js/jquery.js"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/Public/admin/lib/respond.min.js"></script>

    <![endif]-->

    <link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/css/style.css" />
    <link href="/Public/admin/css/main.css" rel="stylesheet" type="text/css" />

    <!--[if IE 6]>
    <script type="text/javascript" src="/Public/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->

    <script type="text/css">
        .Hui-article-box {
            position: absolute;
            top: 10px;
            right: 0;
            bottom: 0;
            left: 199px;
            overflow: hidden;
            z-index: 1;
            background-color: #fff;
        }
    </script>
    <title>小程序商城后台管理系统</title>
</head>
<body>
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="#">小程序商城后台管理系统</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a>


            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li><?php echo $_SESSION['businessinfo']['name']; ?></li>
                    <li><a href="<?php echo U('Login/logout');?>">退出</a></li>


                </ul>
            </nav>
        </div>
    </div>
</header>

<aside class="Hui-aside">
  <div class="menu_dropdown bk_2">
    <dl id="verifycate">
      <dt>
        <i class="Hui-iconfont">&#xe616;</i>核销管理<i
          class="Hui-iconfont menu_dropdown-arrow"
          >&#xe6d5;</i
        >
      </dt>
      <dd>
        <ul>
          <li>
            <a
              data-title="订单核销"
              data-href="<?php echo U('verificate/index');?>"
              href="<?php echo U('verificate/index');?>"
              target="iframe"
              >订单核销</a
            >
          </li>
        </ul>
      </dd>
    </dl>

    <dl id="order">
      <dt>
        <i class="Hui-iconfont">&#xe616;</i>订单管理<i
              class="Hui-iconfont menu_dropdown-arrow"
      >&#xe6d5;</i
      >
      </dt>
      <dd>
        <ul>
          <li>
            <a
                    data-title="订单列表"
                    data-href="<?php echo U('order/index');?>"
                    href="<?php echo U('order/index');?>"
                    target="iframe"
            >订单列表</a
            >
          </li>
        </ul>
      </dd>
    </dl>





  </div>
</aside>



<section class="Hui-article-box">

    <div id="iframe_box" class="Hui-article">
        <div class="show_iframe">
            <iframe src='<?php echo U("Page/adminindex");?>' id='iframe' name='iframe'></iframe>
        </div>
    </div>
</section>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/admin/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
    $(function(){
        /*$("#min_title_list li").contextMenu('Huiadminmenu', {
         bindings: {
         'closethis': function(t) {
         console.log(t);
         if(t.find("i")){
         t.find("i").trigger("click");
         }
         },
         'closeall': function(t) {
         alert('Trigger was '+t.id+'\nAction was Email');
         },
         }
         });*/
    });



</script>

</body>
</html>