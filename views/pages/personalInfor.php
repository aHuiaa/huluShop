<?php
header ( "Content-type: text/html; charset=UTF-8" ); //设置文件编码格式
include ("../layouts/_header.php");
include ("../../conn/conn.php");

if(isset($_SESSION['userid']) && $_SESSION['userid']!=""){
?>

<body>
<?php
$userid = $_SESSION['userid'];
$sql=mysqli_query($conn,"select * from tb_user where id='".$userid."'");
$info=mysqli_fetch_array($sql);
$username=$info['username'];
$password = $info['pwd'];
$phone = $info['phone'];
$wx = $info['wx'];
?>

<div>
    <div class="div1">
        <div class="div2">
            <a href="personalInfor.php" class="text1 active">个人信息</a>
            <a href="goodsList_view.php" class="text1">我的发布</a>
            <a href="needList_view.php" class="text1">我的需求</a>
            <a href="orderList_view.php" class="text1">交易记录</a>
        </div>
        <div class="div3">
            <h2 >个人信息表</h2>
            <br>
            <div>
                <form action="../../models/changeInfor.php" method="post">
                    <table border="0">
                        <tr>
                            <td>
                                <lable>用户名</lable>
                                <br>
                                <input type="text" name="username" size="60%" value="<?php echo $username ?>"> <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <lable>密码</lable>
                                <br>
                                <input type="text" name="password" size="60%" value="<?php echo $password ?>"> <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <lable>电话号码</lable>
                                <br>
                                <input type="text" name="phone" size="60%" value="<?php echo $phone ?>"> <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <lable>微信</lable>
                                <br>
                                <input type="text" name="wx" size="60%" value="<?php echo $wx ?>"> <br><br>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="submit" name="submit" value="信息更改">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
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
        left: 30%;
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
</style>