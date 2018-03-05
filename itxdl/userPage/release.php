<?php
    date_default_timezone_set("PRC");
?>

<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<title>发帖</title>
</head>
<link rel="stylesheet" type="text/css" href="./css/style.css"/>
<link rel="stylesheet" type="text/css" href="./css/release.css"/>
<body style="font-family: '微软雅黑'">
	<div id="header">
		<div class="header-top inner clearfix">
			<div class="logo"><img src="./images/logo_03.jpg"/></div>
			<div class="">
                <?php
                require "./enter.php";
                if(empty($_SESSION)){
                    echo "<script>alert('抱歉，您还未登陆，请前去登录！');window.location.href='login.html'</script>";
                    die;
                }
                ?>
			</div>
		</div>
		<div class="header-nav">
			<div class="inner">
				<ul>
					<li><a href="##">培训课程</a></li>
					<li class="active"><a href="##">论坛</a></li>
					<li><a href="##">兄弟连云课堂</a></li>
					<li><a href="##">PHP视频</a></li>
					<li><a href="##">Linux视频</a></li>
					<li><a href="##">战地日记</a></li>
				</ul>
				<div class="nav-pass"><a href="##">快速通道</a></div>
			</div>
		</div>
	</div>
	
	<div class="cont inner">
		<span style="margin-right: 5px;"><img src="images/jiantou_03.jpg"/></span><div class="fastLink"><a href=""> LAMP兄弟连 </a>><a href=""> 战地日记 </a>><a href=""> 发表帖子 </a></div>
		<form class="form" action="doAction.php?a=insert" method="post">
            <select class="genres" name="genres">
            <?php

            $type = new Model('type');
            $res = $type->query('select * from type where pid=0');

            if($res) {
                foreach ($res as $k=>$v){
                ?>
                    <option value="<?= $v['name'] ?>"><?= $v['name'] ?></option>
                <?php
                }
            }else{
                echo "<option value='没有任何分类'></option>";
            }
            ?>
            </select>

            <!--标题-->
            <input type="text" class="genresCont" name="title" placeholder="请输入标题" />

            <p class="msg yellow">批量上传需要先选择文件，再选择上传</p>
			<img src="images/paint_03.jpg"/>

            <!--内容时间-->
            <textarea class="textCont" name="content" rows="" cols="" style="resize: none;"></textarea>
            <input type="hidden" name="time" value="<?= date('Y-m-d') ?>">

            <img src="images/fatieshezhi_03.jpg"/>
			<input type="submit" class="submit orange" value="发布"/>
			<input type="button" class="submit" value="预览"/>
			<input type="button" class="submit" value="存为草稿"/>
		</form>
	</div>
	<div id="footer" class="inner">
		<img src="./images/footer_03.jpg"/>
	</div>
</body>
</html>