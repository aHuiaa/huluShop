<?php
header ( "Content-type: text/html; charset=UTF-8" ); //设置文件编码格式
include("../../conn/conn.php");

$userid = $_GET['userid'];
$sql=mysqli_query($conn,"select dongjie from tb_user where id=".$userid);
$info=mysqli_fetch_array($sql);
$sql2="update tb_user set dongjie =1 where id=".$userid;
$sql3="update tb_user set dongjie =0 where id=".$userid;

//dongjie为0时，账号为正常状态，dongjie为1时，账号为冻结状态，用户状态为1时，不可登录
if($info['dongjie'] == 0){
    if (mysqli_query($conn,$sql2)){
        echo "<script>alert('更改状态成功！');history.back();</script>";

    }else{
        echo "<script>alert('更改状态失败！');history.back();</script>";
    }
}else{
    if(mysqli_query($conn,$sql3)){
        echo "<script>alert('更改状态成功！');history.back();</script>";
    }else{
        echo "<script>alert('更改状态失败！');history.back();</script>";
    }
}
