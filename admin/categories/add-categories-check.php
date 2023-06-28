<?php
session_start();
if (isset($_SESSION["admin_Login"])){


include '../connect.php';

$sql="INSERT INTO `cat`(`id`, `name`, `subcat`) VALUES (NULL, ?, ?)";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["name"]);
$result->bindValue(2,$_POST["cat"]);
if ($result->execute()){
    echo 'ok';
}else{
    echo 'no';
}

}else{
    header("location: ../../404.php");
    die();
}
