<?php
header ( "Content-type: text/html; charset=UTF-8" ); //设置文件编码格式
include "../layouts/_header.php";
include("../../conn/conn.php");


if (isset($_SESSION['userid'])&&$_SESSION['userid']!="") {
?>

<body >
<?php
$userid1=$_SESSION['userid'];
$sql=mysqli_query($conn,"select * from tb_need where needUserId='".$userid1."' order by needId desc");
$info=mysqli_fetch_array($sql);
$needname=$info['needName'];
$status=$info['status'];  //表示需求物品订单是否得到解决
$price=$info['price'];
$type=$info['type'];
$startTime=$info['startTime'];
$starus ="已解决";
?>
<div>
    <div class="div1">
        <div class="div2">
            <a href="personalInfor.php" class="text1">个人信息</a>
            <a href="goodsList_view.php" class="text1" >我的发布</a>
            <a href="needList_view.php" class="text1 active">我的需求</a>
            <a href="orderList_view.php" class="text1">交易记录</a>
        </div>
        <div class="div3">
            <lable>&nbsp;&nbsp;&nbsp;&nbsp;发布需求</lable>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="发布新需求" class="" onclick="location.href='addNeed_view.php'">
            <div style="position: relative; width=500px ;height:400px; overflow: auto; left:-8%;top:50%;"><br>
                            <table border="1" align="center" cellpadding="5" cellspacing="1" >
                                <tr bgcolor="#FFCF60">
                                    <td >发布时间</td>
                                    <td  height="20">物品名称</td>
                                    <td >状态</td>
                                    <td >接受价格</td>
                                    <td >类型</td>
                                    <td >用户操作</td>
                                </tr>
                                <?php
                                do {
                                    ?>
                                    <tr bgcolor="#FFFFFF">
                                        <td height="20" ><?php echo $info['startTime']; ?></td>
                                        <td height="20"><?php echo $info['needName']; ?></td>
                                        <td height="20"><?php echo $info['status']; ?></td>
                                        <td height="20"><?php echo $info['price']; ?></td>
                                        <td height="20"><?php echo $info['type']; ?></td>
                                        <td height="20"><input type="button" value="已解决"
                                                <?php if ($info['status'] == $starus){
                                                    echo " disabled=\"disabled\" ";
                                                }?> onclick="location.href='../../models/jiejuexuqiu.php?needId=<?php echo $info['needId']?>'"></td>
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