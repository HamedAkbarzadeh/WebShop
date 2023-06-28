<?php
session_start();
if (isset($_SESSION["admin_Login"])){

include "../connect.php";
include '../../jdf.php';
if ($_FILES["file_product"]["name"] !== "")
{
    $sql0="select * from `product` where id= ?";
    $result0=$connect->prepare($sql0);
    $result0->bindValue(1,$_GET["id"]);
    $result0->execute();
    $data=$result0->fetch(PDO::FETCH_OBJ);
    $files=glob("images/*");
    foreach ($files as $file){
        if (is_file($file)){
            unlink($data->images);
        }
    }

    $picname=$_FILES["file_product"]["name"];
    $picsize=$_FILES["file_product"]["size"] < 2000000;
    $pictype=$_FILES["file_product"]["type"];
    $pictmp=$_FILES["file_product"]["tmp_name"];

    if (is_uploaded_file($pictmp)){
        $suffix=array("image/jpg","image/png","image/jpeg");
        if (in_array($pictype,$suffix)){

            $picname_org=md5($picname.microtime()).substr($picname,-5,5);
            $picAddress = "images/".$picname_org;
            if (move_uploaded_file($pictmp,$picAddress)){

                $sql = "UPDATE `product` SET `name`= ?,`price`= ?,`discount`= ?,`select`= ?,`explanation_mini`= ?,`explanation_All`= ?,`images`= ?,`date`= ?,`count_product`= ? WHERE `id` = ?;";
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
                $result->bindValue(10,$_GET["id"]);
                if ($result->execute()){
                    header('location: update-product.php?success=2020');
                    die();
                }
                else{
                    header('location: update-product.php?failed=2021');
                    die();
                }
            }
        }
    }
}


else
{
                $sql = "UPDATE `product` SET `name`= ?,`price`= ?,`discount`= ?,`select`= ?,`explanation_mini`= ?,`explanation_All`= ?,`date`= ?, `count_product`= ? WHERE `id` = ?;";
                $result=$connect->prepare($sql);
                $result->bindValue(1, $_POST["name-product"]);
                $result->bindValue(2, $_POST["price-product"]);
                $result->bindValue(3, $_POST["Discount-product"]);
                $result->bindValue(4, $_POST["select-product"]);
                $result->bindValue(5, $_POST["Explanation-mini-product"]);
                $result->bindValue(6, $_POST["editor1"]);
                $result->bindValue(7, jdate("j F y"));
                $result->bindValue(8,$_POST["count"]);
                $result->bindValue(9,$_GET["id"]);
                if ($result->execute()) {
                    header('location: update-product.php?success=2020');
                    die();
                } else {
                    header('location: update-product.php?failed=2021');
                    die();
                }

}

}else{
    header("location: ../../404.php");
    die();
}