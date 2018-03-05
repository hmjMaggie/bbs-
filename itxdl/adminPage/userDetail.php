<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>主要内容区main</title>
    <link href="css/css.css" type="text/css" rel="stylesheet" />
    <link href="css/main.css" type="text/css" rel="stylesheet" />
    <style>
        body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
        #searchmain{ font-size:12px;}
        #search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
        #search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
        #search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
        #search form input.text-but{height:24px; line-height:24px; width:55px; background:url(images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
        #search a.add{ background:url(images/main/add.jpg) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
        #search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
        #main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
        #main-tab th{ font-size:12px; background:url(images/main/list_bg.jpg) repeat-x; height:32px; line-height:32px;}
        #main-tab td{ font-size:12px; line-height:40px;}
        #main-tab td a{ font-size:12px; color:#548fc9;}
        #main-tab td a:hover{color:#565656; text-decoration:underline;}
        .bordertop{ border-top:1px solid #ebebeb}
        .borderright{ border-right:1px solid #ebebeb}
        .borderbottom{ border-bottom:1px solid #ebebeb}
        .borderleft{ border-left:1px solid #ebebeb}
        .gray{ color:#dbdbdb;}
        td.fenye{ padding:10px 0 0 0; text-align:right;}
        .bggray{ background:#f9f9f9}
    </style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
    <tr>
        <td width="99%" align="left" valign="top">您的位置：用户管理 > 用户详情</td>
    </tr>
    <tr>
        <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
                <tr>
                    <td width="90%" align="left" valign="middle">
                        <form method="get" action="userDetail.php">
                            <span>请输入条件：</span>
                            <input type="text" name="userName" value="" class="text-word">

                            <span>请输入每页显示条数：</span>
                            <input type="text" name="cpage" value="" class="text-word">
                            <input type="submit" value="查询" class="text-but">
                        </form>
                    </td>
                    <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="add_user.php" target="mainFrame" onFocus="this.blur()" class="add">新增用户</a></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
                <tr>
                    <th align="center" valign="middle" class="borderright">id</th>
<!--                    <th align="center" valign="middle" class="borderright">uid</th>-->
                    <th align="center" valign="middle" class="borderright">用户名</th>
                    <th align="center" valign="middle" class="borderright">密码</th>
                    <th align="center" valign="middle" class="borderright">昵称</th>
                    <th align="center" valign="middle" class="borderright">邮箱</th>
                    <th align="center" valign="middle" class="borderright">qq</th>
                    <th align="center" valign="middle" class="borderright">性别</th>
                    <th align="center" valign="middle" class="borderright">头像</th>
                    <th align="center" valign="middle" class="borderright">地址</th>
                    <th align="center" valign="middle">操作</th>
                </tr>
                <?php
                // 1 引入配置文件
                require "../config.php";
                require "../model.class.php";

                //=======================  拼装查询条件，搜索  ===================================
                // 1 定义一个存储信息的变量
                $whereList = array();
                $urlList = array();

                // 2 判断用户是否提交的搜索信息
                if(!empty($_GET['userName'])){
                    $whereList[] = " userName like '%{$_GET['userName']}%'";
                    $urlList[] = "userName={$_GET['userName']}";
                }

                if(!empty($_GET['userName'])){
                    $whereList[] = " password like '%{$_GET['userName']}%'";
                    $urlList[] = "password={$_GET['userName']}";
                }

                if(!empty($_GET['userName'])){
                    $whereList[] = " email like '%{$_GET['userName']}%'";
                    $urlList[] = "email={$_GET['userName']}";
                }

                if(!empty($_GET['userName'])){
                    $whereList[] = " qq like '%{$_GET['userName']}%'";
                    $urlList[] = "qq={$_GET['userName']}";
                }

                if(!empty($_GET['userName'])){
                    $whereList[] = " sex like '%{$_GET['userName']}%'";
                    $urlList[] = "sex={$_GET['userName']}";
                }

                if(!empty($_GET['userName'])){
                    $whereList[] = " address like '%{$_GET['userName']}%'";
                    $urlList[] = "address={$_GET['userName']}";
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
                //3.取得所有数据
                $post = new Model('post');

                //分页需要应用到的信息
                $maxRows = 0;	//总条数

                //判断是否初始化，给一个默认值
                if(isset($_GET['cpage'])){
                    $pageSize = $_GET['cpage']==""?4:$_GET['cpage'];	//每页条数
                }else{
                    $pageSize = 4;
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

                // 2 发送查询语句
                $userDetail = new Model('userDetail');
                $res = $post->query('select * from userDetail'.$where.$limit);

                //4.遍历到表格
                if($res!=false){
                    foreach($res as $k=>$v) {
                ?>
                <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                    onMouseOver="this.style.backgroundColor='#edf5ff'">
                    <td align="center" valign="middle" class="borderright borderbottom"><?=$v['id']?></td>
<!--                    <td align="center" valign="middle" class="borderright borderbottom">--><?//=$v['uid']?><!--</td>-->
                    <td align="center" valign="middle" class="borderright borderbottom"><?=$v['userName']?></td>
                    <td align="center" valign="middle" class="borderright borderbottom"><?=$v['password']?></td>
                    <td align="center" valign="middle" class="borderright borderbottom"><?=$v['nickName']?></td>
                    <td align="center" valign="middle" class="borderright borderbottom"><?=$v['email'] ?></td>
                    <td align="center" valign="middle" class="borderright borderbottom"><?= $v['qq']?></td>
                    <td align="center" valign="middle" class="borderright borderbottom"><?=$v['sex']?></td>
                    <td align="center" valign="middle" class="borderright borderbottom">
                        <img src="../userPhoto/s_<?=$v['photo']?>" alt="">
                    </td>
                    <td align="center" valign="middle" class="borderright borderbottom"><?=$v['address']?></td>
                    <td align="center" valign="middle" class="borderbottom">
                        <a href="edit_user.php?i=<?=$v['id']?>" target="mainFrame" onFocus="this.blur()" class="add">编辑</a>
                        <span class="gray">&nbsp;|&nbsp;</span>
                        <a href="doAction.php?a=delete&i=<?=$v['id']?>" target="mainFrame" onFocus="this.blur()" class="add">删除</a>
                    </td>
                </tr>
                    <?php
                    }
                }else{
                    echo "
                    <tr align='center'><td colspan='10'>没有查询到任何信息</td></tr>
                ";
                }
                ?>
            </table>
        </td>
    </tr>
    <tr>
        <td align="left" valign="top" class="fenye">
            <?= $maxRows ?> 条数据 <?= $page ?>/<?= $maxPage ?>页&nbsp;&nbsp;
            <a href="userDetail.php?p=1<?= $url ?>" target="mainFrame" onFocus="this.blur()">首页</a>&nbsp;&nbsp;
            <a href="userDetail.php?p=<?= $page-1<=1 ? 1 : $page-1; ?><?= $url ?>" target="mainFrame" onFocus="this.blur()">上一页</a>&nbsp;&nbsp;
            <a href="userDetail.php?p=<?= $page+1>=$maxPage ? $maxPage : $page+1 ?><?= $url ?>" target="mainFrame" onFocus="this.blur()">下一页</a>&nbsp;&nbsp;
            <a href="userDetail.php?p=<?= $maxPage ?><?= $url ?>" target="mainFrame" onFocus="this.blur()">尾页</a>
        </td>
    </tr>
</table>
</body>
</html>