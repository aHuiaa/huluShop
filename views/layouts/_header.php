<?php
header ( "Content-type: text/html; charset=UTF-8" );
session_start();
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body>
<div class="top">
    <ul>
        <li><a href="../pages/index.php"><div><img src="../images/hulu.png" width="50px" height="70px" alt="logo"></div><div>市场首页<br><span>HOME</span></div></a></li>

        <a style="font-size: 40px;font-family: 华文彩云;alignment: center;width: 30%;">葫芦里卖的什么货？卖~二手！</a>

        <input type="text" name="search" size="25px" placeholder="请输入你想要查找的东西！" class="form-control">
        <input type="button" name="btn-search" value="搜索" class="btn-info" onmouseover="this.style.backgroundColor='#aaa24e'" onmouseout="this.style.backgroundColor=''">
        <li style="float: right"><a href="../pages/enroll_view.php"><div><img src="../images/hulu.png" width="50px" height="70px" alt="logo"></div><div>注册<br><span>ENROLL</span></div></a></li>
        <li style="float: right"><a href="<?php
            if (isset($_SESSION['username']) && $_SESSION['username']!=""){
                echo "../../models/loginout.php";
            }else{
                echo "../pages/login_view.php";
            }

            ?>"><div><img src="../images/hulu.png" width="50px" height="70px" alt="logo"></div>
                <div>
                    <?php
                    if(isset($_SESSION['username']) && $_SESSION['username']!=""){
                        echo $_SESSION['username'];
                    }else echo "登录";
                    ?><br><span>
                                <?php
                                if(isset($_SESSION['username']) && $_SESSION['username']!=""){
                                    echo "LOGINOUT";
                                }else echo "LOGIN";?>
                                </span></div></a></li>
    </ul>
</div>
</body>
</html>
<style>
    .top{
        z-index: 99999;
        position: fixed;

    }
    ul {
        background-color: #b0e4c6;
        padding: 0;
        margin: -10px;
        list-style-type: none;
        overflow: hidden;
        position: fixed;
        width: 100%;
    }
    li {
        width: 150px;
        display: inline-block;
        font-size: 20px;
        margin-top: 3px;
        border-right:1px solid #ffffff;
        text-align: center;
    }
    li a {
        color: #45d8de
        text-align: center;
        font-family: yuwei;
    }
    li a span{
        font-size: 15px;
        color: #7E7777;
        position: relative;
        text-align: center;
    }
    a:hover{color: #fb3520;}
    .form-control{
        height: 30px;
        margin: 10px;
        font-size: 15px;
        border-radius: 5px;

    }
    .btn-info{
        background-color: #00aa00;
        font-size: 20px;
        width: auto;
        cursor: pointer;
        border-radius: 5px;
    }
</style>