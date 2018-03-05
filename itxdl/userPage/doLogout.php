<?php
//清除session信息即可
session_start();
session_destroy();
unset($_SESSION);
setcookie('PHPSESSID','',time()-1,'/');
echo "<script>alert('退出成功！');window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
?>