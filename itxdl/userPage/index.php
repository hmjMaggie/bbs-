<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<script src="js/fn.js" type="text/javascript"></script>
	<script type="text/javascript">
		window.onload=function(){
			var showBtn=document.getElementsByClassName('show');
			var con=document.getElementsByClassName('con');
			var bool=true;
			for(var i=0;i<showBtn.length;i++){
				showBtn[i].index=i;
				showBtn[i].onclick=function(){
					if(bool){
						con[this.index].className+=" hide";
					}else{
						con[this.index].classList.remove('hide');
					}
					bool=!bool;
				}
			}
			
			silider();
			
			var selectBtn=document.getElementsByClassName('select')[0];			
			var selectList=document.getElementsByClassName('selectList')[0];
			var aSelect=selectList.children;
			var nameBox=document.getElementsByClassName('name')[0];			
			selectBtn.onclick=function(){
				selectList.classList.remove('hide');
			}
			for(var i=0;i<aSelect.length;i++){
				aSelect[i].onclick=function(ev){
					switch(ev.target.innerHTML){
						case "用户名":
							nameBox.value="请输入用户名";
							selectList.className+=" hide";							
						break;
						case "UID":
							nameBox.value="请输入UID";
							selectList.className+=" hide";
						break;
						case "邮箱":
							nameBox.value="请输入邮箱";
							selectList.className+=" hide";
						break;
					}
				}
			}
		}
	</script>
</head>
<body>
	<div class="top">
		<ul class="inner clearfix top_nav">
			<li class="left"><a href="#">设为首页</a></li>
			<li class="left"><a href="#">收藏LAMP兄弟连</a></li>
			<li><a href="#">帮助</a></li>
			<li><a href="#">推广链接</a></li>
			<li><a href="#">社区应用</a></li>
			<li><a href="#">最新帖子</a></li>
			<li><a href="#">精华区</a></li>
			<li><a href="#">社区服务</a></li>
			<li><a href="#">会员列表</a></li>
			<li><a href="#">统计排行</a></li>
			<li><a href="#">搜索</a></li>
		</ul>
	</div>
	<div class="header inner">
		<a href="#" class="logo"><img src="images/logo.png"/></a>
        <?php
        require "./enter.php";
        ?>
	</div>
	<div class="nav">
		<div class="inner">
			<ul>
				<li><a href="#">培训课程</a></li>
				<li><a href="#">论坛</a></li>
				<li><a href="#">兄弟连云课堂</a></li>
				<li><a href="#">PHP视屏</a></li>
				<li><a href="#">Linux视频</a></li>
				<li><a href="#">战地日记</a></li>
			</ul>
			<button type="button">快捷通道</button>
		</div>
	</div>
	<div class="search inner">
		<form action="" method="post">
			<input type="text" name="" id="" placeholder="让学习成为一种习惯！" class="serBox"/>
			<select name="">
				<option value="">帖子</option>
				<option value="">用户</option>
				<option value="">板块</option>
			</select>
			<input type="submit" value="搜索" class="btn"/>
			<ul class="tags clearfix">
				<li>热搜：</li>
				<li><a href="#">PHP</a></li>
				<li><a href="#">明哥</a></li>
				<li><a href="#">Java</a></li>
				<li><a href="#">大数据</a></li>
				<li><a href="#">Python</a></li>
			</ul>
		</form>
	</div>
	<div class="banner inner clearfix">
		<div class="slider">
			<ul class="img_list">
		        <li class="img"><img src="images/20170729083208.jpg"/></li>
		        <li class="hide img"><img src="images/20170729083247.jpg" alt=""></li>
		        <li class="hide img"><img src="images/20171102023340.jpg" alt=""></li>
		        <li class="hide img"><img src="images/20170824010015.jpg" alt=""></li>
		        <li class="hide img"><img src="images/20171102023328.jpg" alt=""></li>
		    </ul>
		    <ol class="btn_list">
		        <li class="ac btn">1</li>
		        <li class="btn">2</li>
		        <li class="btn">3</li>
		        <li class="btn">4</li>
		        <li class="btn">5</li>
		    </ol>			
		</div>
		<div class="sPic">
			<div><img src="images/lampt_1_20140529.jpg"/></div>
			<div><img src="images/lampt_2_20140529.jpg"/></div>
		</div>
		<div class="sPic">
			<div><img src="images/lampt_3.png"/></div>
			<div><img src="images/lampt_4.png"/></div>
		</div>
	</div>
	<div class="news inner"><img src="images/news_03.jpg"/></div>
	<?php

    // 2 实例化
    $type = new Model('type');

    // 3 查询
    $res1 = $type->query('select * from type where pid=0');

    if($res1!=false){
        foreach ($res1 as $k=>$v){
    ?>
    <div class="block inner">
		<div class="title">
			<i><img src="images/icon_07.jpg"/></i>
			<a href="#">:::. <?= $v['name'] ?> :::.</a>
			<i class="show"><img src="images/cate_fold.gif"/></i>
		</div>
		<div class="con ">
			<ul class="line clearfix">
                <?php
                $res2 = $type->query("select * from type where pid={$v['id']}");
                if($res2){
                    foreach ($res2 as $key=>$val){
                ?>
				<li>
					<div class="pic"><img src="images/<?= $val['blogo'] ?>"/></div>
					<div class="text">
						<p><a href="list.php?i=<?= $val['id'] ?>" class="subject"><?= $val['name'] ?></a><span class="today">(今日12)</span></p>
						<p>主题:<span>10675</span>帖子:<span>94376</span></p>
						<p><a href="#" class="time">最后发帖: <span>2017-12-25 09:28</span></a></p>
					</div>
				</li>
                    <?php
                    }
                }else{
                    echo "暂无数据！";
                }
                    ?>
			</ul>
		</div>
	</div>
    <?php
        }
    }
    ?>
    <div class="block inner connect">
        <div class="title">
            <i><img src="images/icon_07.jpg"/></i>
            <a href="#">友情链接</a>
            <i class="show"><img src="images/cate_fold.gif"/></i>
        </div>
        <div class="con ">
            <div>
        <?php
        $friendlink = new Model('friendlink');

        $res = $friendlink->query('select * from friendlink');

        if($res!=false){
            foreach ($res as $k=>$v){
                ?>
                <a href="http://<?= $v['url'] ?>"><?= $v['linkname'] ?></a>
        <?php
            }
        }else{
            echo "暂无数据！";
        }
        ?>
            </div>
        </div>
    </div>
    <div class="block inner online">
        <div class="title">
            <i><img src="images/icon_07.jpg"/></i>
            <a href="#" class="infor">在线用户 - 共 1333 人在线,29 位会员,1304 位访客,最多 4931 人发生在 2013-06-07 05:37</a>
            <i class="show"><img src="images/cate_fold.gif"/></i>
        </div>
        <div class="con ">
            <a href="#"><img src="images/3.gif"/><span>司令（管理员）</span></a>
            <a href="#"><img src="images/4.gif"/><span>连长（超版）</span></a>
            <a href="#"><img src="images/5.gif"/><span>排长（版主）</span></a>
            <a href="#"><img src="images/18.gif"/><span>教官</span></a>
            <a href="#"><img src="images/10.gif"/><span>新兵</span></a>
            <a href="#"><img src="images/6.gif"/><span>普通会员</span></a>
            <a href="#"><span class="open">[打开在线列表]</span></a>
        </div>
    </div>
	<div class="footer inner">
		<ul>
			<li><a href="#">联系我们</a><span>|</span></li>
			<li><a href="#">无图版</a><span>|</span></li>
			<li><a href="#">手机浏览</a><span>|</span></li>
			<li><a href="#">清除Cookies</a></li>
		</ul>
		<p>Powered by <span>phpwind v8.7</span> Copyright Time now is:12-25 17:18 </p>
		<p>Copyright 易第优（北京）教育咨询股份有限公司 2006 - 2017 Edu Inc. 京ICP备11018177号</p>
	</div>
</body>
</html>