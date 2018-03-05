<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dettails</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css"/>

    <style type="text/css">
        *{margin: 0;padding: 0;}
        a{text-decoration: none;}
        ul{list-style: none;}
        .inner{width: 960px;margin: 0 auto;}
        .clearfix:after{
            content: '.';
            clear: both;
            visibility: hidden;
            height: 0;
            display: block;
        }
        body{background-color: #f1f2f6;}
    </style>
    <link rel="stylesheet" href="css/details.css" type="text/css">
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
		<a href="index.php" class="logo"><img src="images/logo.png"/></a>
        <?php
        require "enter.php"
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
    <div class="main inner">
        <div class="backtol"><a href="list.php">返回列表</a></div>
        <div class="middleBox">
            <form action="" method="post">
                <?php
                //引入配置文件

                //获取用户id
                $id=$_GET['id'];

                // 1 实例化
                $post = new Model('post');
                $res = $post->find($id);

                ?>
                <div class="readTop"><h2>标题：<?= $res['title'] ?></h2></div>
                <table>
                    <tr>
                        <td class="left">
                            <div class="posT">
                                <div class="fatie">
                                    <span></span>
                                    <a href="#">此贴作者：<?= $res['author'] ?></a>
                                </div>
                                <div class="pic">
                                    <img src="images/touxiang.jpg">
                                </div>
                                <div class="icons">
                                    <a href="#">最后评论：<?= $res['elite'] ?></a>
                                </div>
                            </div>
                        </td>
                        <td class="right">
                            <div class="text" style="font-size: 14px">
                                <div class="topTitle">楼主:<?= $res['author'] ?> <span style="float: right;">创建时间：<?= $res['ctime'] ?></span> </div>
                                <p>帖子内容：</p>
                                <p style="padding: 8px;"><?= $res['content'] ?></p>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: hxsd
 * Date: 2017/12/27
 * Time: 17:43
 */