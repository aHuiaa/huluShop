<?php
header ( "Content-type: text/html; charset=UTF-8" ); //设置文件编码格式
include "../layouts/_header.php";

if(isset($_SESSION['userid']) && $_SESSION['userid']!=""){
?>

<!--控制输入的内容是否为空-->
    <script language="javascript">
        function input(form) {
            if (form.needName.value == "") {
                alert("请输入需求物品的名称!");
                return (false);
            }
            if (form.introduction.value == "") {
                alert("请输入需求物品的简介!");
                return (false);
            }
            if (form.price.value == "") {
                alert("请输入需求物品的价格!");
                return (false);
            }
            if (form.phone.value == "") {
                alert("请输入你的联系电话!");
                return (false);
            }

        }
    </script>

<body>

<div>
    <div class="div1">
        <div class="div2">
            <a href="personalInfor.php" class="text1">个人信息</a>
            <a href="goodsList_view.php" class="text1">我的发布</a>
            <a href="needList_view.php" class="text1 active">我的需求</a>
            <a href="orderList_view.php" class="text1">交易记录</a>
        </div>
        <div class="div3">
            <lable>请输入您想要的物品的具体信息</lable>
            <br>
            <div>
                <form action="../../models/addNeed.php" method="get" onSubmit="return input(this)">
                    <table border="0">

                        <tr>
                            <td>
                                <lable>物品名</lable>
                                <br>
                                <input type="text" name="needName" size="60%"><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <lable>需求简介</lable>
                                <br>
                                <textarea name="introduction" cols="60%" rows="8"></textarea><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <lable>物品种类</lable>
                                <br>
                                <select name="type">
                                    <option value="tool">工具</option>
                                    <option value="sports">运动品</option>
                                    <option value="book">书籍</option>
                                    <option value="cloths">衣物</option>
                                    <option value="others">其他</option>
                                </select>
                                <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <lable>接受的价格区间：</lable>
                                <input type="text" name="price" size="15px" placeholder="例如：“50-250”">元<br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <lable>联系电话：</lable>
                                <input type="text" name="phone" size="15px"><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit1" value="提交">
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