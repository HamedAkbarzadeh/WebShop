<?php
session_start();
if (isset($_SESSION["admin_Login"])){



    include "../connect.php";
$sql="INSERT INTO `contact`(`id`, `phone`, `email`, `address`) VALUES (NULL , ?, ?, ?)";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["phone"]);
$result->bindValue(2,$_POST["email"]);
$result->bindValue(3,$_POST["address"]);
if ($result->execute()){
    echo 'ok';
}

}else{
    header("location: ../../404.php");
    die();
}