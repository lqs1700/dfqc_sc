<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\wamp64\www\dfqc_sc\public/../application/index\view\serious\index.html";i:1527847218;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="__STATIC__/css/list.css" rel="stylesheet" type="text/css" />
    <link href="__STATIC__/css/listType.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h3>系	列	列	表</h3>
<table cellspacing="1">
    <tr>
        <th style="width:5%;">ID 号</th>
        <th style="width:10%;">系 列 名 称</th>
        <th style="width:10%;">操 作</th>
    </tr>
    <?php foreach($res as $value):?>
    <tr>
        <td><?php echo $value['id'];?></td>
        <td><?php echo $value['name'];?></td>
        <td><a href="<?php echo url('del'); ?>?id=<?php echo $value['id'];?>">删除</a></td>
    </tr>
    <?php endforeach;?>
</table>
<?php echo $page; ?>
</body>
</html>