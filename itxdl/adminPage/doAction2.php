<?php
/**
 * Created by PhpStorm.
 * User: hxsd
 * Date: 2018/1/5
 * Time: 11:12
 */

    //引用文件
    require "../config.php";
    require "../Model.class.php";
    require "./my_functions.php";

    //实例化
    $type = new Model('type');

switch ($_GET['b']){
        case 'insert':
//            var_dump($_POST);
            if($_POST['pid']==0){   //添加一级分类
                //准备数据，进行添加
                $data=array('name'=>$_POST['name'],'status'=>$_POST['status']);
                $res = $type->add($data);

                //判断是否成功
                if($res){
                    echo "<script>alert('恭喜，父类添加成功！');window.location.href='main_menu.php'</script>";
                }else{
                    echo "<script>alert('抱歉，父类添加失败！');window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
                }
            }
            if($_POST['pid']==1){   //添加二级分类
                $data=array(
                    'name'=>$_POST['name'],
                    'status'=>$_POST['status'],
                    'pid'=>$_POST['father'],
                    'path'=>'0-'.$_POST['father'],
                    'blogo'=>$_FILES['blogo']['name']
                );
                $res = $type->add($data);
                //判断是否成功
                if($res){
                    echo "<script>alert('恭喜，子类添加成功！');window.location.href='main_menu.php'</script>";
                }else{
                    echo "<script>alert('抱歉，子类添加失败！');window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
                }
            }
            break;
        case 'delete':
            //查询点击那一条信息的pid,看是一级还是二级
            $line = $type->find($_GET['i']);
            if($line['pid']==0){
                //1. 删除一级主题，需把分类下所有二级主题一并删除
                //1.1 删一级
                $res1 = $type->del($_GET['i']);

                //1.2 判断是否包含有二级主题
                $sql="select * from type where pid={$_GET['i']}";
                $res = $type->query($sql);
                if($res){  //包含二级分类
                    //删二级
                    $sql="delete from type where pid={$_GET['i']}";
                    $res2 = $type->query($sql);
                    if($res1!=false && $res2!=false){
                        echo "<script>alert('恭喜！删除成功');window.location.href='main_menu.php';</script>";
                    }else{
                        echo "<script>alert('抱歉！删除失败');window.location.href='{$_SERVER['HTTP_REFERER']}';</script>";
                    }
                }else{   //不包含二级分类
                    if($res1!=false){
                        echo "<script>alert('恭喜！删除成功');window.location.href='main_menu.php';</script>";
                    }else{
                        echo "<script>alert('抱歉！删除失败');window.location.href='{$_SERVER['HTTP_REFERER']}';</script>";
                    }
                }
            }else{
                //2. 删除二级主题
                $res = $type->del($_GET['i']);
                if($res!=false){
                    echo "<script>alert('恭喜，删除成功！');window.location.href='main_menu.php';</script>";
                }else{
                    echo "<script>alert('抱歉！删除失败');window.location.href='{$_SERVER['HTTP_REFERER']}';</script>";
                }
            }

        break;
        case 'change':
            //一级
            if($_POST['apart']==0){
                $_POST['pid']=0;
            }

            //二级
            if($_POST['apart']==1){
                $_POST['blogo']=$_FILES['blogo']['name'];
                $_POST['path']='0-'.$_POST['pid'];
            }

            $res = $type->save($_POST);
            //判断
            if($res!=false){
                echo "<script>alert('恭喜，修改成功！');window.location.href='main_menu.php'</script>";
            }else{
                echo "<script>alert('抱歉，修改失败！');window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
                die;
            }
            break;
    }