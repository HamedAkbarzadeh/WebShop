<?php
session_start();
if (isset($_SESSION["admin_Login"])){
    include "../connect.php";

    $sql="UPDATE `color_product` SET `black`= ?,`white`= ?,`gold`= ?,`brown`= ?,`cream`= ?,`bony`= ? WHERE `id_product` = ?";
    $result=$connect->prepare($sql);
    $result->bindValue(1,$_POST["black_attr"]);
    $result->bindValue(2,$_POST["white_attr"]);
    $result->bindValue(3,$_POST["gold_attr"]);
    $result->bindValue(4,$_POST["brown_attr"]);
    $result->bindValue(5,$_POST["cream_attr"]);
    $result->bindValue(6,$_POST["bony_attr"]);
    $result->bindValue(7,$_POST["id"]);
    if ($result->execute()){
        echo 'ok';
    }
}else{
    header("location: ../../404.php");
    die();
}
