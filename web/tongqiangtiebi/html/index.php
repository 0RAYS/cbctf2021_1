<html><head>
<meta http-equiv="Refresh" content="180">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="X-Frame-Options" content="SAMEORIGIN">
<link rel="stylesheet" type="text/css" href="https://cas.hdu.edu.cn/cas/comm/icon/icon.css">
<link rel="stylesheet" type="text/css" href="https://cas.hdu.edu.cn/cas/comm/icon/ie7/ie7.css">
<link rel="stylesheet" type="text/css" href="https://cas.hdu.edu.cn/cas/comm/hdu/css/camera.css">
<link rel="stylesheet" type="text/css" href="/cas/comm/hdu/css/login.css">
<link rel="stylesheet" type="text/css" href="https://cas.hdu.edu.cn/cas/comm/css/bootstrap.min.css">
<script type="text/javascript" src="https://cas.hdu.edu.cn/cas/comm/icon/ie7/ie7.js"></script>
<title>我最喜欢的统一身份认证系统</title>
<script type="text/javascript">

    var urlarray = window.location.href.split("#");
   	if(urlarray.length>1){
   	   var encodeurl = "";
	   for(var i=1;i<urlarray.length;i++){
	       encodeurl = encodeurl + encodeURIComponent("#"+urlarray[i]);
	   } 
	   encodeservice =  encodeURIComponent('https:\/\/i.hdu.edu.cn\/tp_up\/view?m=up#act=up\/messages\/standard') + encodeurl;
	   window.location.href = "https://cas.hdu.edu.cn/cas/login?service="+encodeservice;
   	}

</script>
<link rel="stylesheet" type="text/css" href="https://cas.hdu.edu.cn/cas/comm/css/code.css"></head>
<body class="fluid_container" id="container_bg" style="height: 951px; width: 945px;">
	<div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4" style="display: block;"><div class="camera_fakehover"><div class="camera_src camerastarted">
		<div data-thumb="/cas/comm/hdu/image/1.jpg" data-src="/cas/comm/hdu/image/1.jpg"></div>
		<div data-thumb="/cas/comm/hdu/image/2.jpg" data-src="/cas/comm/hdu/image/2.jpg"></div>
		<div data-thumb="/cas/comm/hdu/image/3.jpg" data-src="/cas/comm/hdu/image/3.jpg"></div>
	</div><div class="camera_target"><div class="cameraCont"><div class="cameraSlide cameraSlide_0 cameracurrent" style="visibility: visible; display: block; z-index: 999;"><img src="/cas/comm/hdu/image/1.jpg?1608114161968" class="imgLoaded" data-alignment="" data-portrait="" width="1440" height="900" style="visibility: visible; height: 951px; margin-left: -288.3px; margin-top: 0px; position: absolute; width: 1521.6px;"><div class="camerarelative" style="width: 945px; height: 951px;"></div></div><div class="cameraSlide cameraSlide_1" style="z-index: 1; display: none;"><img src="/cas/comm/hdu/image/2.jpg?1608114162207" class="imgLoaded" style="visibility: visible; height: 951px; margin-left: -288.3px; margin-top: 0px; position: absolute; width: 1521.6px;" data-alignment="" data-portrait="" width="1440" height="900"><div class="camerarelative" style="width: 945px; height: 951px;"></div></div><div class="cameraSlide cameraSlide_2" style="z-index: 1; display: none;"><img src="/cas/comm/hdu/image/3.jpg?1608114163593" class="imgLoaded" style="visibility: visible; height: 951px; margin-left: -288.3px; margin-top: 0px; position: absolute; width: 1521.6px;" data-alignment="" data-portrait="" width="1440" height="900"><div class="camerarelative" style="width: 945px; height: 951px;"></div></div><div class="cameraSlide cameraSlide_3" style="z-index: 1; display: none;"><div class="camerarelative" style="width: 945px; height: 951px;"></div></div></div></div><div class="camera_overlayer"></div><div class="camera_target_content"><div class="cameraContents"><div class="cameraContent cameracurrent" style="display: block;"></div><div class="cameraContent" style="display: none;"></div><div class="cameraContent" style="display: none;"></div></div></div><div class="camera_bar" style="display: none; top: auto; height: 7px;"><span class="camera_bar_cont" style="opacity: 8; position: absolute; inset: 0px; background-color: rgb(34, 34, 34);"><span id="pie_0" style="opacity: 2.22; position: absolute; background-color: rgb(238, 238, 238); left: 0px; right: 0px; display: none;"></span></span></div></div><div class="camera_loader" style="display: none; visibility: visible;"></div></div>
	<div class="login_conatiner" id="login_container_box" style="height: 951px; width: 945px;">
		<div class="shadow-bar">
			<div class="floor1">
				<div class="logo">
					 <span class="title">我最喜欢的统一身份认证系统</span>
				</div>
			</div>
		</div>
		<div class="floor2" style="right: 10%; height: 395px;">
			<div class="content_login_box" id="template_container">
		<div class="login_box_up">
		<div class="login_box_tab visible-lg-block">
			<a onclick="password_login()" class="active">账号登录</a>
			<a onclick="qrcode_login()">二维码登录</a>
		</div>
		<div class="error"> <span class="notice" style="display:none;" id="errormsg">请输入正确信息</span></div>
		<form id="loginForm" class="login_form" action="/index.php" method="post">
			<input autocomplete="off" type="text" class="login_box_input" style="margin-top: 30px" placeholder="帐号" id="un" name="un"> 
			<input autocomplete="off" type="password" class="login_box_input" placeholder="密码" id="pd" name="pd">

			</div>
			<input type="hidden" id="rsa" name="rsa">
			<input type="hidden" id="ul" name="ul">
			<input type="hidden" id="pl" name="pl">
			<input type="hidden" id="lt" name="lt" value="LT-152546-lrNNYyN2TVVBi7dgU2uxpvttlthNic-cas">
			<input type="hidden" name="execution" value="e9s1">
			<input type="hidden" name="_eventId" value="submit">
  			<p style="display:none;">
	      		
	      	</p>
		</form>
		</div>
	</div>
			
		</div>
	</div>
	<footer id="footer">
		<div class="login_footer">
			<span class="left">0RAYS</span> 
			<span class="right">干啥啥不行吃饭第一名</span>
		</div>

	</footer>

	<script type="text/html" id="password_template">
		<div class="login_box_up">
		<div class="login_box_tab visible-lg-block">
			<a onclick="password_login()" class="active">账号登录</a>
			<a onclick="qrcode_login()">二维码登录</a>
		</div>
		<div class="error"> <span class="notice" style="display:none;" id="errormsg">请输入正确信息</span></div>
		<form id="loginForm" class="login_form" action="/index.php" method="post">
			<input  type="text" class="login_box_input" style="margin-top: 30px" placeholder="帐号" id="un" name="un"/> 
			<input  type="password" class="login_box_input" placeholder="密码" id="pd" name="pd"/>
			

			</div>
			<a class="landing_btn_bg" > 登&nbsp;&nbsp;录 </a>



  			<p style="display:none;">
	      		
	      	</p>
		</form>
		</div>
	</script>
	<script type="text/html" id="qrcode_template">
		<div class="login_box_up">
			<div class="login_box_tab visible-lg-block">
				<a onclick="password_login()">账号登录</a> 
				<a onclick="qrcode_login()" class="active">二维码登录</a>
			</div>
			<div class="login_code code-box" style="margin:36px 0 0 calc(50% - 75px);width:153px;height:153px;" id="qrcode">
			
			</div>
		    <div class="login_code_notice">请使用手机微信，扫描二维码登录</div>


		    </div>
		</div>
	</script>
	<script type="text/javascript" src="https://cas.hdu.edu.cn/cas/comm/hdu/js/jquery.min.js"></script>
	<script type="text/javascript" src="https://cas.hdu.edu.cn/cas/comm/js/qrcode.js"></script>
    <script type="text/javascript" src="https://cas.hdu.edu.cn/cas/comm/js/login-qrcode.js"></script>
	<script type="text/javascript" src="https://cas.hdu.edu.cn/cas/comm/hdu/js/jquery-camera.min.js"></script>
	<script type="text/javascript" src="https://cas.hdu.edu.cn/cas/comm/hdu/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="https://cas.hdu.edu.cn/cas/comm/hdu/js/camera.min.js"></script>
	<script type="text/javascript" src="https://cas.hdu.edu.cn/cas/comm/js/des.js"></script>
	<script type="text/javascript" src="https://cas.hdu.edu.cn/cas/comm/plugin/captcha/jquery-1.10.3-ui.min.js"></script>
	<script type="text/javascript" src="https://cas.hdu.edu.cn/cas/comm/plugin/captcha/jquery.captcha.js"></script>
	<script type="text/javascript" src="https://cas.hdu.edu.cn/cas/comm/js/swiper.jquery.min.js"></script>
	<script type="text/javascript" src="https://cas.hdu.edu.cn/cas/comm/hdu/js/login.js"></script>
</body></html>

<?php 

$un=$_POST["un"];
$pd=$_POST["pd"];
if(isset($un)&&isset($pd))
{
    if ($un=="admin") {
        
        if ($pd=="000000") {
            echo("CBCTF{HDU_TQL!1!1!1!1!1}");
            exit(0);
        }
        echo("密码错误！！");
        exit(0);
    }
    echo("帐号错误！");
}






?>