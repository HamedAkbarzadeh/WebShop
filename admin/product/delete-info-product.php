<?php
session_start();
if (isset($_SESSION["admin_Login"])){
?>

<html>
<head>

    <script src="../../assets/js/admin/jquery.js"></script>
    <script src="../../assets/js/admin/Admin-All.js"></script>
    <link rel="stylesheet" href="../../assets/css/admin/admin-All.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/rtl-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Josefin+Sans:300,400,600,700|Nunito:300,400,600,700" rel="stylesheet">


</head>
<body>
<!-- Msg Box -->

<div class="validation_input MSG_ALL_NOTI_MINUS">
    <span id="msg-m"></span>
    <div class="full_bottom_Border_validation"></div>
</div>

<div class="validation_input MSG_ALL_NOTI_PLUS">
    <span id="msg-p"></span>
    <div class="full_bottom_Border_validation"></div>
</div>

<!-- Msg Box -->
<?php
if (isset($_GET["success"])){
    echo '<script src="../../assets/js/success-notification.js"></script>';
}
if (isset($_GET["failed"])){
    echo '<script src="../../assets/js/failed-notification.js"></script>';
}
?>

<div id="jadval">
    <table class="table table-hover table-bordered">
        <tr class="tbl_tr">
            <td>#</td>
            <td>نام محصول</td>
            <td>قیمت محصول با تخفیف</td>
            <td>توضیحات مختصر محصول</td>
            <td>عکس محصول</td>
            <td>تاریخ ثبت محصول</td>
            <td>نمایش و حذف اطلاعات اضافی</td>
        </tr>
        <?php
        include "../connect.php";

            $i=1;
            $sql="select * from `product`";
            $result=$connect->query($sql);
            $rows=$result->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $row)
            {
                $Last_Price=$row["price"]-$row["discount"];
                echo '
            <tr class="border-warning">
            <td>'.$i.'</td>
            <td>'.$row["name"].'</td>
            <td>'.number_format($Last_Price).' <span class="tmn_price">هزار تومان</span> </td>
            <td>'.$row["explanation_mini"].'</td>
            <td class="td_img"><img src='.$row["images"].' class="delete_img_product" alt=""></td>
            <td>'.$row["date"].'</td>
            <td><a href="#" class="show-info-product stClass" id='.$row["id"].'>نمایش اطلاعات <i class="fas fa-eye"></i></a></td>
            </tr>
            ';
                $i++;
            }






        ?>
    </table>

</div>
</body>
</html>
    <?php
}else{
    header("location: ../../404.php");
    die();
}