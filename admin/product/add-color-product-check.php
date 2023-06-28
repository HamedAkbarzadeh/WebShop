<?php
session_start();
if (isset($_SESSION["admin_Login"])){

    include "../connect.php";

    $sql="INSERT INTO `color_product`(`id`, `id_product`, `black`, `white`, `gold`, `brown`, `cream`, `bony`) VALUES (NULL , ?, ?, ?, ?, ?, ?, ?)";
    $result=$connect->prepare($sql);
    if (isset($_SESSION["id_color_product_GET"])){
        $result->bindValue(1,$_SESSION["id_color_product_GET"]);
    }elseif (isset($_SESSION["id_color_product_POST"])){
        $result->bindValue(1,$_SESSION["id_color_product_POST"]);
    }
    $result->bindValue(2,$_POST["black_attr"]);
    $result->bindValue(3,$_POST["white_attr"]);
    $result->bindValue(4,$_POST["gold_attr"]);
    $result->bindValue(5,$_POST["brown_attr"]);
    $result->bindValue(6,$_POST["cream_attr"]);
    $result->bindValue(7,$_POST["bony_attr"]);
    if ($result->execute()){
        echo 'ok';
    }

}else{
    header("location: ../../404.php");
    die();
}