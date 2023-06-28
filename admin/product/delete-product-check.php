<?php
session_start();
if (isset($_SESSION["admin_Login"])){
?>
<head>
    <script src="../../assets/js/admin/jquery.js"></script>
    <script src="../../assets/js/admin/Admin-All.js"></script>
    <link rel="stylesheet" href="../../assets/css/admin/admin-All.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/rtl-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Josefin+Sans:300,400,600,700|Nunito:300,400,600,700" rel="stylesheet">
</head>
<?php

include "../connect.php";



$sql2="select * from `product` where id = ?";
$result2=$connect->prepare($sql2);
$result2->bindValue(1,$_POST["id"]);
$result2->execute();
$data2=$result2->fetch(PDO::FETCH_OBJ);

unlink($data2->images); //delete file


$sql="delete from `product` where id= ?";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["id"]);
if($result->execute())
{
    $sql3="DELETE FROM `color_product` WHERE `color_product`.`id_product` = ?";
    $result3=$connect->prepare($sql3);
    $result3->bindValue(1,$_POST["id"]);
    $result3->execute();

    $sql4="DELETE FROM `vote` WHERE `vote`.`id_product` = ?";
    $result4=$connect->prepare($sql4);
    $result4->bindValue(1,$_POST["id"]);
    $result4->execute();

    $sql4="DELETE FROM `information` WHERE `information`.`id_product` = ?";
    $result4=$connect->prepare($sql4);
    $result4->bindValue(1,$_POST["id"]);
    $result4->execute();

    echo '
    <table class="table table-hover table-bordered">
        <tr class="tbl_tr">
            <td>#</td>
            <td>نام محصول</td>
            <td>قیمت محصول</td>
            <td>تخفیف محصول</td>
            <td>عکس محصول</td>
            <td>تاریخ ثبت محصول</td>
            <td>حذف</td>
        </tr>';

    $i=1;
    $sql="select * from `product`";
    $result=$connect->query($sql);
    $rows=$result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row)
    {
        echo '
            <tr class="border-warning">
            <td>'.$i.'</td>
            <td>'.$row["name"].'</td>
            <td>'.number_format($row["price"]).' <span class="tmn_price">هزار تومان</span> </td>
            <td>'.number_format($row["discount"]).' <span class="tmn_price">هزار تومان</span> </td>
            <td class="td_img"><img src='.$row["images"].' class="delete_img_product" alt=""></td>
            <td>'.$row["date"].'</td>
            <td><a href="#" class="delete_product stClass" id='.$row["id"].'>حذف <i class="fas fa-times-circle"></i></a></td>
            </tr>
            ';
        $i++;
    }

    echo '
    </table>
            ';
}
else
{
    echo 'no';
}

?>
<!--

->
<?php
}else{
    header("location: ../../404.php");
    die();
}