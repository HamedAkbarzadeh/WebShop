<?php
session_start();
if (isset($_SESSION["admin_Login"])){


    include "../../connect.php";
$sql="INSERT INTO `slider`(`id`, `name`, `select`, `state`) VALUES (NULL , ?, ? , ?)";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["name"]);
$result->bindValue(2,$_POST["select"]);
$result->bindValue(3,$_POST["state"]);
if ($result->execute()){
    echo 'ok';
}
}else{
    header("location: ../../../404.php");
    die();
}