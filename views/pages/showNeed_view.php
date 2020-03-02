<!--展示需求的全部信息-->
<?php
include "../layouts/_header.php";
include "../../conn/conn.php";

$type = $_GET['type'];
if ($type == "all"){
    $sql = mysqli_query($conn,"select * from tb_need where status='未解决' order by needId desc");
    $info = mysqli_fetch_array($sql);
}else{
    $sql = mysqli_query($conn,"select * from tb_need where status='未解决' and type='".$type."' order by needId desc");
    $info = mysqli_fetch_array($sql);
}
?>

    <body bgcolor="#faebd7">

    <div class="div2">
        <a class="text1 active">需求种类</a>
        <a href="showNeed_view.php?type=all" class="text1">全部</a>
        <a href="showNeed_view.php?type=tool" class="text1">工具</a>
        <a href="showNeed_view.php?type=book" class="text1">书籍</a>
        <a href="showNeed_view.php?type=sports" class="text1">运动品</a>
        <a href="showNeed_view.php?type=cloths" class="text1">衣物</a>
        <a href="showNeed_view.php?type=others" class="text1">其他</a>
    </div>
    <div class="div1">
        <h4><font color="#8a2be2">本类需求：<font color="#ff4500"><?php
                    if ($type=="all"){
                        echo "全部";
                    }elseif($type=="tool"){
                        echo "工具";
                    }elseif($type=="book"){
                        echo "书籍";
                    }elseif($type=="sports"){
                        echo "运动品";
                    }elseif($type=="cloths"){
                        echo "衣物";
                    }elseif($type=="others"){
                        echo "其他";
                    }?></font></font></h4>


        <table name="tb_goodsinfo" frame="box" rules="all" cellpadding="5" align="center" width="750px">
            <?php
            if ($info == true) {
            do{
                ?>
                <tr>
                    <!--        //显示图片-->
                    <td width="150px" align="left">
                        <div align="center">
                            <?php
                            if (trim($info['img'] == "")) {
                                echo '<img src="../images/hulu.png" width="150px" height="150px" border="0">';
                                echo "<br>暂无图片";
                            } else {
                                ?>
                                <img src="<?php echo $info['img']; ?>" width="150px" height="150px" border="0">
                                <?php
                            }
                            ?>
                        </div>
                    </td>
                    <td width="200px">
                        <p>需求名称：<?php echo $info['needName'];?></p>
                        <p>接受价格：<?php echo $info['price'];?></p>
                        <p>联系电话：<?php echo $info['phone'];?></p>
                        <p>发布时间：<?php echo $info['startTime'];?></p>
                    </td>
                    <td width="300px" align="left" valign="top">
                        <p>需求简介：</p>
                        <p style="text-indent:2em;"><?php echo $info['introduction'];?></p>
                    </td>
                </tr>
                <?php
            }while($info = mysqli_fetch_array($sql))
            ?>

    </div>

    <?php }else { ?>
    <tr>
        <td>暂无此类闲置的需求，请后续查看此分类......</td>
    </tr>
    <?php } ?>
    </table>
    <br><br><br>
    </body>


<style>
    .div1 {
        padding: 0px;
        margin: -10px;
        position: absolute;
        top: 25%;
        font-size: large;
        font-style: inherit;
        text-align: left;
        width: 750px;
        left: 30%;
    }
    .div2 {
        padding: 0px;
        margin: 0px;
        position: absolute;
        width: 15%;
        left: 12%;
        top: 25%;
        font-size: large;
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