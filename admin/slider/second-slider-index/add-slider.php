<?php
session_start();
if (isset($_SESSION["admin_Login"])){
?>

<html>
<head>

    <script src="../../../assets/js/admin/jquery.js"></script>
    <script src="../../../assets/js/admin/Admin-All.js"></script>
    <link rel="stylesheet" href="../../../assets/css/admin/admin-All.css">
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/rtl-style.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
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
    echo '<script src="../../../assets/js/success-notification.js"></script>';
}
if (isset($_GET["failed"])){
    echo '<script src="../../../assets/js/failed-notification.js"></script>';
}
?>

<div id="jadval">
    <table class="table table-hover table-bordered">
        <tr class="tbl_tr">
            <td>#</td>
            <td>نام</td>
            <td>قیمت</td>
            <td>تخفیف</td>
            <td>توضیحات مختضر</td>
            <td> عکس</td>
            <td>انتخاب </td>
        </tr>
        <?php
        include "../../connect.php";
        $i=1;
        $sql="SELECT * FROM `product` ORDER BY `product`.`id` DESC;";
        $result=$connect->query($sql);
        $rows=$result->fetchAll(PDO::FETCH_ASSOC);

        $sql22="select * from `product` where `Exclusive` =1";
        $result22=$connect->query($sql22);
        $count=$result22->rowCount();

        foreach ($rows as $row)
        {
            echo '
            <tr class="border-warning">
            <td>'.$i.'</td>
            <td>'.$row["name"].'</td>
            <td>'.$row["price"].'</td>
            <td>'.$row["discount"].'</td>
            <td>'.$row["explanation_mini"].'</td>
            <td class="td_img"><a href="../../../shop-product-detail.php?id_pr='.$row["id"].'"><img src="../../product/'.$row["images"].'" class="delete_img_product" alt=""></a></td>
            ';
            if ($count <= 11){
                if ($row["Exclusive"]==0){
                    echo '<td><a href="#" class="Exclusive_product stClass" id='.$row["id"].'>انتخاب محصول <i class="fas fa-check-square"></i></a></td>';
                }else{
                    echo '<td><a href="#" class="Exclusive_product stClass lbl" id='.$row["id"].'>انتخاب شده <i class="fas fa-check-double"></i></a></td>';
                }
            }
            else{
                echo '<td><a href="#" class="stClass lbl"> تکمیل شده  <i class="fas fa-exclamation-triangle"></i></a></td>';
            }
            echo '
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
    header("location: ../../../404.php");
    die();
}