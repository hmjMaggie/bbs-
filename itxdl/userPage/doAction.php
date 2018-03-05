<?php
require "../config.php";
require "../Model.class.php";

//添加数据
switch ($_GET['a']){
    case "insert":
        $title = $_POST['title'];
        $content = $_POST['content'];
        $ctime = $_POST['time'];
        $author = $_POST['author'];

        $data = array(
            'title'=>$title,
            'content'=>$content,
            'ctime'=>$ctime,
            'author'=>$author
        );

        $post = new Model('post');
        $res = $post->add($data);
        if($res!=false){
            echo "<script>alert('添加成功');window.location.href='list.php'</script>";
          }else{
            echo "<script>alert('添加失败');window.location.href='release.php'</script>";
          }
        break;

        case "user":
            if($_POST['password']!=$_POST['ispassword']){
                echo "<script>alert('两次密码不一致！');location.href='{$_SERVER['HTTP_REFERER']}'</script>";
                die;
            }

            $data=array(
                "userName"=>$_POST['userName'],
                "password"=>$_POST['password'],
            );
            $user=new Model('user');
            $res1=$user->add($data);

            $dataDetail=array(
                "email"=>$_POST['email'],
                "qq"=>$_POST['qq'],
                "phones"=>$_POST['phones']
            );
            $userdetail=new Model('userdetail');
            $res2=$userdetail->add($dataDetail);

            if($res1&&$res2){
                echo "<script>alert('注册成功！');location.href='login.html'</script>";
            }else{
                echo "<script>alert('注册失败！');location.href='{$_SERVER['HTTP_REFERER']}'</script>";
            }

            break;
}
?>