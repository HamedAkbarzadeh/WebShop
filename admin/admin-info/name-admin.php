<?php
session_start();
include "../connect.php";

    $sql="SELECT * FROM `admin` where `username` = ?";
    $result=$connect->prepare($sql);
    $result->bindValue(1,$_SESSION["admin_Login"]);
    $result->execute();
    $data=$result->fetch(PDO::FETCH_OBJ);
        echo $data->fname.' '.$data->lname;


