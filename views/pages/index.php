<?php
header ( "Content-type: text/html; charset=UTF-8" );
include ("../layouts/_header.php");
include ("../../conn/conn.php");
?>
<body>
<div class="div1">
    <div>
        <img src="../images/biaotu.jpg" width="100%">
    </div>
    <div class="div2">
        <div class="i_button">
            <input type="button" name="need" value="查看需求" onclick="location.href='showNeed_view.php?type=all'" class="i_btn-info" onmouseover="this.style.backgroundColor='#8addde'" onmouseout="this.style.backgroundColor=''">
        </div>
        <div class="i_button">
            <input type="button" name="unused" value="我的闲置" onclick="location.href='goodsList_view.php'" class="i_btn-info" onmouseover="this.style.backgroundColor='#8addde'" onmouseout="this.style.backgroundColor=''">
        </div>
        <div class="i_button">
            <input type="button" name="need" value="我的需求" onclick="location.href='needList_view.php'" class="i_btn-info" onmouseover="this.style.backgroundColor='#8addde'" onmouseout="this.style.backgroundColor=''">
        </div>
        <div class="div3">
            <a href="showGoods_view.php?type=tool"><img src="../images/tools.jpg"></a>
            <a href="showGoods_view.php?type=sports"><img src="../images/sports.jpg"></a>
        </div>
        <div >
            <a href="showGoods_view.php?type=cloths"><img src="../images/apparel.jpg"></a>
            <a href="showGoods_view.php?type=book"><img src="../images/books.jpg"></a>
            <a href="showGoods_view.php?type=all"><img src="../images/viewall.jpg" width="21%" height="34%"></a>
        </div>
    </div>
    <div class="div4">
        <center> <label>------------------------------最新闲置------------------------------</label></center>
        <table frame="box" rules="all" style="background:#dbf9e8">
            <tr>
                <td>
                    <?php
                    $sql=mysqli_query($conn,"select * from tb_goods where number >0 order by goodsId desc limit 0,1");
                    $info=mysqli_fetch_array($sql);
                    if($info==false){
                        echo "暂无推荐产品!";
                    }
                    else {
                        ?>
                        <table width="270"  border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="130" rowspan="5">
                                    <div align="center">
                                        <?php
                                        if(trim($info['img']=="")){
                                            echo '<img src="../images/hulu.png" width="80" height="80" border="0">';
                                            echo "<br>暂无图片";
                                        }
                                        else{
                                            ?>
                                            <img src="<?php echo $info['img'];?>" width="80" height="80" border="0">
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td width="11" height="16">&nbsp;</td>
                                <td width="124"><font color="FF6501">&nbsp;<?php echo $info['goodsname'];?></font></td>
                            </tr>
                            <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">商品价格：</font><font color="FF6501"><?php echo $info['price'];?></font></td>
                            </tr>
                            <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">商品数量：</font><font color="FF6501"><?php echo $info['number'];?></font></td>
                            </tr>
                            <tr>
                                <td height="50" colspan="2">
                                    <a href="showGoodsInfo_view.php?goodsId='<?php echo $info['goodsId']; ?>'"><input type="button"  value="查看详情" /></a>
                                    <a href="order_view.php?goodsId='<?php echo $info['goodsId']?>'"><input type="button"  value="购买" /></a>
                                </td>
                            </tr>
                            </tr>

                        </table>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $sql=mysqli_query($conn,"select * from tb_goods where number >0 order by goodsId desc limit 1,1");
                    $info=mysqli_fetch_array($sql);
                    if($info==false){
                        echo "暂无推荐产品!";
                    }
                    else {
                        ?>
                        <table width="270"  border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="130" rowspan="5">
                                    <div align="center">
                                        <?php
                                        if(trim($info['img']=="")){
                                            echo '<img src="../images/hulu.png" width="80" height="80" border="0">';
                                            echo "<br>暂无图片";
                                        }
                                        else{
                                            ?>
                                            <img src="<?php echo $info['img'];?>" width="80" height="80" border="0">
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td width="11" height="16">&nbsp;</td>
                                <td width="124"><font color="FF6501">&nbsp;<?php echo $info['goodsname'];?></font></td>
                            </tr>
                            <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">商品价格：</font><font color="FF6501"><?php echo $info['price'];?></font></td>
                            </tr>
                            <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">商品数量：</font><font color="FF6501"><?php echo $info['number'];?></font></td>
                            </tr>
                            <tr>
                                <td height="50" colspan="2">
                                    <a href="showGoodsInfo_view.php?goodsId='<?php echo $info['goodsId']; ?>'"><input type="button"  value="查看详情" /></a>
                                    <a href="order_view.php?goodsId='<?php echo $info['goodsId']?>'"><input type="button"  value="购买" /></a>
                                </td>
                            </tr>
                            </tr>

                        </table>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $sql=mysqli_query($conn,"select * from tb_goods where number >0 order by goodsId desc limit 2,1");
                    $info=mysqli_fetch_array($sql);
                    if($info==true){
                        ?>
                        <table width="270"  border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="130" rowspan="5">
                                    <div align="center">
                                        <?php
                                        if(trim($info['img']=="")){
                                            echo '<img src="../images/hulu.png" width="80" height="80" border="0">';
                                            echo "<br>暂无图片";
                                        }
                                        else{
                                            ?>
                                            <img src="<?php echo $info['img'];?>" width="80" height="80" border="0">
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td width="11" height="16">&nbsp;</td>
                                <td width="124"><font color="FF6501">&nbsp;<?php echo $info['goodsname'];?></font></td>
                            </tr>
                            <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">商品价格：</font><font color="FF6501"><?php echo $info['price'];?></font></td>
                            </tr>
                            <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">商品数量：</font><font color="FF6501"><?php echo $info['number'];?></font></td>
                            </tr>
                            <tr>
                                <td height="50" colspan="2">
                                    <a href="showGoodsInfo_view.php?goodsId='<?php echo $info['goodsId']; ?>'"><input type="button"  value="查看详情" /></a>
                                    <a href="order_view.php?goodsId='<?php echo $info['goodsId']?>'"><input type="button"  value="购买" /></a>
                                </td>
                            </tr>
                            </tr>

                        </table>
                        <?php
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
        <br><br><br><br><br><br><br>
        <div class="div4">
            <center><label>------------------------------最新需求------------------------------</label></center>
            <table frame="box" rules="all" style="background:#dbf9e8">
                <tr>
                    <td>
                        <?php
                        $sql=mysqli_query($conn,"select * from tb_need where status='未解决' order by needId desc limit 0,1");
                        $info=mysqli_fetch_array($sql);
                        if($info==false){
                            echo "暂无推荐产品!";
                        }
                        else {
                            ?>
                            <table width="270"  border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="130" rowspan="5">
                                        <div align="center">
                                            <?php
                                            if(trim($info['img']=="")){
                                                echo '<img src="../images/hulu.png" width="80" height="80" border="0">';
                                                echo "<br>暂无图片";
                                            }
                                            else{
                                                ?>
                                                <img src="<?php echo $info['img'];?>" width="80" height="80" border="0">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td width="11" height="16">&nbsp;</td>
                                    <td width="124">急需：<font color="FF6501">&nbsp;<?php echo $info['needName'];?></font></td>
                                </tr>
                                <tr>
                                    <td height="16">&nbsp;</td>
                                    <td><font color="#000000">接受价格：</font><font color="FF6501"><?php echo $info['price'];?></font></td>
                                </tr>
                                <tr>
                                    <td height="16">&nbsp;</td>
                                    <td><font color="#000000">联系我：</font><font color="FF6501"><?php echo $info['phone'];?></font></td>
                                </tr>
                                </tr>

                            </table>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $sql=mysqli_query($conn,"select * from tb_need where status='未解决' order by needId desc limit 1,1");
                        $info=mysqli_fetch_array($sql);
                        if($info==false){
                            echo "暂无推荐产品!";
                        }
                        else {
                            ?>
                            <table width="270"  border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="130" rowspan="5">
                                        <div align="center">
                                            <?php
                                            if(trim($info['img']=="")){
                                                echo '<img src="../images/hulu.png" width="80" height="80" border="0">';
                                                echo "<br>暂无图片";
                                            }
                                            else{
                                                ?>
                                                <img src="<?php echo $info['img'];?>" width="80" height="80" border="0">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td width="11" height="16">&nbsp;</td>
                                    <td width="124">急需：<font color="FF6501">&nbsp;<?php echo $info['needName'];?></font></td>
                                </tr>
                                <tr>
                                    <td height="16">&nbsp;</td>
                                    <td><font color="#000000">接受价格：</font><font color="FF6501"><?php echo $info['price'];?></font></td>
                                </tr>
                                <tr>
                                    <td height="16">&nbsp;</td>
                                    <td><font color="#000000">联系我：</font><font color="FF6501"><?php echo $info['phone'];?></font></td>
                                </tr>
                                </tr>

                            </table>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $sql=mysqli_query($conn,"select * from tb_need where status='未解决' order by needId desc limit 2,1");
                        $info=mysqli_fetch_array($sql);
                        if($info==false){
                            echo "暂无推荐产品!";
                        }
                        else {
                            ?>
                            <table width="270"  border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="130" rowspan="5">
                                        <div align="center">
                                            <?php
                                            if(trim($info['img']=="")){
                                                echo '<img src="../images/hulu.png" width="80" height="80" border="0">';
                                                echo "<br>暂无图片";
                                            }
                                            else{
                                                ?>
                                                <img src="<?php echo $info['img'];?>" width="80" height="80" border="0">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td width="11" height="16">&nbsp;</td>
                                    <td width="124">急需：<font color="FF6501">&nbsp;<?php echo $info['needName'];?></font></td>
                                </tr>
                                <tr>
                                    <td height="16">&nbsp;</td>
                                    <td><font color="#000000">接受价格：</font><font color="FF6501"><?php echo $info['price'];?></font></td>
                                </tr>
                                <tr>
                                    <td height="16">&nbsp;</td>
                                    <td><font color="#000000">联系我：</font><font color="FF6501"><?php echo $info['phone'];?></font></td>
                                </tr>
                                </tr>

                            </table>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
<br><br><br><br><br>
    <h5>葫芦校园二手交易网&nbsp;制作者：OYH</h5>
</div>
</div>
</body>


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
    .div2{
        position: relative;
        margin: 25px;
    }
    .div3{
        padding-top: 30px;
    }
    .div4{
        text-align: center;
        position: absolute;
        left: 20%;

    }
    .i_button{
        font-size: 8px;
        padding-top: 10px;
        display: inline;
        margin-right: 20px;
        margin-left: 20px;
    }
    .i_btn-info{
        background-color: #dbf9e8;
        font-size: 25px;
        width: auto;
        cursor: pointer;
        border-radius: 5px;
        border-color: #00b3ee;
        size: 25px;
    }
    .footer{
        position:absolute;
        bottom:0;
        width:100%;
        height:100px;
        align: bottom;
    }
</style>