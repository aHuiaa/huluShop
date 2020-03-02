<?php
header ( "Content-type: text/html; charset=UTF-8" ); //设置文件编码格式
include ("../conn/conn.php");
session_start();

$userid = $_SESSION['userid'];
$username=$_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$wx = $_POST['wx'];

$sql="update tb_user set username='".$username."', pwd='".$password."', phone='".$phone."',wx='".$wx."'";

if(mysqli_query($conn,$sql))
{
    echo "<script>alert('信息更新成功!');window.location='../views/pages/personalInfor.php';</script>";
}
else
{
    echo "<script>alert('信息更新失败！');history.back();</script>";
}

?>