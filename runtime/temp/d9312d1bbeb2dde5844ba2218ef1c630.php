<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\wamp64\www\dfqc_sc\public/../application/index\view\product\add.html";i:1527847339;}*/ ?>
<meta charset="utf-8" />
<link href="__STATIC__/css/add.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<form action="<?php echo url('add'); ?>" method="POST" enctype="multipart/form-data">
	<table style="width: 69%;">
		<tr>
			<td>产品分类：</td>
			<td>
				<select name="category_id">
					<?php foreach($category as $val):?>
					<option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
					<?php endforeach;?>
				</select>
			</td>
		</tr>

		<tr>
			<td>产品版本：</td>
			<td>
				<select name="version_id">
					<?php foreach($version as $val):?>
					<option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
					<?php endforeach;?>
				</select>
			</td>
		</tr>

		<tr>
			<td>产品系列：</td>
			<td>
				<select name="serious_id">
					<?php foreach($serious as $val):?>
					<option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
					<?php endforeach;?>
				</select>
			</td>
		</tr>

		<tr>
			<td>产品名称：</td>
			<td><input type="text" name="name" required /></td>
		</tr>

		<tr>
			<td>产品价格：</td>
			<td><input type="text" name="price" required /></td>
		</tr>

		<tr>
			<td>产品库存：</td>
			<td><input type="text" name="stock" required /></td>
		</tr>

		<tr>
			<td>产品主图：</td>
			<td><input type="file" name="image" id="file" class="main_image_url" required style="opacity: 0"/>
			<input type="text" style="width: 215px;height:28px;position: relative;right: 258px;" id="text" class="filetext"/>
			<button id="fileSpan" type="button" class="xiugaibtn" style="position: relative;right: 263px;height:28px;top:1px;">上 传</button></td>
		</tr>

		<tr>
			<td class="tijiao"><input type="submit" value="添 加" /><input type="reset" value="取 消" /></td>
		</tr>

	</table>
</form>

<script type="text/javascript">
		var file = document.getElementById("file");  
        var text = document.getElementById("text");  
        $("#fileSpan").click(function(){    
            file.click();  
        });  
        file.onchange = type;
        function type(){text.value = file.value;} 
</script>