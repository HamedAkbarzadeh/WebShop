<?php
session_start();
if (isset($_SESSION["admin_Login"])){
    ?>
<html>
<body>
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
<div id="jadval">
    <table class="table table-hover table-bordered">
        <tr class="tbl_tr">
            <td>#</td>
            <td>نام</td>
            <td>شماره تماس </td>
            <td>کد پیگیری</td>
            <td>وضعیت پرداخت</td>
            <td>جزئیات</td>
            <td>وضعیت</td>
        </tr>
        <?php
        include "../connect.php";
        $i=1;
        $sql="SELECT * FROM `order_user` ORDER BY `order_user`.`id` DESC";
        $result=$connect->query($sql);
        $rows=$result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row)
        {
            echo '
            <tr class="border-warning">
            <td>'.$i.'</td>
            <td>'.$row["fname"].' '.$row["lname"].'</td>
            <td>'.$row["phone"].'</td>
            <td>'.$row["Code_Follow"].'</td>';
            if ($row["state"] == 1){
                echo '<td class="text_blue"><i class="fas fa-check-circle"></i> پرداخت شده</td>';
            }else{
                echo '<td class="empty_td"><i class="fas fa-times-circle"></i> پرداخت نشده</td>';
            }
            echo '
            <td><a href="#" class="details_order stClass" id='.$row["id"].'><i class="fas fa-info-circle"></i> جزئیات</a></td>
            
            ';
            if ($row["state_admin"] == 0){
                echo '<td><a href="#" class="datails_order_before stClass" id='.$row["id"].'><i class="fas fa-history"></i> در حال ارسال</a></td>';
            }else
            {
                echo '<td><a href="#" class="datails_order_after text_blue" id='.$row["id"].'><i class="fas fa-shipping-fast"></i> ارسال شد</a></td>';
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
    header("location: ../../404.php");
    die();
}
