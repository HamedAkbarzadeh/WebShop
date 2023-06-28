<?php
session_start();
if (isset($_SESSION["email_Login"])){
    include '../connect.php';

    if ($_POST["my_file"] !== "" && $_POST["comment_cnc"] !== ""){
        $picname=$_FILES["my_file"]["name"];
        $picsize=$_FILES["my_file"]["size"] < 2000000;
        $pictype=$_FILES["my_file"]["type"];
        $pictmp=$_FILES["my_file"]["tmp_name"];

        if (is_uploaded_file($pictmp)){
            $suffix=array("image/jpg","image/png","image/jpeg");
            if (in_array($pictype,$suffix)){

                $picname_org=md5($picname.microtime()).substr($picname,-5,5);
                $picAddress = "images/cnc/cnc".$picname_org;
                if (move_uploaded_file($pictmp,$picAddress)){



                    $sql="UPDATE `basket` SET `comment_cnc`= ?,`images_cnc`= ? WHERE `user` = ? and `r_code` = ?";
                    $result=$connect->prepare($sql);
                    $result->bindValue(1,$_POST["comment_cnc"]);
                    $result->bindValue(2,$picAddress);
                    $result->bindValue(3,$_SESSION["email_Login"]);
                    $result->bindValue(4,$_POST["r_code"]);
                    if ($result->execute()){
                        header('location:../checkout.php?withcnc=2021');
                        echo "ok";
                        die();
                    }
                    else{
                        header('location:../order-check.php?failed=2021');
                        die();
                    }
                }
            }
        }
    }else{
        header('location:../checkout.php?nocnc=2020');
        die();
    }



}else{
    header("location: ../404.php");
    die();
}