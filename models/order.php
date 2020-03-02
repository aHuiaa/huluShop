<?php
header("Content-type: text/html; charset=UTF-8"); //设置文件编码格式
include("../conn/conn.php");
session_start();

$sellerId = $_GET['sellerId']; //卖家的ID
$buyerId = $_SESSION['userid'];//登录账号的ID
$buyerName = $_POST['buyerName'];//收货人的姓名
$goodsId= $_GET['goodsId'] ;//商品的ID
$number = $_POST['number'];//商品购置数量
$address = $_POST['address'];//收获地址
$phone = $_POST['phone'];//收获人的电话号码
$wx = $_POST['wx'];//收货人的微信
$price = $_GET['price'];//商品的单价
$aggregate = $price*$number;  //订单的总额
$starus = "交易进行中";//交易的状态
$startTime = date("Y-m-j H:i:s"); //订单开始的时间
$endTime=null;
$kucun=$_GET['kucun']-$number;


//插入订单信息!!!通过GET获取的数据在插入数据库的时候变量不用加单引号''而通过POST获取的数据需要加单引号
$sql="INSERT INTO tb_order VALUES (null,".$sellerId.",'".$buyerId."','".$buyerName."',".$goodsId.",'".$number."','".$aggregate."','".$address."','".$phone."','".$wx."','".$starus."','".$startTime."','".$endTime."',1)";
$sql_2="update tb_goods set number ='".$kucun."' where goodsID =".$goodsId;
if (mysqli_query($conn, $sql)) {

    if (mysqli_query($conn, $sql_2)){
        echo "<script>alert('订单保存成功!');window.location='../views/pages/orderList_view';</script>";
    }else {
        echo "<script>alert('订单保存失败！');history.back();</script>";
    }

} else {
    echo "<script>alert('订单保存失败！');history.back();</script>";
}
?>