<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"E:\wamp64\www\dfqc_sc\public/../application/index\view\admin_user\edit.html";i:1527831540;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="__STATIC__/css/add.css" rel="stylesheet" type="text/css" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <title>修改密码</title>
    <style>
        .tijiao input[type='reset']{left: 118px;}
        td{padding: 5px 0}
    </style>
</head>
<body>
<form action="<?php echo url('admin_user/edit'); ?>?id=<?php echo $val['id'];?>" method="POST">
    <table style="width: 100%;">
        <tr>
            <td>管理员帐号：</td>
            <td><?php echo $val['app_id'];?></td>
        </tr>
        <tr>
            <td style="width:10%;">管理员密码：</td>
            <td>
                <input type="text" id="admin_pwd" required name="admin_pwd">
            </td>
        </tr>
        <tr>
            <td  class="tijiao"><input type="submit" value="修 改" /><input type="reset" value="取 消" /></td>
        </tr>
    </table>
</form>


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
            var tip = '<span style="color: red">请输入密码</span>';
            $("#admin_pwd").siblings("span").remove();
            $("#admin_pwd").parent().append(tip);
        }
    })
</script>
</body>
</html>