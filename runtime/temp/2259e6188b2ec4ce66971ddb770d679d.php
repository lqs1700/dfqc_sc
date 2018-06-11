<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"E:\wamp64\www\dfqc_sc\public/../application/index\view\theme\addthemeproduct.html";i:1527931389;}*/ ?>
<meta charset="utf-8" />

<link href="__STATIC__/css/add.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<form action="<?php echo url('theme/add'); ?>" method="POST" enctype="multipart/form-data">
    <table style="width: 36%;">
        <tr>
            <td>主 题 名 称：</td>
            <td><?php echo $theme['description']; ?></td>
        </tr>

        <tr>
            <td>选 择 产 品：</td>
            <td>
                <select name="product_id">
                    <?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
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