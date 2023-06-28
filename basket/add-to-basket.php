<?php
include "../jdf.php";
include "../connect.php";
session_start();

if (isset($_SESSION["email_Login"])) {

    $count = $_POST["count"];
    $color = $_POST["color"];
    $id_product = $_POST["id"];

    $r_code=rand(1000000,9999999);
    /***/
    $sql = "INSERT INTO `basket`(`id`, `id_product`, `user`, `date`, `count`, `color` ,`comment_cnc`, `images_cnc`, `state`, `code`, `r_code`) VALUES (NULL , ?, ?, ?, ?, ?, '','',0,0, ?)";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $id_product);
    $result->bindValue(2, $_SESSION["email_Login"]);
    $result->bindValue(3, jdate("j F y"));
    $result->bindValue(4, $count);
    $result->bindValue(5, $color);
    $result->bindValue(6, $r_code);
    if ($result->execute()) {
        $_SESSION["id_basket"] = $connect->lastInsertId();
        echo "ok";
    }
    /***/
} else {
    echo 'no';
}

// cod haye kam kardan count az database (moshkel dare)


//    $sql1="select * from `product` where id = ?";
//    $result1=$connect->prepare($sql1);
//    $result1->bindValue(1,$_POST["id"]);
//    $result1->execute();
//    $data1=$result1->fetch(PDO::FETCH_OBJ);
//
//    $count=($data1->count_prodcut)-($_POST["count"]);
//
//    $sql2="UPDATE `product` SET `count_product`= ? WHERE id = ?";
//    $result2=$connect->prepare($sql2);
//    $result2->bindValue(1,$count);
//    $result2->bindValue(2,$_POST["id"]);
//    $result2->execute();