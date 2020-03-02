<?php
header ( "Content-type: text/html; charset=UTF-8" ); //设置文件编码格式
session_start();
include("../conn/conn.php");
$id=$_POST['id'];
$username=$_POST['name'];
$pwd=$_POST['pwd'];
$phone=$_POST['phone'];
$wx=$_POST['wx'];
$zt=0;
$enTime=date("Y-m-j");
$sql=mysqli_query($conn,"select * from tb_user where id='".$id."'");
$info=mysqli_fetch_array($sql);
if($info==true)
{
    echo "<script>alert('该账号已经存在!');history.back();</script>";
}
else
{
    $re=mysqli_query($conn,"INSERT INTO tb_user(id,username,pwd,phone,wx,dongjie,entime) VALUES ('".$id."','".$username."','".$pwd."','".$phone."','".$wx."','".$zt."','".$enTime."')");//在后面加or die("数据库".mysqli_error($conn))可输出数据库插入错误信息！
    echo "<script>alert('恭喜！注册成功！');window.location='../views/pages/login_view';</script>";
}

?>
