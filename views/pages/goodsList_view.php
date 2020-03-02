<?php
header ( "Content-type: text/html; charset=UTF-8" ); //设置文件编码格式
include "../layouts/_header.php";
include("../../conn/conn.php");

if (isset($_SESSION['userid'])&&$_SESSION['userid']!="") {
?>


<body >
<?php
$userid=$_SESSION['userid'];
$sql=mysqli_query($conn,"select * from tb_goods where sellerId='".$userid."' order by goodsId desc");
$info=mysqli_fetch_array($sql);
$goodsname=$info['goodsname'];
$status=$info['status'];  //闲置商品的状态
$price=$info['price'];
$type=$info['type'];
$startTime=$info['startTime'];
?>
<div>
    <div class="div1">
        <div class="div2">
            <a href="personalInfor.php" class="text1">个人信息</a>
            <a href="goodsList_view.php" class="text1 active" >我的发布</a>
            <a href="needList_view.php" class="text1">我的需求</a>
            <a href="orderList_view.php" class="text1">交易记录</a>
        </div>
        <div class="div3">
            <lable>&nbsp;&nbsp;&nbsp;&nbsp;发布物品</lable>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="发布新闲置" class="" onclick="location.href='addGoods_view.php'">

            <div style="position: relative; width=500px ;height:400px; overflow: auto; left:-8%;top:50%;"><br>
                            <table width="600" border="1" align="center" cellpadding="5" cellspacing="1" >
                                <tr bgcolor="#FFCF60">
                                    <th >发布时间</th>
                                    <th  height="20">商品名称</th>
                                    <th >状态</th>
                                    <th >出售价格</th>
                                    <th >类型</th>
                                </tr>
                                <?php
                                do {
                                    ?>
                                    <tr bgcolor="#FFFFFF">
                                        <td height="20" ><?php echo $info['startTime']; ?></td>
                                        <td height="20"><?php echo $info['goodsname']; ?></td>
                                        <td height="20"><?php echo $info['status']; ?></td>
                                        <td height="20"><?php echo $info['price']; ?></td>
                                        <td height="20"><?php echo $info['type']; ?></td>
                                    </tr>
                                    <?php
                                }while ($info=mysqli_fetch_array($sql))
                                ?>
                            </table></td>
            </div>
        </div>
</body>
    <?php

}else{
    echo "<script>alert('警告！请先登录！');window.location.href='login_view.php'</script>";
    exit();
}?>


<style>
    .div1{
        position: absolute;
        width: 80%;
        left: 10%;
        top: 25%;
    }
    .div2 {
        padding: 0px;
        margin: 0px;
        position: relative;
        width: 20%;
        height: 100%;
        left: 0%;
        top: 20%;
        font-size: large;
        display:inline-block;
    }
    .div3{
        width: 70%;
        position: absolute;
        top: 0%;
        left: 20%;
        display:inline-block;
    }
    .text1{
        position: relative;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid #ddd;
        text-decoration: none;
    }
    .text1.active{
        z-index: 2;
        color: #fff;
        background-color: #337ab7;
        border-color: #337ab7;
    }
    .table1{

    }
</style>