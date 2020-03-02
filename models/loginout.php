<?php
session_start();
session_destroy();
header("location:../views/pages/index.php");
?>