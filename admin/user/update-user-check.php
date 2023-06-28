<?php
session_start();
if (isset($_SESSION["admin_Login"])){

include "../connect.php";

$sql="UPDATE `users` SET `fname`=?,`lname`=?,`username`=?,`email`=? ,`phone`=? WHERE `id`=?";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["fname"]);
$result->bindValue(2,$_POST["lname"]);
$result->bindValue(3,$_POST["password"]);
$result->bindValue(4,$_POST["email"]);
$result->bindValue(5,$_POST["phone"]);
$result->bindValue(6,$_SESSION["id"]);
if ($result->execute())
{
    echo 'ok';
}
else
{
    echo 'no';
}
}else{
    header("location: ../../404.php");
    die();
}