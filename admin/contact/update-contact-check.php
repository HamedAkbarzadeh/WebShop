<?php
session_start();
if (isset($_SESSION["admin_Login"])){


include "../connect.php";
$sql="UPDATE `contact` SET `phone`= ?,`email`= ?,`address`= ?";
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