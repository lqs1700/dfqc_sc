<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"E:\wamp64\www\dfqc_sc\public/../application/index\view\theme\themeproduct.html";i:1527908587;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="__STATIC__/css/list.css" rel="stylesheet" type="text/css" />
    <link href="__STATIC__/css/listType.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h3>主 题 产 品	列	表</h3>
<table cellspacing="1">
    <tr>
        <th style="width:10%;">主 题 名 称</th>
        <th style="width:20%;">主 题 产 品</th>
        <th style="width:10%;">主 题 图 片</th>
    </tr>
    <?php if(is_array($themeproduct) || $themeproduct instanceof \think\Collection || $themeproduct instanceof \think\Paginator): $i = 0; $__LIST__ = $themeproduct;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
    <tr>
        <td>{value.description}</td>
        <td>{value.name}</td>
        <td><img src="__STATIC__/img/{value.url}" alt=""></td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<?php echo $page; ?>
</body>
</html>