<?php
header ( "Content-type: text/html; charset=UTF-8" ); //设置文件编码格式
include ("../conn/conn.php");
session_start();

$userid = $_SESSION['userid'];
$goodsname = $_GET['goodsName'];
$introduction = $_GET['introduction'];
$type = $_GET['type'];
$price = $_GET['price'];
$number = $_GET['number'];
$startTime=date("Y-m-j H:i:s");
$img=null;
//$img = $_GET[''];

$sql="insert into tb_goods values (null,'".$goodsname."','售卖中','".$price."','".$type."','".$number."','".$startTime."','".$userid."','".$introduction."','".$img."')";

if(mysqli_query($conn,$sql))
{
    echo "<script>alert('发布闲置物品成功!');window.location='../views/pages/goodsList_view';</script>";
}
else
{
    echo "<script>alert('闲置物品发布失败！');history.back();</script>";
}

?>