<?php
header ( "Content-type: text/html; charset=UTF-8" ); //设置文件编码格式
include ("../layouts/_header.php");
include ("../../conn/conn.php");

if (isset($_SESSION['userid'])&&$_SESSION['userid']!="") {
    ?>

    <body bgcolor="#fff0f5">
    <?php
    $userid = $_SESSION['userid'];
    $sql=mysqli_query($conn,"select * from tb_user where id='".$userid."'");
    $info=mysqli_fetch_array($sql);
    $username=$info['username'];
    $phone = $info['phone'];
    $wx = $info['wx'];

    $goodsId = $_GET['goodsId'];
    $sql_1=mysqli_query($conn,"select * from tb_goods where goodsId=".$goodsId."");
    $info_1=mysqli_fetch_object($sql_1);
    //以下语句可以输出SQL的错误信息
    //if(! $sql_1){
    //
    //    printf("Error: %s\n", mysqli_error($conn));
    //
    //    exit();
    //
    //}
    $goodsname=$info_1->goodsname;
    $number=$info_1->number;
    $price=$info_1->price;
    $sellerId=$info_1->sellerId;

    ?>


    <script>
        // 限制用户输入的信息
        function input(form) {
            if (form.number.value == "") {
                alert("请输入购买商品的数量!");
                return (false);
            }
            if (form.number.value ><?php echo $number;?> || form.number.value <=0){
                alert("商品数量过大或小于零，请重新输入!");
                return (false);
            }
        }

        // 使用ajax动态更新订单的总金额
        function showAggregate(num,price)
        {
            var xmlhttp;
            if (num.length==0||num==0)
            {
                document.getElementById("aggregate").innerHTML="0";
                return;
            }
            if (window.XMLHttpRequest)
            {
// IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                xmlhttp=new XMLHttpRequest();
            }
            else
            {
// IE6, IE5 浏览器执行代码
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    document.getElementById("aggregate").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","../../ajax/aggregate.php?num="+num+"&price="+price,true);
            xmlhttp.send();
        }
    </script>


    <div>
        <div class="div1">
            <div class="div3">
                <h2 >订单确认信息表</h2>
                <h5>由于是校园交易，仅支持面交！请确认好面交地点（默认地址图书馆门口），等待卖家与您取得联系！</h5>
                <br>
                <div>
                    <form action="../../models/order.php?goodsId=<?php echo $goodsId;?>&sellerId=<?php echo $sellerId?>&price=<?php echo $price?>&kucun=<?php echo $number?>" method="post" onSubmit="return input(this)">
                        <table border="0">
                            <tr>
                                <td>
                                    <lable>物品名称</lable>
                                    <br>
                                    <input type="text" disabled="disabled" name="goodsname" size="60%" value="<?php echo $goodsname ?>"> <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <lable>物品单价</lable>
                                    <br>
                                    <input type="text" disabled="disabled" name="price" size="60%" value="<?php echo $price ?>"> <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <lable>数量（目前库存：<?php echo $number?>）</lable>
                                    <br>
                                    <input type="text" name="number" size="60%" onkeyup="showAggregate(this.value,<?php echo $price?>)"> <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <lable>收货人姓名</lable>
                                    <br>
                                    <input type="text" name="buyerName" size="60%" value="<?php echo $username;?>"> <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <lable>收货人电话号码</lable>
                                    <br>
                                    <input type="text" name="phone" size="60%" value="<?php echo $phone ?>"> <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <lable>收货人微信</lable>
                                    <br>
                                    <input type="text" name="wx" size="60%" value="<?php echo $wx ?>"> <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <lable>交易地址</lable>
                                    <br>
                                    <input type="text" name="address" size="60%" value="图书馆门口"> <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>
                                        订单总金额:<span id="aggregate" ></span>
                                    </p> <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <li>
                                        <input type="submit" width="10px" name="submit" value="确认订单">
                                    </li>
                                    <li>
                                        <input type="button" width="10px" size="50px"  onclick="window.history.back()" value="返回">
                                    </li>
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