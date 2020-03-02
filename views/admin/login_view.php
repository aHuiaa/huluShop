<?php
header ( "Content-type: text/html; charset=UTF-8" );
?>
<script language="javascript">
    function input(form) {
        if (form.id.value == "") {
            alert("请输入您的账号!");
            return (false);
        }
        if (form.pwd.value == "") {
            alert("请输入您的密码!");
            return (false);
        }
    }
</script>
<body>
<title>葫芦二手交易网</title>
<div class="div1">
    <form name="login" method="post" action="../../models/admin/login.php" onSubmit="return input(this)">
        <div class="div2">
            <h2 align="center" >欢迎登录葫芦二手交易网！</h2>
            <h2 style="color: #1c94c4;font-size: xx-large">管理员登录页面</h2>
            <div >
                账号：<input name="id" type="text" size="50" placeholder="请输入管理员账号！" class="l_form-control">
                <br>
            </div>
            <div>
                密码：<input name="pwd" placeholder="请输入您的密码！" size="50" type="password" class="l_form-control">
                <br>
            </div>
            <div class="l_button">
                <input name="submit" type="submit" value="登录" class="l_btn-info" onmouseover="this.style.backgroundColor='#aaa24e'" onmouseout="this.style.backgroundColor=''">
            </div>
        </div>
    </form>
</div>

</body>


<style>
    body {
        background: #c8e3d3;
    }
    .div1{
        alignment: center;
    }
    .div2 {
        padding: 10px;
        margin: 10px;
        position: absolute;
        left: 30%;
        top: 20%;
        font-size: large;
        font-style: inherit;
    }
    .l_form-control{
        height: 40px;
        margin: 10px;
        font-size: 15px;
        border-radius: 15px;

    }
    .l_button{
        font-size: 8px;
        padding-top: 10px;
    }
    .l_btn-info{
        background-color: #00aa00;
        font-size: 25px;
        width: auto;
        cursor: pointer;
        border-radius: 10px;
    }

</style>

