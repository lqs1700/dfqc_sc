<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\wamp64\www\dfqc_sc\public/../application/index\view\banner\index.html";i:1527847109;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="__STATIC__/css/list.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>banner	列	表</h3>
<table cellspacing="1">
	<tr>
		<th>ID 号</th>
		<th>图 片 id</th>
		<th>轮 播 位 置</th>
		<th>路 径</th>
		<th>来 自</th>
		<th>操 作</th>
	</tr>
		<?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?>
	<tr>
		<td><?php echo $va['id']; ?></td>
		<td><?php echo $va['img_id']; ?></td>
		<td><?php echo $va['name']; ?></td>
		<td><img src="__STATIC__/img/<?php echo $va['url']; ?>"></td>
		<td><?php if($va['from']=1): ?>本地图片
			<?php else: ?>网络图片
			<?php endif; ?></td>
		<td><a href="<?php echo url('banner/del'); ?>?id=<?php echo $va['id']; ?>&&img_id=<?php echo $va['img_id']; ?>">删除</a></td>
	</tr>
	<?php endforeach; endif; else: echo "" ;endif; ?>
</table>
	<div class="page">
		<?php echo $page; ?>
	</div>
</body>
</html>