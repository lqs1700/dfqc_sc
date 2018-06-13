<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\wamp64\www\dfqc_sc\public/../application/index\view\image\index.html";i:1528711016;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="__STATIC__/css/list.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>图 片 列 表</h3>
<table cellspacing="1">
    <tr>
        <th>ID 号</th>
        <th>图 片</th>
        <th>名 称</th>
    </tr>
    <?php if(is_array($image) || $image instanceof \think\Collection || $image instanceof \think\Paginator): $i = 0; $__LIST__ = $image;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo $val['id']; ?></td>
        <td><img src="__STATIC__/img/<?php echo $val['url']; ?>" alt=""></td>
        <td><?php echo $val['url']; ?></td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<?php echo $page; ?>
</body>
</html>