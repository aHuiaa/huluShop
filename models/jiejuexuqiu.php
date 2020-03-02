<?php
header ( "Content-type: text/html; charset=UTF-8" ); //设置文件编码格式
include("../conn/conn.php");
session_start();

$needId = $_GET['needId'];
$sql = "update tb_need set status='已解决' where needId=".$needId;

if(mysqli_query($conn,$sql))
{
    echo "<script>alert('操作成功!');history.back();</script>";
}
else
{
    echo "<script>alert('操作失败！');history.back();</script>";
}
?>