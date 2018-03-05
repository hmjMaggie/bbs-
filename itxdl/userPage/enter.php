<?php 
session_start();
if(!isset($_SESSION['id'])){
    require "../config.php";
    require "../model.class.php";
?>
<form action="doLogin.php" method="post" class="function">
	<input type="text" name="userName" placeholder="请输入用户名..." required/>
	<label>
		<input type="checkbox" checked /> 记住登录
	</label>
	<a href="##">找回密码</a><br />
	<input type="password" name="password" placeholder="请输入密码..." required/>
	<input type="submit" value="登录" />
	<input type="button" value="注册" onclick="javascript:location.href='register.php'" />
</form>
<?php
}else{
?>
<table class="function">
    <?php
    $id = $_SESSION['id'];
    require "../config.php";
    require "../model.class.php";

    $userdetail = new Model('userdetail');
    $res = $userdetail->find($id);

    ?>
	<tr>
        <th style="width: 70px;">
            <div style="border: 1px solid #ccc;border-radius: 50%;overflow: hidden;width:70px">
                <img style="width: 100%;" style="width: 100%" src="../userPhoto/<?= $res['photo'] ?>"/>
            </div>
        </th>
		<th>您好，</th>
		<th><a href="##"><?= $_SESSION['userName'] ?></a></th>
		<th><a href="./doLogout.php" onclick="return quit();">退出</a></th>
	</tr>
</table>
<?php
}
?>