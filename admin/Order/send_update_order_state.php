<?php
session_start();
if (isset($_SESSION["admin_Login"])){

include "../connect.php";

if (isset($_POST["id_before"])){


    $sql="UPDATE `order_user` SET `state_admin`= 1 WHERE `id`=?";
    $result=$connect->prepare($sql);
    $result->bindValue(1,$_POST["id_before"]);
    if ($result->execute()){
        header("location: Order-manager.php?success=1060");
        die();
    }
}

if (isset($_POST["id_after"])){
    $sql2="UPDATE `order_user` SET `state_admin`= 0 WHERE `id`=?";
    $result2=$connect->prepare($sql2);
    $result2->bindValue(1,$_POST["id_after"]);
    if ($result2->execute()){
        header("location: Order-manager.php?success=1060");
        die();
    }

}
}else{
    header("location: ../../404.php");
    die();
}