<?php
session_start();

if (isset($_SESSION["email_Login"])){
    include "../connect.php";
    include "../jdf.php";
    $rand=rand(1000000,9999999);


    $sql="INSERT INTO `order_user`(`id`, `user`, `fname`, `lname`, `cname`, `phone`, `email`, `comment`, `address`, `province`, `city`, `code_post`, `Code_Follow`, `date`, `state`, `state_admin`) VALUES (NULL , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,0,0)";
    $result=$connect->prepare($sql);
    $result->bindValue(1,$_SESSION["email_Login"]);
    $result->bindValue(2,$_POST["fname"]);
    $result->bindValue(3,$_POST["lname"]);
    $result->bindValue(4,$_POST["cname"]);
    $result->bindValue(5,$_POST["phone"]);
    $result->bindValue(6,$_POST["email"]);
    $result->bindValue(7,$_POST["comment"]);
    $result->bindValue(8,$_POST["billing_address"]);
    $result->bindValue(9,$_POST["state"]);
    $result->bindValue(10,$_POST["city"]);
    $result->bindValue(11,$_POST["code_post"]);
    $result->bindValue(12,$rand);
    $result->bindValue(13,jdate("j F y"));
    if ($result->execute()){
        $sql2="UPDATE `basket` SET `code`= ? WHERE `user` = ? AND `code` = 0";
        $result2=$connect->prepare($sql2);
        $result2->bindvalue(1,$rand);
        $result2->bindvalue(2,$_SESSION["email_Login"]);
        $result2->execute();


        header("location: ../checkout.php?success=2000");
        die();
    }else{
        header("location: ../checkout.php?failed=2020");
        die();
    }
}else{
    header("location:../checkout.php?Out=1002");
    die();
}