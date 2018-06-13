<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\wamp64\www\dfqc_sc\public/../application/index\view\serious\add.html";i:1527815344;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>系列添加</title>
    <link href="__STATIC__/css/add.css" rel="stylesheet" type="text/css" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
</head>
<form action="<?php echo url('serious/add'); ?>" method="post">
    <table style="width: 103%;">
        <tr>
            <td style="width:10%;">系列名称：</td>
            <td>
                <input type="text" id="serious_name" required name="serious_name">
            </td>
        </tr>
        <tr>
            <td class="tijiao"><input type="submit" value="添 加" /><input type="reset" value="取 消" /></td>
        </tr>
    </table>
</form>
</html>

<script type="text/javascript">
    $("#serious_name").blur(function() {
        var serious_name = $("#serious_name").val();
        if (serious_name) {
            $.ajax({
                url:"<?php echo url('serious/checka'); ?>",
                method: 'GET',
                data: {serious_name: serious_name},
                dataType: 'JSON',
                success: function(response){
                    if (response) {
                        var tip = '<span style="color: red">'+ response['msg'] +'</span>';
                        $("#serious_name").siblings("span").remove();
                        $("#serious_name").parent().append(tip);
                    }
                }
            });
        } else {
            var tip = '<span style="color: red">名称不能为空</span>';
            $("#serious_name").siblings("span").remove();
            $("#serious_name").parent().append(tip);
        }
    })
</script>

