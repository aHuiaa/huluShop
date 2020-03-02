<!--//显示商品的详细信息-->
<?php
include ("../../conn/conn.php");
include ("../layouts/_header.php");

$goodsId = $_GET['goodsId'];
$sql = mysqli_query($conn,"select * from tb_goods where goodsId=".$goodsId);
$info = mysqli_fetch_array($sql);


if($info==true){
    ?>
    <title>商品详情页</title>
    <body bgcolor="#fff0f5" >
    <div class="div1">
        <table width="700" height="400" frame="box" rules="all" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#e6e6fa">
            <tr>
                <td width="400" rowspan="6">
                    <div align="center">
                        <?php
                        if(trim($info['img']=="")){
                            echo '<img src="../images/hulu.png" width="400" height="400" border="0">';
                            echo "<br>暂无图片";
                        }
                        else{
                            ?>
                            <img src="<?php echo $info['img'];?>" width="400" height="400" border="0">
                            <?php
                        }
                        ?>
                    </div>
                </td>
                <td><font color="#000000">商品名称：</font><font color="FF6501">&nbsp;<?php echo $info['goodsname'];?></font></td>
                &nbsp;</tr>
            <tr>
                <td><font color="#000000">商品价格：</font><font color="FF6501"><?php echo $info['price']."元";?></font></td>
            </tr>
            <tr>
                <td><font color="#000000">商品数量：</font><font color="FF6501"><?php echo $info['number'];?></font></td>
            </tr>
            <tr>
                <td><font color="#000000">上架时间：</font><font color="FF6501"><?php echo $info['startTime'];?></font></td>
            </tr>
            <tr>
                <td height="200" align="left" valign="top" ><font color="#000000">
                        <p>商品简介：<br>
                        </p>
                        <p style="text-indent:2em;"></font><font color="FF6501"><?php echo $info['introduction'];?></font></p></td>
            </tr>
            <tr>
                <td height="50" >
                    <a href="order_view.php?goodsId='<?php echo $info['goodsId']?>'"><input type="button"  value="购买" /></a>
                    <a ><input type="button"  value="返回" onclick="window.history.back()"/></a>
                </td>
            </tr>
            </tr>
        </table>
    </div>
    </body>
    <?php
}
?>
<style>
    .div1 {
        padding: 0px;
        margin: -10px;
        position: absolute;
        top: 23%;
        font-size: large;
        font-style: inherit;
        text-align: center;
        width: 100%;
    }
</style>
