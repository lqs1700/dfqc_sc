<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"E:\wamp64\www\dfqc_sc\public/../application/index\view\product\add.html";i:1523689819;}*/ ?>
<meta charset="utf-8" />
<link href="__STATIC__/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="__STATIC__/umeditor/third-party/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/umeditor/third-party/template.min.js"></script>
<script type="text/javascript" charset="utf-8" src="__STATIC__/umeditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__STATIC__/umeditor/umeditor.min.js"></script>
<link href="__STATIC__/css/add.css" rel="stylesheet" type="text/css" />

<form action="<?php echo url('addProduct'); ?>" method="POST" enctype="multipart/form-data">
	<table style="width: 69%;">
		<tr>
			<td>产品名称：</td>
			<td><input type="text" name="name" required /></td>
		</tr>
		<tr>
			<td>产品价格：</td>
			<td><input type="text" name="price" required /></td>
		</tr>

		<tr>
			<td>淘宝链接：</td>
			<td><input type="text" name="taobao_url" required /></td>
		</tr>

		<tr>
			<td>京东链接：</td>
			<td><input type="text" name="jingdong_url" required /></td>
		</tr>

		<tr>
			<td>产品图片：</td>
			<td><input type="file" name="image" id="file" class="image" required style="opacity: 0"/>
			<input type="text" style="width: 215px;height:28px;position: relative;right: 258px;" id="text" class="filetext"/>
			<button id="fileSpan" type="button" class="xiugaibtn" style="position: relative;right: 263px;height:28px;top:1px;">上传</button></td>
		</tr>

		<tr>
			<td>产品版本：</td>
			<td>
				<select name="version">
					<?php foreach($product_version as $val):?>
					<option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
					<?php endforeach;?>
				</select>
			</td>
		</tr>

		<tr>
			<td class="tijiao"><input type="submit" value="添 加" /><input type="reset" value="取 消" /></td>
		</tr>

	</table>
</form>
<script type="text/javascript">
    //实例化编辑器
    var um = UM.getEditor('myEditor');
</script>
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
