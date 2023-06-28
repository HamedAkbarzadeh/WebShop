<?php
session_start();
if (isset($_SESSION["admin_Login"])){
    ?>
    <head>
    <script src="../../../assets/js/admin/jquery.js"></script>
    <script src="../../../assets/js/admin/Admin-All.js"></script>
    <link rel="stylesheet" href="../../../assets/css/admin/admin-All.css">
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/rtl-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Josefin+Sans:300,400,600,700|Nunito:300,400,600,700" rel="stylesheet">
</head>
<?php
include "../../connect.php";

    $sql2="select * from `slider_banner` where id = ? and `which_slider` = 1";
    $result2=$connect->prepare($sql2);
    $result2->bindValue(1,$_POST["id"]);
    $result2->execute();
    $data2=$result2->fetch(PDO::FETCH_OBJ);

    $image="../../product/".$data2->images;
    unlink($image); //delete file


$sql="delete from `slider_banner` where id= ? and `which_slider` = 1";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["id"]);
if ($result->execute()){

   header("location: delete-slider.php?success=1060");
   die();
}else{
    header("location: delete-slider.php?failed=2060");
    die();
}

}else{
    header("location: ../../../404.php");
    die();
}