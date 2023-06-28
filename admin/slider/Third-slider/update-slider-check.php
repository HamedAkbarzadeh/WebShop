<?php
session_start();
if (isset($_SESSION["admin_Login"])){

    include "../../connect.php";
    include '../../../jdf.php';
    if ($_FILES["file_product"]["name"] !== "")
    {
        $sql0="select * from `slider_banner` where id= ?";
        $result0=$connect->prepare($sql0);
        $result0->bindValue(1,$_POST["id"]);
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
                $picAddress = "../../product/images/banner".$picname_org;
                if (move_uploaded_file($pictmp,$picAddress)){
                    $picAddress=substr($picAddress,14);

                    $sql = "UPDATE `slider_banner` SET `mini_txt`= ?,`title_txt`= ?,`mini_explanation`= ?,`images`= ?,`cat_collection`= ?,`number`= ?,`which_slider`= 2 WHERE `id` = ?";
                    $result=$connect->prepare($sql);
                    $result->bindValue(1,$_POST["mini_title"]);
                    $result->bindValue(2,$_POST["txt_title"]);
                    $result->bindValue(3,$_POST["mini_explanation"]);
                    $result->bindValue(4,$picAddress);
                    $result->bindValue(5,$_POST["cat_Collection"]);
                    $result->bindValue(6,$_POST["slide_banner"]);
                    $result->bindValue(7,$_SESSION["id_slider_collection"]);

                    if ($result->execute()){
                        header('location: update-slider.php?success=2020');
                        die();
                    }
                    else{
                        header('location: update-slider.php?failed=2021');
                        die();
                    }
                }
            }
        }
    }


    else
    {
        $sql = "UPDATE `slider_banner` SET `mini_txt`= ?,`title_txt`= ?,`mini_explanation`= ?,`cat_collection`= ?,`number`= ?,`which_slider`= 2 WHERE `id` = ?";
        $result=$connect->prepare($sql);
        $result->bindValue(1,$_POST["mini_title"]);
        $result->bindValue(2,$_POST["txt_title"]);
        $result->bindValue(3,$_POST["mini_explanation"]);
        $result->bindValue(4,$_POST["cat_Collection"]);
        $result->bindValue(5,$_POST["slide_banner"]);
        $result->bindValue(6,$_SESSION["id_slider_collection"]);
        if ($result->execute()) {
            header('location: update-slider.php?success=2020');
            die();
        } else {
            header('location: update-slider.php?failed=2021');
            die();
        }

    }

}else{
    header("location: ../../404.php");
    die();
}