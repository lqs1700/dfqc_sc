<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"E:\wamp64\www\dfqc_sc\public/../application/index\view\banner\add.html";i:1527831763;}*/ ?>
<meta charset="utf-8" />
<link href="__STATIC__/css/add.css" rel="stylesheet" type="text/css" />
<form action="<?php echo url('/index/banner/add'); ?>" method="post" enctype="multipart/form-data">
	<table style="width: 107%;">
	<tr>
		<td style="width: 10%;">banner图片：</td>
		<td><input type="file" name="image" id="file" class="image" required style="opacity: 0"/>
			<input type="text" style="width: 215px;height:28px;position: relative;right: 258px;" id="text" class="filetext"/>
			<button id="fileSpan" type="button" class="xiugaibtn" style="position: relative;right: 263px;height:28px;top:1px;">选 择</button>
		</td>
		
	</tr>
	<tr>
		<td>轮播位置</td>
		<td><input type="text" name="banner_id" placeholder="默认为首页轮播"></td>
	</tr>
	<tr>
		<td class="tijiao">
			<input type="submit" value="提 交"> <input type="reset" value="取 消">
		</td>
	</tr>
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
