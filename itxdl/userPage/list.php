<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>兄弟连-论坛</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css"/>
	<link rel="stylesheet" type="text/css" href="./css/phpExc.css"/>
	<link rel="stylesheet" type="text/css" href="./css/list.css"/>
</head>
<body>
	<div id="header">
		<div class="header-top inner clearfix">
			<div class="logo"><img src="./images/logo_03.jpg"/></div>
			<?php 
			require "./enter.php";
			?>
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
		<div class="header-search inner">

		</div>
	</div>
    <div class="bread inner">
        <p>LAMP兄弟连<i>></i>PHP技术交流</p>
        <ul class="fr">
            <li class="mr10"><a href="#">新帖</a></li>
            <li class="mr5"><a href="#">精华</a></li>
        </ul>
    </div>
    <div id="pw_content" class="mb10 inner">
        <div id="sidebar" class="f_tree cc">
            <div class="content_thread cc">
                <div class="content_ie">
                    <div class="hB mb10" style="padding-right:10px;font-size: 12px;">
                        <span class="fr">版主:  <a href=" _cardshow">吴擘君</a></span>
                        <h2 class="mr5 fl f14">PHP技术</h2>
                    </div>
                    <div class="threadInfo mb10" style="overflow:hidden;">
                        <table width="100%">
                            <tbody>
                            <tr class="vt" style="font-size: 12px">
                                <td width="10">
                                    <img src="./images/127.png" alt="" style="padding:0 10px;">
                                </td>
                                <td style="padding-right:10px;">
                                    <p class="mb5 s6 cc">
                                        今日:
                                        <span class="s2 mr10">0</span>
                                        <span class="gray2 mr10">|</span>
                                        主题:
                                        <span class="s2 mr10">10675</span>
                                        <span class="gray2 mr10">|</span>
                                        帖数:
                                        <span class="s2">2675</span>
                                    </p>
                                    <p class="s6" style="width: 100%;">PHP基础编程、疑难解答、学习和开发过程中的经验总结等。</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="margin-bottom: 30px;">
                        <form method="get" action="list.php">
                            <span>请输入查询条件：</span>
                            <input type="text" name="title" value="" class="text-word">

                            <span>请输入每页显示条数</span>
                            <input type="text" name="cpage" value="" class="text-word" size="2">
                            <input type="submit" value="查询" class="text-but">
                        </form>
                    </div>
                    <div id="c" style="font-size: 12px;">
                        <div class="sidePd10">
                            <div class="tabA">
                                <ul class="cc" id="lampnewtzdh">
                                    <li class="current"><a href="#">全部</a></li>
                                    <li id="thread_type_digest"><a href="#">精华</a></li>
                                    <li><a href="#">投票</a></li>
                                    <li><a href="#">悬赏</a></li>
                                    <li><a href="#">商品</a></li>
                                </ul>
                            </div>
                            <div id="ajaxtable">
                                <div class="pw_ulA cc">
                                    <ul class="cc" id="id_all">
                                        <li id="thread_type_all" class="current"><a href="#">全部</a></li>
                                        <li id="thread_type_1"><a href="#">已解决</a></li>
                                        <li id="thread_type_2"><a href="#">我要提问</a></li>
                                        <li id="thread_type_3"><a href="#">PHP</a></li>
                                        <li id="thread_type_5"><a href="#">其他</a></li>
                                        <li id="thread_type_6"><a href="#">经验技巧</a></li>
                                    </ul>
                                </div>
                                <div class="threadCommon">
                                    <table width="100%" style="table-layout:fixed;">
                                        <tbody>
                                        <tr class="tr2 thread_sort">
                                            <td style="padding-left:12px;">
                                                排序： &nbsp;
                                                <a href="#">最新发帖</a>
                                                <span class="gray">|</span>
                                                <a href="#" class="s6 current">最后回复</a>
                                            </td>
                                            <td class="author">作者</td>
                                            <td width="60">回复</td>
                                            <td class="author">最后发表</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" style="table-layout:fixed;" class="z">
                                        <tbody id="threadlist">
                                        <tr class="tr4">
                                            <td width="20"></td>
                                            <td style="padding-left:0;">普通主题</td>
                                            <td width="85"></td>
                                            <td width="60"></td>
                                            <td width="85"></td>
                                        </tr>

                                        <!-- 如果想要遍历数据，遍历tr3即可 -->
                                        <?php
                                            // 1 引入配置文件


                                            //=======================  拼装查询条件，搜索  ===================================
                                            // 1 定义一个存储信息的变量
                                            $whereList = array();
                                            $urlList = array();

                                            // 2 判断用户是否提交的搜索信息
                                            if(!empty($_GET['title'])){
                                                $whereList[] = " title like '%{$_GET['title']}%'";
                                                $urlList[] = "title={$_GET['title']}";
                                            }

                                            if(!empty($_GET['title'])){
                                                $whereList[] = " content like '%{$_GET['title']}%'";
                                                $urlList[] = "content={$_GET['title']}";
                                            }

                                            if(!empty($_GET['title'])){
                                                $whereList[] = " ctime like '%{$_GET['title']}%'";
                                                $urlList[] = "ctime={$_GET['title']}";
                                            }

                                            if(!empty($_GET['title'])){
                                                $whereList[] = " elite like '%{$_GET['title']}%'";
                                                $urlList[] = "elite={$_GET['title']}";
                                            }

                                            if(!empty($_GET['title'])){
                                                $whereList[] = " author like '%{$_GET['title']}%'";
                                                $urlList[] = "author={$_GET['title']}";
                                            }

                                            // 3 拼装sql语句
                                            $where = '';
                                            $url='';

                                            // 判断用户是否查询过了
                                            if(!empty($whereList)){
                                                $where = ' where '.implode(' || ',$whereList);
                                                $url = '&'.implode('&',$urlList);
                                            }

                                            //=======================  拼装查询条件结束，搜索  ===================================

                                            //=======================  分页  ==============================================
                                            //3.实例化
                                            $post = new Model('post');

                                            //分页需要应用到的信息
                                            $maxRows = 0;	//总条数

                                            //判断是否初始化，给一个默认值
                                            if(isset($_GET['cpage'])){
                                                $pageSize = $_GET['cpage']==""?7:$_GET['cpage'];	//每页条数
                                            }else{
                                                $pageSize = 7;
                                            }
                                            $maxPage = 0;	//总页数
                                            $page = $_GET['p'] ?? 1;		//当前页

                                            //定义查询总条数的语句
                                            $maxRows = $post->query("select count(*) sum from post {$where}")[0]['sum'];

                                            //求得总页数
                                            $maxPage = ceil($maxRows / $pageSize);

                                            // ($page - 1) * $pageSize;
                                            // (1 - 1) * 5  = 0;	// 0,5   1
                                            // (2 - 1) * 5  = 5;	// 5,5   2
                                            // (3 - 1) * 5  = 10;	// 10,5  3
                                            // ($page - 1) * $pageSize = 应当跳过的条数

                                            //拼装limit语句
                                            $limit = '';
                                            $limit = ' limit '.($page - 1) * $pageSize.','.$pageSize;

                                            //=======================  分页结束  ==========================================

                                            // 2 查询
                                            $stu = new Model('post');
                                            $res = $stu->query('select * from post order by ctime desc'.$where.$limit);

                                            if($res!=false) {
                                                foreach ($res as $k=>$v){
                                        ?>
                                        <tr class="tr3">
                                            <td class="icon tar" width="30" >
                                                <?php
                                                if($v['elite']=='1'){
                                                    echo " <a href='#'><img src='./images/topichot.gif'></a> ";
                                                }else{
                                                    echo "<a></a>";
                                                }
                                                ?>
                                            </td>
                                            <td class="subject" id="td_149463">
                                                <?php
                                                if($v['top']=='1'){
                                                    echo " <img class='fr' src='./images/digest_1.gif' style='margin-top:4px;'>";
                                                }else{
                                                    echo " <img class='fr' style='margin-top:4px;'>";
                                                }
                                                ?>
                                                <a href="details.php?id=<?= $v['id'] ?>" class="subject_t f14"><?= $v['title'] ?></a>&nbsp;
                                                <span class="s2 w"></span>
                                                <span class="w">&nbsp;
                                                    <img src="./images/multipage.gif" alt="">&nbsp;
                                                    <span class="tpage">
                                                        <a href="#">2</a>
                                                        <a href="#">3</a>
                                                        <a href="#">4</a>
                                                        <a href="#">5</a>..
                                                        <a href="#">112</a>
                                                    </span>
                                                </span>
                                            </td>
                                            <td class="author" >
                                                <?php
                                                $id = $v['uid'];
                                                $list2 = new Model('userdetail');
                                                $res1 = $list2->find($id);
                                                ?>
                                                <a href="#" class=" _cardshow"><?= $res1['userName'] ?></a>
                                                <p><?= $v['ctime'] ?></p>
                                            </td>
                                            <td class="num" width="70">
                                                <em style="font-size: 14px;color: #000;"><?= $v['recycle'] ?></em>回复
                                            </td>
                                            <td class="author" >
                                                <a href="#" class=" _cardshow"><?= $v['elite'] ?></a>
                                                <p><a href="#"><?= $v['top'] ?>小时前</a></p>
                                            </td>
                                        </tr>
                                        <?php
                                                }
                                            }else{
                                                echo "没有查询到数据";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="cc" style="padding:10px;" id="tabA">
                            <a href="release.php" class="post fr" id="td_post">发帖</a>
                            <div style="padding-top:4px;">
                                <div class="pages">
                                    一共<?= $maxRows ?> 条数据 <?= $page ?>/<?= $maxPage ?>页&nbsp;&nbsp;
                                    <a href="list.php?p=1<?= $url ?>">首页</a>
                                    <a href="list.php?p=<?= $page-1<=1 ? 1 : $page-1; ?><?= $url ?>" class="pages_next">上一页</a>
                                    <a href="list.php?p=<?= $page+1>=$maxPage ? $maxPage : $page+1 ?><?= $url ?>" class="pages_next">下一页</a>
                                    <a href="list.php?p=<?= $maxPage ?><?= $url ?>">尾页</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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