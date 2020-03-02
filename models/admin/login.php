<?php
header ( "Content-type: text/html; charset=UTF-8" ); //设置文件编码格式
include ("../../conn/conn.php");
$id=$_POST['id'];
$pwd=$_POST['pwd'];

//登录
class login{
    var $id;
    var $pwd;

    function login($x,$y){
        $this->id=$x;
        $this->pwd=$y;
    }

    //检查账户密码是否正确
    function chklogin(){
        include("../../conn/conn.php");
        $sql=mysqli_query($conn,"select * from tb_admin where adId='".$this->id."'");
        $info=mysqli_fetch_array($sql);
        if($info==false){
            echo "<script language='javascript'>alert('不存在此用户！');history.back();</script>";
            exit;
        }
        if($info['pwd']==$this->pwd)
        {
            session_start();
            $_SESSION['adId']=$info['adId'];
            header("location:../../views/admin/index.php");
            exit;
        }
        else {
            echo "<script language='javascript'>alert('密码输入错误！');history.back();</script>";
            exit;
        }

    }

}

$obj=new login(trim($id),trim($pwd));
$obj->chklogin();
?>