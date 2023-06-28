<?php
session_start();
if (isset($_SESSION["admin_Login"])){


    include "../connect.php";

$sql="UPDATE `vote` SET `state`= 1 WHERE `id`=?";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["id"]);
if ($result->execute()){
    header("location: vote-manager.php?success=1060");
    die();
}
else{
    header("location: vote-manager.php?failed=2060");
    die();
}

}else{
    header("location: ../../404.php");
    die();
}