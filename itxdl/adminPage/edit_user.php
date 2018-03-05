<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>主要内容区main</title>
    <link href="css/css.css" type="text/css" rel="stylesheet" />
    <link href="css/main.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="images/main/favicon.ico" />
    <style>
        body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
        #searchmain{ font-size:12px;}
        #search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF}
        #search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
        #search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
        #search form input.text-but{height:24px; line-height:24px; width:55px; background:url(images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
        #search a.add{ background:url(images/main/add.jpg) no-repeat 0px 6px; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF}
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
        .bggray{ background:#f9f9f9; font-size:14px; font-weight:bold; padding:10px 10px 10px 0; width:120px;}
        .main-for{ padding:10px;}
        .main-for input.text-word{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; padding:0 10px;}
        .main-for select{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666;}
        .main-for input.text-but{ width:100px; height:40px; line-height:30px; border: 1px solid #cdcdcd; background:#e6e6e6; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#969696; float:left; margin:0 10px 0 0; display:inline; cursor:pointer; font-size:14px; font-weight:bold;}
        #addinfo a{ font-size:14px; font-weight:bold; background:url(images/main/addinfoblack.jpg) no-repeat 0 1px; padding:0px 0 0px 20px; line-height:45px;}
        #addinfo a:hover{ background:url(images/main/addinfoblue.jpg) no-repeat 0 1px;}
        input{outline: none;}
    </style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
    <tr>
        <td width="99%" align="left" valign="top">您的位置：用户管理&nbsp;&nbsp;>&nbsp;&nbsp;修改用户</td>
    </tr>
    <tr>
        <td align="left" valign="top" id="addinfo">
            <a href="edit_user.php" target="mainFrame" onFocus="this.blur()" class="add">修改用户</a>
        </td>
    </tr>
    <tr>
        <td align="left" valign="top">
            <?php
                $id=$_GET['i'];
                //1.引入配置文件
                require "../config.php";

                //2.引入Model类文件
                require "../Model.class.php";

                //3.取得所有数据
                $userDetail = new Model('userDetail');
                $res = $userDetail->find($id);
            ?>
            <form method="post" action="doAction.php?a=change" enctype="multipart/form-data">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
                        <td align="right" valign="middle" class="borderright borderbottom bggray">用户名</td>
                        <td align="left" valign="middle" class="borderright borderbottom main-for">
                            <input type="text" name="userName" value="<?=$res['userName']?>" class="text-word" required>
                        </td>
                    </tr>
                    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
                        <td align="right" valign="middle" class="borderright borderbottom bggray">昵称</td>
                        <td align="left" valign="middle" class="borderright borderbottom main-for">
                            <input type="text" name="nickName" value="<?=$res['nickName']?>" class="text-word">
                        </td>
                    </tr>
                    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
                        <td align="right" valign="middle" class="borderright borderbottom bggray">密码</td>
                        <td align="left" valign="middle" class="borderright borderbottom main-for">
                            <input type="text" name="password" value="<?=$res['password']?>" class="text-word" required>
                        </td>
                    </tr>
                    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
                        <td align="right" valign="middle" class="borderright borderbottom bggray">email</td>
                        <td align="left" valign="middle" class="borderright borderbottom main-for">
                            <input type="text" name="email" value="<?=$res['email']?>" class="text-word" required>
                        </td>
                    </tr>
                    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
                        <td align="right" valign="middle" class="borderright borderbottom bggray">qq</td>
                        <td align="left" valign="middle" class="borderright borderbottom main-for">
                            <input type="text" name="qq" value="<?=$res['qq']?>" class="text-word" required>
                        </td>
                    </tr>
                    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
                        <td align="right" valign="middle" class="borderright borderbottom bggray">sex</td>
                        <td align="left" valign="middle" class="borderright borderbottom main-for">
                            <select name="sex" style="width: 100px;">
                                <option value="女" >&nbsp;&nbsp;女</option>
                                <option value="男" >&nbsp;&nbsp;男</option>
                            </select>
                        </td>
                    </tr>
                    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
                        <td align="right" valign="middle" class="borderright borderbottom bggray">photo</td>
                        <td align="left" valign="middle" class="borderright borderbottom main-for">
                            <input type="file" name="photo" style="border:none;"  required>
                        </td>
                    </tr>
                    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
                        <td align="right" valign="middle" class="borderright borderbottom bggray">地址</td>
                        <td align="left" valign="middle" class="borderright borderbottom main-for">
                            <select name="address[]" class="address" style="width: 100px;">
                                <option value="上海" >上海</option>
                                <option value="北京" >北京</option>
                                <option value="广州" >广州</option>
                            </select>
                            <select name="address[]" class="address" style="width: 100px;">
                                <option value="aaa" >aaa</option>
                                <option value="bbb" >bbb</option>
                                <option value="ccc" >ccc</option>
                            </select>
                            <select name="address[]" class="address" style="width: 100px;">
                                <option value="ddd" >ddd</option>
                                <option value="eee" >eee</option>
                                <option value="fff" >fff</option>
                            </select>
                        </td>
                    </tr>
                    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
                        <td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
                        <td align="left" valign="middle" class="borderright borderbottom main-for">
                            <input name="" type="submit" value="提交" class="text-but">
                            <input name="" type="reset" value="重置" class="text-but"></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
</body>
</html>