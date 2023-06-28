<?php
session_start();
if (isset($_SESSION["admin_Login"])){
    include '../../connect.php';

    $picname=$_FILES["image_slide"]["name"];
    $picsize=$_FILES["image_slide"]["size"] < 2000000;
    $pictype=$_FILES["image_slide"]["type"];
    $pictmp=$_FILES["image_slide"]["tmp_name"];

    if (is_uploaded_file($pictmp)){
        $suffix=array("image/jpg","image/png","image/jpeg");
        if (in_array($pictype,$suffix)){

            $picname_org=md5($picname.microtime()).substr($picname,-5,5);
            $picAddress = "../../product/images/banner".$picname_org;
            if (move_uploaded_file($pictmp,$picAddress)){
            $picAddress=substr($picAddress,14);



                $sql="INSERT INTO `slider_banner`(`id`, `mini_txt`, `title_txt`, `mini_explanation`, `images`, `cat_collection`, `number` , `which_slider`) VALUES (NULL , ?, ?, ?, ?, ?, ?, 2)";
                $result=$connect->prepare($sql);
                $result->bindValue(1,$_POST["mini_title"]);
                $result->bindValue(2,$_POST["txt_title"]);
                $result->bindValue(3,$_POST["mini_explanation"]);
                $result->bindValue(4,$picAddress);
                $result->bindValue(5,$_POST["cat_Collection"]);
                $result->bindValue(6,$_POST["slide_banner"]);
                if ($result->execute()){

                    header('location: add-slider.php?success=1060');
                    echo "ok";
                    die();
                }
                else{
                    header('location: add-slider.php?failed=2060');
                    die();
                }
            }
        }
    }


}else{
    header("location: ../../../404.php");
    die();
}


