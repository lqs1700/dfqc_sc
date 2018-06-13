<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\wamp64\www\dfqc_sc\public/../application/index\view\product\edit.html";i:1528868631;}*/ ?>
<meta charset="utf-8" />
<link href="__STATIC__/css/add.css" rel="stylesheet" type="text/css" />
<form action="<?php echo url('product/edit'); ?>?id=<?php echo $product['id']; ?>" method="POST" enctype="multipart/form-data">
	<table style="width: 68%;">
		<tr>
			<td>产品分类：</td>
			<td>
				<select name="category_id">
					<?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
					<option value=<?php echo $val['id']; if($product['category'] ==$val['name']): ?> selected <?php endif; ?> ><?php echo $val['name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>产品版本：</td>
			<td>
				<select name="version_id">
					<option value="0">无</option>
					<?php if(is_array($version) || $version instanceof \think\Collection || $version instanceof \think\Paginator): $i = 0; $__LIST__ = $version;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
					<option value=<?php echo $val['id']; if($product['version'] ==$val['name']): ?> selected <?php endif; ?> ><?php echo $val['name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>产品系列：</td>
			<td>
				<select name="serious_id">
					<option value="0">无</option>
					<?php if(is_array($serious) || $serious instanceof \think\Collection || $serious instanceof \think\Paginator): $i = 0; $__LIST__ = $serious;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
					<option value=<?php echo $val['id']; if($product['serious'] ==$val['name']): ?> selected <?php endif; ?> ><?php echo $val['name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</td>
		</tr>

		<tr>
			<td>产品名称：</td>
			<td><input type="text" name="name" required value="<?php echo $product['name']; ?>" /></td>
		</tr>

		<tr>
			<td>产品价格：</td>
			<td><input type="text" name="price" required value="<?php echo $product['price']; ?>" /></td>
		</tr>

		<tr>
		<td>产品库存：</td>
		<td><input type="text" name="stock" required value="<?php echo $product['stock']; ?>" /></td>
		</tr>

		<tr>
			<td>产品图片：</td>
			<td><input type="file" name="image" id="file" class="main_image_url" style="opacity: 0"/>
				<input type="text" value="<?php echo $product['image']; ?>" style="width: 215px;height:28px;position: relative;right: 258px;" id="text" class="filetext"/>
				<button id="fileSpan" type="button" class="xiugaibtn" style="position: relative;right: 263px;height:28px;top:1px;">修改</button>
			</td>
		</tr>
		<tr>
			<td>详情图片：</td>
			<td>
				<select name="detail_image">
					<option value="1" <?php if($product['detail_image']=="1"): ?> selected <?php endif; ?> >车机详情</option>
					<option value="2" <?php if($product['detail_image']=="2"): ?> selected <?php endif; ?>>云镜详情</option>
				</select>
			</td>
		</tr>

		<tr>
			<td class="tijiao"><input type="submit" value="修 改" /><input type="reset" value="取 消" /></td>
		</tr>
	
	</table>
</form>

<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>	

<script type="text/javascript">
		var file = document.getElementById("file");  
        var text = document.getElementById("text");  
        $("#fileSpan").click(function(){    
            file.click();  
        });  
        file.onchange = type;
        function type(){text.value = file.value;} 
</script>
