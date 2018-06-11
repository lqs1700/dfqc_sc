<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\wamp64\www\dfqc_sc\public/../application/index\view\category\add.html";i:1527815512;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分类添加</title>
    <link href="__STATIC__/css/add.css" rel="stylesheet" type="text/css" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
</head>
<form action="<?php echo url('category/add'); ?>" method="post">
    <table style="width: 103%;">
        <tr>
            <td style="width:10%;">分类名称：</td>
            <td>
                <input type="text" id="category_name" required name="category_name">
            </td>
        </tr>
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

