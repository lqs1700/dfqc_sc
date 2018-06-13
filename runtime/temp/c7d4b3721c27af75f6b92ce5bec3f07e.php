<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\wamp64\www\dfqc_sc\public/../application/index\view\theme\index.html";i:1528869386;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="__STATIC__/css/list.css" rel="stylesheet" type="text/css" />
    <link href="__STATIC__/css/listType.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h3>分	类	列	表</h3>
<table cellspacing="1">
    <tr>
        <th style="width:5%;">ID 号</th>
        <th style="width:10%;">主 题 名 称</th>
        <th style="width:10%;">主 题 图 片</th>
        <th style="width:10%;">操 作</th>
    </tr>

    <?php if(is_array($theme) || $theme instanceof \think\Collection || $theme instanceof \think\Paginator): $i = 0; $__LIST__ = $theme;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo $value['id']; ?></td>
        <td><?php echo $value['description']; ?></td>
        <td><img src="__STATIC__/img/<?php echo $value['url']; ?>" alt=""></td>
        <td>
            <a href="<?php echo url('theme/addthemeproduct'); ?>?id=<?php echo $value['id']; ?>">添加产品</a>
            <a href="<?php echo url('theme/del'); ?>?id=<?php echo $value['id']; ?>&&image_id=<?php echo $value['topic_image_id']; ?>">删除</a>
        </td>
    </tr>
   <?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<?php echo $page; ?>
</body>
</html>