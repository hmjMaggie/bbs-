<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>注册</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css"/>
	<link rel="stylesheet" type="text/css" href="./css/register.css"/>
</head>
<body>
	<div id="header">
		<div class="header-top inner clearfix">
			<div class="logo"><img src="./images/logo_03.jpg"/></div>
		</div>
		<div class="register clearfix">
			<h3>注册</h3>
			<form action="doAction.php?a=user" method="post" class="enroll">
				<table border="0">
					<tr style="height:50px;">
						<td style="text-align: right;">用户名&nbsp;&nbsp;</td>
						<td><input type="text" name="userName" placeholder="请输入用户名" required/></td>
					</tr>
					<tr style="height:50px;">
						<td style="text-align: right;">密码&nbsp;&nbsp;</td>
						<td><input type="password" name="password" placeholder="请输入密码" required/></td>
					</tr>
					<tr style="height:50px;">
                        <td style="text-align: right;">确认密码&nbsp;&nbsp;</td>
                        <td><input type="password" name="ispassword" placeholder="请确认密码" required/></td>
                    </tr>
					<tr style="height:50px;">
						<td style="text-align: right;">电子邮箱&nbsp;&nbsp;</td>
						<td><input type="email" name="email" placeholder="请输入电子邮箱" required/></td>
					</tr>
					<tr style="height:50px;">
						<td style="text-align: right;">qq&nbsp;&nbsp;</td>
						<td><input type="text" name="qq" placeholder="请输入qq" required/></td>
					</tr>
					<tr style="height:50px;">
						<td style="text-align: right;">电话&nbsp;&nbsp;</td>
						<td><input type="text" name="phones" placeholder="请输入电话" required/></td>
					</tr>
					<tr style="height:50px;">
						<td style="text-align: right;">现居住地&nbsp;&nbsp;</td>
						<td>
							<select name="province">
								<option value="" selected>请选择</option>
								<option value="上海">上海</option>
								<option value="北京">北京</option>
								<option value="成都">成都</option>
							</select>
							<select name="city">
								<option value="" selected>请选择</option>
								<option value="111">hahaha</option>
								<option value="222">hehehe</option>
							</select>
							<select name="county">
								<option value="" selected>请选择</option>
								<option value="333">huhuhu</option>
								<option value="555">hehehe</option>
							</select>
						</td>
					</tr>
					<tr style="height:50px;">
						<td style="text-align: right;">安全问题&nbsp;&nbsp;</td>
						<td>
							<select name="xianqu">
								<option value="">无安全问题</option>
							</select>
						</td>
					</tr>
					<tr style="height:50px;">
						<td style="text-align: right;">您的答案&nbsp;&nbsp;</td>
						<td><input type="text" name="dieenroll" placeholder="您的答案"/></td>
					</tr>
					<tr style="height:30px;">
						<td><input type="checkbox" name="read" id="read"/></td>
						<td><label for="read">我已阅读并全部同意</label></td>
					</tr>
					<tr style="height:60px;text-align:left;">
						<td></td>
						<td><input type="submit" value="提交注册" /></td>
					</tr>
				</table>
			</form>
			<div class="login">
				<p>已经拥有账号？</p>
				<a href="./login.php"><button class="registerBtn">马上登陆</button></a>
			</div>
		</div>
	</div>
	<div id="footer" class="inner">
		<img src="./images/footer_03.jpg"/>
	</div>
</body>
</html>
<?php

?>