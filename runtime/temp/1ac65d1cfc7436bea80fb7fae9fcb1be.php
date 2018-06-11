<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\wamp64\www\dfqc_sc\public/../application/index\view\version\add.html";i:1527815382;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>版本添加</title>
    <link href="__STATIC__/css/add.css" rel="stylesheet" type="text/css" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
</head>
<form action="<?php echo url('version/add'); ?>" method="post">
    <table style="width: 103%;">
        <tr>
            <td style="width:10%;">版本名称：</td>
            <td>
                <input type="text" id="version_name" required name="version_name">
            </td>
        </tr>
        <tr>
            <td class="tijiao"><input type="submit" value="添 加" /><input type="reset" value="取 消" /></td>
        </tr>
    </table>
</form>
</html>

<script type="text/javascript">
    $("#version_name").blur(function() {
        var version_name = $("#version_name").val();
        if (version_name) {
            $.ajax({
                url:"<?php echo url('version/checka'); ?>",
                method: 'GET',
                data: {version_name: version_name},
                dataType: 'JSON',
                success: function(response){
                    if (response) {
                        var tip = '<span style="color: red">'+ response['msg'] +'</span>';
                        $("#version_name").siblings("span").remove();
                        $("#version_name").parent().append(tip);
                    }
                }
            });
        } else {
            var tip = '<span style="color: red">名称不能为空</span>';
            $("#version_name").siblings("span").remove();
            $("#version_name").parent().append(tip);
        }
    })
</script>

