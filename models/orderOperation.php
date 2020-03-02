<?php
header("Content-type: text/html; charset=UTF-8"); //设置文件编码格式
include("../conn/conn.php");
//session_start();


$operation = $_GET['operation'];
$orderId = $_GET['orderId'];
$endTime = date("Y-m-j");

//确认订单
if ($operation ==0){
    mysqli_query($conn,"update tb_order set starus ='订单已完成' , endTime ='".$endTime."' where orderId=".$orderId);
    echo "<script>alert('确认收货成功！');history.back();</script>";
}

//撤销订单
if ($operation ==1){
    mysqli_query($conn,"update tb_order set starus ='订单已取消' , endTime ='".$endTime."' where orderId=".$orderId);
    echo "<script>alert('撤销订单成功！');history.back();</script>";
}

//删除订单
if ($operation ==2){
    mysqli_query($conn,"update tb_order set look =0  where orderId=".$orderId);
    echo "<script>alert('删除订单成功！');history.back();</script>";
}
