<?php
header ( "Content-type: text/html; charset=UTF-8" ); //设置文件编码格式
include ("../conn/conn.php");
session_start();

$userid = $_SESSION['userid'];
$needName = $_GET['needName'];
$introduction = $_GET['introduction'];
$type = $_GET['type'];
$price = $_GET['price'];
$phone = $_GET['phone'];
//$number = $_GET['number'];
$startTime=date("Y-m-j H:i:s");
$img=null;
//$img = $_GET[''];

$sql="insert into tb_need values (null,'".$needName."','未解决','".$price."','".$type."','".$startTime."','".$userid."','".$introduction."','".$img."','".$phone."')";

if(mysqli_query($conn,$sql))
{
    echo "<script>alert('发布需求物品成功!');window.location='../views/pages/needList_view';</script>";
}
else
{
    echo "<script>alert('需求发布失败！');history.back();</script>";
}

?>