<?php
session_start();
include "../connect.php";



    $sql="SELECT * FROM `admin` where `username` = ? and `password` = ?";
    $result=$connect->prepare($sql);
    $result->bindValue(1,$_POST["username"]);
    $result->bindValue(2,$_POST["password"]);
    $result->execute();
    $count=$result->rowCount();
if ($_POST["captcha"] == $_SESSION["code"]) {
    if ($count==1){
       $_SESSION["admin_Login"] = $_POST["username"];
        header("location: admin-panel.php");
        die();
    }else{
        header("location: admin-login.php?failed_Login=2060");
        die();
    }
}else{
    header("location: admin-login.php?captcha_Error=3060");
    die();
}








