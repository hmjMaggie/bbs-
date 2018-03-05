<?php
	//引入配置文件和Model类
	require "../config.php";
	require "../Model.class.php";

	//1.获取用户登录的信息
	$userName = $_POST['userName'];
	$password = $_POST['password'];
	$code = $_POST['code'];

	//将提交的验证码和session获取的验证码全部变成小写
	$code = strtolower($code);
	$newcode = strtolower($_COOKIE['code']);

	//2.判断验证码是否一致
	if($code != $newcode){
		echo "<script>alert('抱歉，验证码不一致！请重试！');window.location.href='login.html'</script>";
		die;
	}

	//3.验证当前用户是否存在
	$user = new Model('user');
	$res = $user->query("select * from user where userName='{$userName}' && password='{$password}' && auth=1 ");

	//4.判断
	if($res!=false && $res[0]['auth']==1){
		//登录成功将用户指定信息存入cookie
//        var_dump($res);
        setcookie('id',$res[0]['id'],time()+3600,'/');
        setcookie('userName',$res[0]['userName'],time()+3600,'/');
//        var_dump($_COOKIE);
		echo "<script>alert('恭喜，登录成功！');window.location.href='./index.html'</script>";
	}else{
		echo "<script>alert('抱歉，登录失败！用户名或密码错误！');window.location.href='./login.html'</script>";
	}

