<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\wamp64\www\dfqc_sc\public/../application/index\view\product\index.html";i:1528862436;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="__STATIC__/css/list.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>产	品	列	表</h3>
<table cellspacing="1">
	<tr>
		<th style="width:4%;">ID 号</th>
		<th style="width:10%;">分 类</th>
		<th style="width:9%;">版 本</th>
		<th style="width:9%;">系 列</th>
		<th style="width:10%;">名 称</th>
		<th style="width:10%;">价 格</th>
		<th style="width:10%;">库 存</th>
		<th style="width:20%;">主 图</th>
		<th style="width:10%;">操 作</th>
	</tr>
	<?php if(is_array($products) || $products instanceof \think\Collection || $products instanceof \think\Paginator): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
	<tr>
		<td><?php echo $val['id']; ?></td>
		<td><?php echo $val['category']; ?></td>
		<td><?php echo $val['version']; ?></td>
		<td><?php echo $val['serious']; ?></td>
		<td><?php echo $val['name']; ?></td>
		<td><?php echo $val['price']; ?></td>
		<td><?php echo $val['stock']; ?></td>
		<td><img src="__STATIC__/img/<?php echo $val['image']; ?>"></td>
		<td><a href="<?php echo url('product/edit'); ?>?id=<?php echo $val['id']; ?>">修改</a>
		<a href="<?php echo url('product/del'); ?>?id=<?php echo $val['id']; ?>">删除</a></td>
	</tr>
	<?php endforeach; endif; else: echo "" ;endif; ?>
</table>
	<div class="page">
		<?php echo $page; ?>
	</div><!--page end-->
<div class="clear"></div>
</body>
</html>