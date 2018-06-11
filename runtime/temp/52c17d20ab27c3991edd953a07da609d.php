<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\wamp64\www\dfqc_sc\public/../application/index\view\login\index.html";i:1526523613;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录-东启</title>
<link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/css/page.css" />
<script type="text/javascript" src="__STATIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/public.js"></script>
</head>
<body>
	<div class="logHead">
		<img src="__STATIC__/img/gw_logo.png" />
	</div>
	<form class="logDiv" action="<?php echo url('login/index'); ?>" method="post">
		<img class="logBanner" src="__STATIC__/img/beijing.png" />
		<div class="logGet">
			<div class="logD logDtip">
				<p class="p1">登录</p>
				<p class="p2">东启后台登录</p>
			</div>
			<div class="lgD">
				<img class="img1" src="__STATIC__/img/logName.png" /><input type="text"
					name="username" required="true"/>
			</div>
			<div class="lgD">
				<img class="img1" src="__STATIC__/img/logPwd.png" /><input type="password"
					name="password" required="true"/>
			</div>
			<div class="lgD logD2">
				<input class="getYZM" type="text" name="verify"/>
				<div class="logYZM">
					<img src="<?php echo captcha_src(); ?>" id="id_vode" onclick="changeVcode()">	
				</div>
			</div>
			<div class="logC">
				<button type="submit">登 录</button>
			</div>
		</div>
	</form>
</body>
</html>
<script type="text/javascript">
	function changeVcode() {		
		var element = document.getElementById('id_vode');
		var vcode_url = '<?php echo captcha_src(); ?>?t=' + Math.random();
		element.setAttribute('src', vcode_url);
	}
	window.onload = changeVcode();
</script>