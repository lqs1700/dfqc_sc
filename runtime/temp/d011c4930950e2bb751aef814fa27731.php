<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"E:\wamp64\www\dfqc_sc\public/../application/index\view\admin_user\index.html";i:1527847115;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="__STATIC__/css/list.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>管 	理  员	列	表</h3>
<table cellspacing="1">
	<tr>
		<th>ID 号</th>
		<th>登 陆 帐 号</th>
		<th>操 作</th>
	</tr>
	<?php if(is_array($prigou) || $prigou instanceof \think\Collection || $prigou instanceof \think\Paginator): $i = 0; $__LIST__ = $prigou;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
	<tr>
		<td><?php echo $value['id']; ?></td>
		<td><?php echo $value['app_id']; ?></td>
		<td>
			<a href="<?php echo url('admin_user/edit'); ?>?id=<?php echo $value['id']; ?>">修改</a>
			<a href="<?php echo url('admin_user/del'); ?>?id=<?php echo $value['id']; ?>">删除</a>
		</td>
	</tr>
	<?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div class="clear"></div>
</body>
</html>