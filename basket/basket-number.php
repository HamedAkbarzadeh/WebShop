<?php
session_start();
if (isset($_SESSION["email_Login"])){
    include "../connect.php";
    $sql="select * from `basket` where `user` = ? and `state` = 0";
    $result=$connect->prepare($sql);
    $result->bindValue(1,$_SESSION["email_Login"]);
    if($result->execute()){
        $count=$result->rowCount();
        echo $count;
    }
}else{
    echo '0';
}
