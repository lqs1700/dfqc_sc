<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"E:\wamp64\www\dfqc_sc\public/../application/index\view\theme\add.html";i:1528710052;}*/ ?>
<meta charset="utf-8" />
<link href="__STATIC__/css/add.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<form action="<?php echo url('theme/add'); ?>" method="POST" enctype="multipart/form-data">
    <table style="width: 64%;">
        <tr>
            <td>主 题 名 称：</td>
            <td><input type="text" name="description" required /></td>
        </tr>

        <tr>
            <td>主题图片：</td>
            <td><input type="file" name="image" id="file" class="main_image_url" required style="opacity: 0"/>
                <input type="text" style="width: 169px;height:28px;position: relative;right: 258px;" id="text" class="filetext"/>
                <button id="fileSpan" type="button" class="xiugaibtn" style="position: relative;right: 263px;height:28px;top:1px;">上 传</button>
            </td>
        </tr>

        <tr>
            <td class="tijiao"><input type="submit" value="添 加" /><input style="left: 129px;" type="reset" value="取 消" /></td>
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