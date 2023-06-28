<?php
session_start();
if (isset($_SESSION["admin_Login"])){


    include "../connect.php";
include "../../jdf.php";

$sql="INSERT INTO `vote`(`id`, `name`, `vote`, `email`, `star_rating`, `date`, `id_product`, `state`) VALUES (NULL , ?, ?, ?, ?, ?, ?, 0)";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["name"]);
$result->bindValue(2,$_POST["vote"]);
$result->bindValue(3,$_POST["email"]);
$result->bindValue(4,$_POST["star_rating"]);
$result->bindValue(5,jdate("j F y"));
$result->bindValue(6,$_SESSION["id_product"]);
if ($result->execute()){
    echo 'ok';
}

}else{
    header("location: ../../404.php");
    die();
}