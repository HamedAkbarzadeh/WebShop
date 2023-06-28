<?php
include "../connect.php";
session_start();
if (isset($_SESSION["admin_Login"])){

$sql="INSERT INTO `information`(`id`, `question`, `answer` ,`id_product`) VALUES (NULL , ?, ?, ?)";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["question"]);
$result->bindValue(2,$_POST["answer"]);
$result->bindValue(3,$_SESSION["id_product"]);
if ($result->execute()){
    echo 'ok';
}
}else{
    header("location: ../../404.php");
    die();
}