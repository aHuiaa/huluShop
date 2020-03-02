<?php
header ( "Content-type: text/html; charset=UTF-8" ); //设置文件编码格式
include "../layouts/_header.php";
include("../../conn/conn.php");

//用于限制button的disable属性，限制用户对订单的操作
$status1 = "交易进行中";
$status2 = "订单已取消";
$status3 = "订单已完成";

if (isset($_SESSION['userid'])&&$_SESSION['userid']!="") {
    ?>

    <body>
    <?php
    $userid = $_SESSION['userid'];
    $sql = mysqli_query($conn, "select * from tb_order where (sellerId ='" . $userid . "' or buyerId ='" . $userid . "') and look=1 order by orderId desc");
    ?>


    <div>
        <div class="div1">
            <div class="div2">
                <a href="personalInfor.php" class="text1">个人信息</a>
                <a href="goodsList_view.php" class="text1">我的发布</a>
                <a href="needList_view.php" class="text1">我的需求</a>
                <a href="orderList_view.php" class="text1 active">交易记录</a>
            </div>
            <div class="div3">
                <div style="position: relative;  "><br>
                    <table frame="border" rules="all" >
                        <tr bgcolor="#FFCF60" >
                            <th width="">订单号</th>
                            <th>商品</th>
                            <th>数量</th>
                            <th>卖家账号</th>
                            <th>买家账号</th>
                            <th>收货人</th>
                            <th>买家电话</th>
                            <th>交易地点</th>
                            <th>创建时间</th>
                            <th>完成时间</th>
                            <th>订单状态</th>
                            <th>用户操作</th>
                        </tr>
                        <?php
                        if ($info = mysqli_fetch_array($sql)) {
                            do {
                                ?>
                                <tr bgcolor="#FFFFFF">
                                    <td ><?php echo $info['orderId']; ?></td>
                                    <td ><?php echo $info['number']; ?></td>
                                    <td ><?php
                                        $sql2 = mysqli_query($conn, "select goodsname from tb_goods where goodsId='" . $info['goodsId'] . "'");
                                        $info2 = mysqli_fetch_array($sql2);
                                        echo $info2['goodsname']; ?></td>
                                    <td ><?php echo $info['sellerId']; ?></td>
                                    <td ><?php echo $info['buyerId']; ?></td>
                                    <td ><?php echo $info['buyerName']; ?></td>
                                    <td ><?php echo $info['phone']; ?></td>
                                    <td ><?php echo $info['address']; ?></td>
                                    <td ><?php echo $info['startTime']; ?></td>
                                    <td ><?php echo $info['endTime']; ?></td>
                                    <td ><?php echo $info['starus']; ?></td>
                                    <td >
                                        <?php if($_SESSION['userid'] == $info['buyerId']){?>
                                        <input type="button" name="true" value="完成"
                                            <?php if ($info['starus'] == $status2 || $info['starus'] == $status3){
                                                echo " disabled=\"disabled\" ";
                                            }?>
                                               onclick="location.href='../../models/orderOperation.php?operation=0&orderId=<?php echo $info['orderId'] ?>'">
                                        <input type="button" name="cancel" value="撤销"
                                            <?php if ($info['starus'] == $status2 || $info['starus'] == $status3){
                                                echo " disabled=\"disabled\" ";
                                            }?>
                                               onclick="location.href='../../models/orderOperation.php?operation=1&orderId=<?php echo $info['orderId'] ?>'">
                                        <input type="button" name="delete" value="删除"
                                            <?php if ($info['starus'] == $status1){
                                                echo " disabled=\"disabled\" ";
                                            }?>
                                               onclick="location.href='../../models/orderOperation.php?operation=2&orderId=<?php echo $info['orderId'] ?>'">
                                    <?php }else{?>
                                            <input type="button" name="cancel" value="拒绝"
                                                <?php if ($info['starus'] == $status2 || $info['starus'] == $status3){
                                                    echo " disabled=\"disabled\" ";
                                                }?>
                                                   onclick="location.href='../../models/orderOperation.php?operation=1&orderId=<?php echo $info['orderId'] ?>'">
                                            <input type="button" name="delete" value="删除"
                                                <?php if ($info['starus'] == $status1){
                                                    echo " disabled=\"disabled\" ";
                                                }?>
                                                   onclick="location.href='../../models/orderOperation.php?operation=2&orderId=<?php echo $info['orderId'] ?>'">
                                    <?php }?>
                                    </td>
                                </tr>
                                <?php
                            } while ($info = mysqli_fetch_array($sql));
                        }
                        ?>
                    </table>
                    </td>
                </div>
            </div>
    </body>
    <?php
}else{
    echo "<script>alert('警告！请先登录！');window.location.href='login_view.php'</script>";
    exit();
}
?>


<style>
    .div1{
        position: absolute;
        width: 80%;
        left: 15%;
        top: 25%;
    }
    .div2 {
        padding: 0px;
        margin: 0px;
        position: relative;
        width: 15%;
        height: 100%;
        left: -16%;
        font-size: large;
        display:inline-block;
    }
    .div3{
        width: 100%;
        position: absolute;
        left: 0%;
        display:inline-block;
        text-align: left;
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