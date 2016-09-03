<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

	<meta charset="utf-8">
	<title>WebChat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- CSS -->

	<link rel="stylesheet" href="{{url('login/css/supersized.css')}}">
	<link rel="stylesheet" href="{{url('login/css/login.css')}}">
	<link href="{{url('login/css/bootstrap.min.css')}}" rel="stylesheet">
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="{{url('login/js/html5.js')}}"></script>
	<![endif]-->
	<script src="{{url('login/js/jquery-1.8.2.min.js')}}"></script>
	<script type="text/javascript" src="{{url('login/js/jquery.form.js')}}"></script>
	<script type="text/javascript" src="{{url('login/js/tooltips.js')}}"></script>
	<script type="text/javascript" src="{{url('login/js/login.js')}}"></script>
	<script type="text/javascript" src="{{url('js/cookie.js')}}"></script>

</head>

<body>
@if($msg!=null)
<div>激活成功</div>
@endif
<div class="page-container">
	<div class="main_box">
		<div class="login_box">
			<div class="login_logo">
				<img src="{{url('login/images/logo.png')}}" >
			</div>

			<div class="login_form">
				<form id="login_form" method="post">
					<div class="form-group">
						<label for="j_username" class="t">用户名：</label>
						<input id="username" value="" name="username" type="text" class="form-control x319 in"
							   autocomplete="off">
					</div>
					<div class="form-group">
						<label for="j_password" class="t">密　码：</label>
						<input id="password" value="" name="password" type="password"
							   class="password form-control x319 in">
					</div>
					<div class="form-group">
						<label for="j_captcha" class="t">验证码：</label>
						<input id="j_captcha" name="j_captcha" type="text" class="form-control x164 in">
						<img id="captcha_img" alt="点击更换" title="点击更换" src="{{url('User/code')}} " onclick="this.src = '{{url('User/code')}}?'+Math.random()" class="m">
					</div>
					<div class="form-group">
						<label class="t"></label>
						<label for="j_remember" class="m">
							<input id="j_remember" type="checkbox" value="true">&nbsp;记住登陆账号!</label>
					</div>
					<div class="form-group space">
						<label class="t"></label>　　　
						<button type="button"  id="submit_btn"
								class="btn btn-primary btn-lg">&nbsp;登&nbsp;录&nbsp </button>
						<input type="submit" id="register" value="&nbsp;注&nbsp;册&nbsp;" class="btn btn-default btn-lg">
					</div>
				</form>
			</div>
		</div>
		<div class="bottom">Copyright &copy; www.joker1996.com <a href="#">管理员登录</a></div>
	</div>
</div>

<!-- Javascript -->

<script src="{{url('login/js/supersized.3.2.7.min.js')}}"></script>
<script src="{{url('login/js/supersized-init.js')}}"></script>
<script src="{{url('login/js/scripts.js')}}"></script>

</body>
</html>