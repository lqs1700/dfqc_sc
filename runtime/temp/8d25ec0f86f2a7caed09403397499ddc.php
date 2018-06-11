<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\wamp64\www\dfqc_sc\public/../application/index\view\index\index.html";i:1527907960;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>东方启辰</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="__STATIC__/css/adminStyle.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="__STATIC__/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(
                function() {
                    $(".div2").click(
                            function() {
                                $(this).next("ul").slideToggle("slow").siblings(
                                        ".div3:visible").slideUp("slow");
                                $(this).next("ul").find("li").removeClass("current_li");
                            });
                    $(".a").click(
                            function(){
                                $(this).parent().addClass("current_li").siblings().removeClass("current_li");
                            });
                });

        function openurl(url) {
            var rframe = parent.document.getElementById("rightFrame");
            rframe.src = url;
        }
    </script>
</head>
<body>
<div class="top2">
    <div class="logo">
        <a href="<?php echo url('index/index'); ?>"><img src="__STATIC__/img/gw_logo.png" /></a>
    </div>
    <div class="fr top-link">
        <a href="<?php echo url('login/index'); ?>" target="mainCont" title="DeathGhost">退出登陆</a>
    </div>
</div>
<div class="left">
    <div class="div1">
        <div class="div2">
            <img src="__STATIC__/img/xiao7.png">
            帐号管理
        </div>
        <ul class="div3">
            <li><a class="a" href="<?php echo url('admin_user/index'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">后台帐号</a>
            </li>
            <li><a class="a" href="<?php echo url('admin_user/add'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">添加帐号</a>
            </li>
        </ul>

        <div class="div2">
            <img src="__STATIC__/img/xiao2.png">
            分类管理
        </div>
        <ul class="div3">
            <li><a class="a" href="<?php echo url('category/index'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">分类列表</a>
            </li>
            <li><a class="a" href="<?php echo url('category/add'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">分类添加</a>
            </li>
        </ul>

        <div class="div2">
            <img src="__STATIC__/img/xiao9.png">
            产品版本
        </div>
        <ul class="div3">
            <li><a class="a" href="<?php echo url('version/index'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">版本列表</a>
            </li>
            <li><a class="a" href="<?php echo url('version/add'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">版本添加</a>
            </li>
        </ul>

        <div class="div2">
            <img src="__STATIC__/img/xiao8.png">
            产品系列
        </div>
        <ul class="div3">
            <li><a class="a" href="<?php echo url('serious/index'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">系列列表</a>
            </li>
            <li><a class="a" href="<?php echo url('serious/add'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">系列添加</a>
            </li>
        </ul>

        <div class="div2">
            <img src="__STATIC__/img/xiao4.png">
            产品管理
        </div>
        <ul class="div3">
            <li><a class="a" href="<?php echo url('product/index'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">产品列表</a>
            </li>
            <li><a class="a" href="<?php echo url('product/add'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">产品添加</a>
            </li>
        </ul>

        <div class="div2">
            <img src="__STATIC__/img/xiao1.png">
            轮播管理
        </div>
        <ul class="div3">
            <li><a class="a" href="<?php echo url('banner/index'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">轮播列表</a>
            </li>
            <li><a class="a" href="<?php echo url('banner/add'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">轮播添加</a>
            </li>
        </ul>

        <div class="div2">
            <img src="__STATIC__/img/xiao6.png">
            图片管理
        </div>
        <ul class="div3">
            <li><a class="a" href="<?php echo url('image/index'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">图片列表</a>
            </li>
        </ul>

        <div class="div2">
            <img src="__STATIC__/img/xiao3.png">
            主题管理
        </div>
        <ul class="div3">
            <li><a class="a" href="<?php echo url('theme/index'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">主题列表</a>
            </li>
            <li><a class="a" href="<?php echo url('theme/add'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">主题添加</a>
            </li>
            <li><a class="a" href="<?php echo url('theme/themeproduct'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">主题产品</a>
            </li>
        </ul>

        <div class="div2">
            <img src="__STATIC__/img/xiao12.png">
            订单管理
        </div>
        <ul class="div3">
            <li><a class="a" href="<?php echo url('order/index'); ?>" target="rightFrame"
                   onClick="openurl('videoQuery.html');">订单列表</a>
            </li>
        </ul>
    </div>
</div>
<div class="right" style="width: 88%;">
    <iframe id="rightFrame" src="<?php echo url('index/backendindex'); ?>" name="rightFrame" width="100%" height="100%"
            scrolling="auto" marginheight="0" marginwidth="0" align="center"
            style="background-color: white;border: 5px solid #d2d0d0; margin: 0 auto; padding: 0;">
    </iframe>
</div>
</body>
</html>