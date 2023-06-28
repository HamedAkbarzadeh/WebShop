<?php
session_start();
if (isset($_SESSION["email_Login"])){
    include "../connect.php";

    $sql2="select * from `basket` WHERE `id` = ? or `id_product` = ?";
    $result2=$connect->prepare($sql2);
    $result2->bindValue(1,$_POST["id"]);
    $result2->bindValue(2,$_POST["id"]);
    $result2->execute();
    $data2=$result2->fetch(PDO::FETCH_OBJ);

    unlink($data2->images_cnc); //delete file

    $sql="DELETE FROM `basket` WHERE `id` = ? or `id_product` = ?";
    $result=$connect->prepare($sql);
    $result->bindValue(1,$_POST["id"]);
    $result->bindValue(2,$_POST["id"]);
    if ($result->execute())
    {
        $sql3="DELETE FROM `cut_order` WHERE `r_code` = ? and `user` = ?";
        $result3=$connect->prepare($sql3);
        $result3->bindValue(1,$data2->r_code);
        $result3->bindValue(2,$_SESSION["email_Login"]);
        $result3->execute();
    }


}else{
    header("location:../index.php");
    die();
}
