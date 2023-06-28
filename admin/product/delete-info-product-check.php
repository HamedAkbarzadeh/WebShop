<?php
include "../connect.php";
session_start();
if (isset($_SESSION["admin_Login"])){

$sql="DELETE FROM `information` WHERE `information`.`id_product` = ?";
$result=$connect->prepare($sql);
$result->bindValue(1,$_SESSION["id_delete_info"]);
if ($result->execute()){
    header("location: delete-info-product.php?success=1060");
    die();
}else{
    header("location: delete-info-product.php?failed=2060");
    die();
}

}else{
    header("location: ../../404.php");
    die();
}