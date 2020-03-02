<?php
include "../../conn/conn.php";
session_start();
$sql=mysqli_query($conn,"select * from tb_user");
$info=mysqli_fetch_array($sql);

if(isset($_SESSION['adId']) && $_SESSION['adId']!=""){
    ?>
    <h2>用户管理</h2>
    <h4>Tip:用户账号状态为”0“时，表示正常状态；为”1“时表示冻结状态。</h4>
    <body bgcolor="#faf0e6">
    <div>
        <table frame="border" rules="all" bgcolor="#f0fff0">
            <tr>
                <th>账号</th>
                <th>姓名</th>
                <th>密码</th>
                <th>电话</th>
                <th>微信</th>
                <th>状态</th>
                <th>注册时间</th>
                <th>操作</th>
            </tr>
            <?php
            do {
                ?>
                <tr>
                    <td><?php echo $info['id'];?></td>
                    <td><?php echo $info['username'];?></td>
                    <td><?php echo $info['pwd'];?></td>
                    <td><?php echo $info['phone'];?></td>
                    <td><?php echo $info['wx'];?></td>
                    <td><?php echo $info['dongjie'];?></td>
                    <td><?php echo $info['entime'];?></td>
                    <td><a href="../../models/admin/change.php?userid='<?php echo $info['id']; ?>'"><input type="button"  value="变更状态" /></a></td>
                </tr>
                <?php
            }while($info=mysqli_fetch_array($sql));
            ?>
        </table>
    </div>

    </body>
    <?php

}else{
    echo "<script>alert('警告！请先登录！');window.location.href='login_view.php'</script>";
    exit();
}?>


<style>

</style>
