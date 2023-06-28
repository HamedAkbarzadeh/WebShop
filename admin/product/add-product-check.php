<?php
session_start();
if (isset($_SESSION["admin_Login"])){


include '../connect.php';
include '../../jdf.php';
$picname=$_FILES["file_product"]["name"];
$picsize=$_FILES["file_product"]["size"] < 2000000;
$pictype=$_FILES["file_product"]["type"];
$pictmp=$_FILES["file_product"]["tmp_name"];

if (is_uploaded_file($pictmp)){
    $suffix=array("image/jpg","image/png","image/jpeg");
    if (in_array($pictype,$suffix)){

        $picname_org=md5($picname.microtime()).substr($picname,-5,5);
        $picAddress = "images/product".$picname_org;
        if (move_uploaded_file($pictmp,$picAddress)){



            $sql="INSERT INTO `product`(`id`, `name`, `price`, `discount`, `select`, `explanation_mini`, `explanation_All`, `images`, `date`, `count_product`, `Exclusive`) VALUES (NULL , ?, ?, ?, ?, ?, ?, ?, ?, ?, 0);";
            $result=$connect->prepare($sql);
            $result->bindValue(1,$_POST["name-product"]);
            $result->bindValue(2,$_POST["price-product"]);
            $result->bindValue(3,$_POST["Discount-product"]);
            $result->bindValue(4,$_POST["select-product"]);
            $result->bindValue(5,$_POST["Explanation-mini-product"]);
            $result->bindValue(6,$_POST["editor1"]);
            $result->bindValue(7,$picAddress);
            $result->bindValue(8,jdate("j F y"));
            $result->bindValue(9,$_POST["count"]);
            if ($result->execute()){
                /***/
                $last_id = $connect->lastInsertId();
                /***/

                header('location: add-color-product.php?id_color='.$last_id.'');
                echo "ok";
                die();
            }
            else{
                header('location: add-product.php?failed=2021');
                die();
            }
        }
    }
}


}else{
    header("location: ../../404.php");
    die();
}


