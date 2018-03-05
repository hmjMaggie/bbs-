<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>登录</title>
</head>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/login.css"/>
<body>
	<div id="header">
		<div class="header-top inner clearfix">
			<div class="logo"><img src="./images/logo_03.jpg"/></div>
		</div>
	</div>
	<div class="cont inner clearfix">
		<h4 style="margin:20px;border-bottom: 1px solid #CCCCCC;line-height: 30px;">登录</h4>
		<div class="login-info">
			<form action="doLogin.php" method="post">
				<p class="note">用户名</p> <input class="text-info" type="text" name="userName" placeholder="请输入用户名" required /><br>
				<p class="note">密码</p> <input type="password" class="text-info" name="password" placeholder="请输入密码" required /><a href="##" style="font-size: 10px ;color:midnightblue;margin-left: 5px;">找回密码</a><br>
				<input type="submit" class="loginBtn" value="登录" />
			</form>
		</div>
		<div class="register">
			<p>还没有账号?</p>
			<a href="./register.php"><button class="registerBtn">注册一个</button></a>
		</div>
	</div>
	<div id="footer" class="inner">
		<img src="./images/footer_03.jpg"/>
	</div>
</body>
</html>