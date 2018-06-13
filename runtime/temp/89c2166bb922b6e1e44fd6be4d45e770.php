<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\wamp64\www\dfqc_sc\public/../application/index\view\category\add.html";i:1528709428;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分类添加</title>
    <link href="__STATIC__/css/add.css" rel="stylesheet" type="text/css" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
</head>
<form action="<?php echo url('category/add'); ?>" method="post" enctype="multipart/form-data">
    <table style="width: 103%;">
        <tr>
            <td style="width:10%;">分类名称：</td>
            <td>
                <input type="text" id="category_name" required name="category_name">
            </td>
        </tr>
        <tr>
            <td style="width:10%;">分类图标：</td>
            <td><input type="file" name="category_icon" id="category_icon" class="category_icon" required style="opacity: 0"/>
                <input type="text" style="width: 149px;height:20px;position: relative;right: 258px;" id="text" class="filetext"/>
                <button id="fileSpan" type="button" class="xiugaibtn" style="position: relative;right: 263px;height:28px;top:1px;">选 择</button>
            </td>
        </tr>
        <!--<tr>-->
            <!--<td style="width:10%;">分类主图：</td>-->
            <!--<td>-->
                <!--<input type="file" id="top_image_name" required name="category_name">-->
            <!--</td>-->
        <!--</tr>-->
        <tr>
            <td class="tijiao"><input type="submit" value="添 加" /><input type="reset" value="取 消" /></td>
        </tr>
    </table>
</form>
</html>

<script type="text/javascript">
    $("#category_name").blur(function() {
        var category_name = $("#category_name").val();
        if (category_name) {
            $.ajax({
                url:"<?php echo url('category/checka'); ?>",
                method: 'GET',
                data: {category_name: category_name},
                dataType: 'JSON',
                success: function(response){
                    if (response) {
                        var tip = '<span style="color: red">'+ response['msg'] +'</span>';
                        $("#category_name").siblings("span").remove();
                        $("#category_name").parent().append(tip);
                    }
                }
            });
        } else {
            var tip = '<span style="color: red">分类名称不能为空</span>';
            $("#category_name").siblings("span").remove();
            $("#category_name").parent().append(tip);
        }
    })
</script>

<script type="text/javascript">
    var file = document.getElementById("category_icon");
    var text = document.getElementById("text");
    $("#fileSpan").click(function(){
        file.click();
    });
    file.onchange = type;
    function type(){text.value = file.value;}
</script>

