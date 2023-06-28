<?php
session_start();
if (isset($_SESSION["admin_Login"])){
    ?>

    <?php
}else{
    header("location: ../../../404.php");
    die();
}
