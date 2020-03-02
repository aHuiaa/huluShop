<?php
include ("../layouts/_header.php");
?>


<script language="javascript">
    function input(form)
    {
        if(form.id.value=="")
        {
            alert("请输入您的账号！!");
            return(false);
        }
        if(form.name.value=="")
        {
            alert("请输入您的姓名!");
            return(false);
        }
        if(form.phone.value=="")
        {
            alert("请输入您的手机号!");
            return(false);
        }
        if(form.wx.value=="")
        {
            alert("请输入您的微信!");
            return(false);
        }
        if(form.pwd.value=="")
        {
            alert("请输入注册密码!");
            return(false);
        }
        if(form.pwd1.value=="")
        {
            alert("请输入确认密码!");
            return(false);
        }
        if(form.pwd.value.length<6)
        {
            alert("注册密码长度应大于6!");
            return(false);
        }
        if(form.pwd.value!=form.pwd1.value)
        {
            alert("密码与重复密码不同!");
            return(false);
        }
        return(true);
    }
</script>


<meta charset="utf-8">
<body>
<form name="form1" method="post" action="../../models/enroll.php" class="div1" onSubmit="return input(this)">
    <div id="d1" class="div2">
        <div id="d2" class="div3">
            <a>用户注册</a><br>
        </div>
        <div id="d3">
            学号/工号：<input type="text" size="35" name="id" placeholder="请输入您的学号/工号！" class="_form-control"><br>
            姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：<input type="text" size="35" name="name" placeholder="请输入您的真实姓名！" class="_form-control"><br>
            手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：<input type="text" size="35" name="phone" placeholder="请输入您的手机号码！" class="_form-control"><br>
            微&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;信：<input type="text" size="35" name="wx" placeholder="请输入您微信账号！" class="_form-control"><br>
            密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" size="35" name="pwd" placeholder="请输入您的密码！" class="_form-control"><br>
            确认&nbsp;密码：<input type="password" size="35" name="pwd1" placeholder="请再次输入您的密码！" class="_form-control"><br>
        </div>
        <div id="d4" class="_button">
            <input type="submit" value="确认" class="_btn-info" onmouseover="this.style.backgroundColor='#aaa24e'" onmouseout="this.style.backgroundColor=''">
        </div>

    </div>
</form>
</body>


<style>
    div1{}
    .div2 {
        padding: 10px;
        margin: 10px;
        position: absolute;
        left: 35%;
        top: 19%;
        font-size: large;
        font-style: inherit;
        text-align: center;
    }
    .div3 a {
        font-family: 华文行楷;
        font-size: 65px;
        padding: 10px;
        margin: 10px;
        text-align: center;
    }
    ._form-control{
        height: 40px;
        margin: 10px;
        font-size: 15px;
        border-radius: 15px;

    }
    ._button{
        font-size: 8px;
        padding-top: 10px;
        alignment: center;

    }
    ._btn-info{
        background-color: #00aa00;
        font-size: 25px;
        width: 150px;
        cursor: pointer;
        border-radius: 10px;
    }
</style>