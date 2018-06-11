<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"E:\wamp64\www\dfqc_sc\public/../application/index\view\admin_user\add.html";i:1527756927;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分类添加</title>
    <link href="__STATIC__/css/add.css" rel="stylesheet" type="text/css" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <style>td{padding: 5px 0}</style>
</head>
<form action="<?php echo url('admin_user/add'); ?>" method="post">
    <table style="width: 103%;">
        <tr>
            <td style="width:10%;">管理员帐号：</td>
            <td>
                <input type="text" id="admin_user" required name="admin_user">
            </td>
        </tr>
        <tr>
            <td style="width:10%;">管理员密码：</td>
            <td>
                <input type="text" id="admin_pwd" required name="admin_pwd">
            </td>
        </tr>
        <tr>
            <td class="tijiao"><input type="submit" value="添 加" /><input type="reset" value="取 消" /></td>
        </tr>
    </table>
</form>
</html>
<script type="text/javascript">
    $("#admin_user").blur(function() {
        var admin_user = $("#admin_user").val();
        if (admin_user) {
            $.ajax({
                url:"<?php echo url('admin_user/checka'); ?>",
                method: 'GET',
                data: {admin_user: admin_user},
                dataType: 'JSON',
                success: function(response) {
                    if (response) {
                        var tip = '<span style="color: red">'+ response['msg'] +'</span>';
                        $("#admin_user").siblings("span").remove();
                        $("#admin_user").parent().append(tip);
                    }
                }
            });
        } else {
            var tip = '<span style="color: red">帐号名不能为空</span>';
            $("#admin_user").siblings("span").remove();
            $("#admin_user").parent().append(tip);
        }
    })
</script>
<script type="text/javascript">
    $("#admin_pwd").blur(function() {
        var admin_pwd = $("#admin_pwd").val();
        if (admin_pwd) {
            $.ajax({
                url:"<?php echo url('admin_user/checkp'); ?>",
                method: 'GET',
                data: {admin_pwd: admin_pwd},
                dataType: 'JSON',
                success: function(response) {
                    if (response) {
                        var tip = '<span style="color: red">'+ response['msg'] +'</span>';
                        $("#admin_pwd").siblings("span").remove();
                        $("#admin_pwd").parent().append(tip);
                    }
                }
            });
        } else {
            var tip = '<span style="color: red">密码不能为空</span>';
            $("#admin_pwd").siblings("span").remove();
            $("#admin_pwd").parent().append(tip);
        }
    })
</script>

