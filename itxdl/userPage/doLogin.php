<?php
//1.引入配置文件
require "../config.php";
//2.引入Model类文件
require "../Model.class.php";
//3.获取账号、密码和验证码
$userName=$_POST['userName'];
$password=$_POST['password'];
//4.实例化user表
$user = new Model('userdetail');
$res = $user->where("userName='{$userName}' && password='{$password}'")->select();
//5.判断是否登录成功
if($res){
	session_start();
	$_SESSION['id']=$res[0]['id'];
	$_SESSION['userName']=$res[0]['userName'];
	echo "<script>alert('登录成功！');location.href='index.html'</script>";
}else{
	echo "<script>alert('登录失败！用户名或密码错误，或用户不存在！');location.href='{$_SERVER['HTTP_REFERER']}'</script>";
	die;
}
?>
