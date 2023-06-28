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
<?php

include "../connect.php";
$sql="delete from `vote` where id= ?";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["id"]);
if($result->execute())
{
    echo '
    <table class="table table-hover table-bordered">
        <tr class="tbl_tr">
            <td>#</td>
            <td>نام و نام خانواذگی</td>
            <td>توضیحات نظر</td>
            <td>ایمیل</td>
            <td>میزان رضایت</td>
            <td>برای محصول</td>
            <td>تاریخ ثبت</td>
            <td>حذف</td>
            <td>تایید نظر</td>
        </tr>';

    $i=1;
    $sql="SELECT * FROM `vote` ORDER BY `vote`.`id` DESC;";
    $result=$connect->query($sql);
    $rows=$result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row)
    {
        $sql1="select * from `product` where `id` = ?";
        $result1=$connect->prepare($sql1);
        $result1->bindValue(1,$row["id_product"]);
        $result1->execute();
        $data1=$result1->fetch(PDO::FETCH_OBJ);
        echo '
            <tr class="border-warning">
            <td>'.$i.'</td>
            <td>'.$row["name"].'</td>
            <td>'.$row["vote"].'</td>
            <td>'.$row["email"].'</td>
            <td>
            <div class="rating_wrap">
                <div class="rating">
            ';
        switch ($row["star_rating"]){
            case '0';
                echo '<div class="product_rate" style="width:0"></div>';
                break;

            case '1';
                echo '<div class="product_rate" style="width:20%"></div>';
                break;

            case '2';
                echo '<div class="product_rate" style="width:40%"></div>';
                break;

            case '3';
                echo '<div class="product_rate" style="width:60%"></div>';
                break;

            case '4';
                echo '<div class="product_rate" style="width:80%"></div>';
                break;

            case '5';
                echo '<div class="product_rate" style="width:100%"></div>';
                break;
        }
        echo '
</div>
</div>
</td>
            <td class="td_img"><a href="../../shop-product-detail.php?id_pr='.$data1->id.'"><img src="../product/'.$data1->images.'" class="delete_img_product"></a></td>
            <td>'.$row["date"].'</td>
            <td><a href="#" class="delete-vote stClass" id='.$row["id"].'> حذف نظر <i class="fas fa-minus"></i></a></td>
';
        if ($row["state"] == 1){
            echo '<td class="mini_success"><i class="fas fa-thumbs-up"></i>تایید شده</td>';
        }
        else{
            echo '<td><a href="#" class="success-vote stClass" id='.$row["id"].'>  تایید نظر <i class="fas fa-thumbs-up"></i></a></td>';
        }
        echo '
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
    </html>
    <?php
}else{
    header("location: ../../404.php");
    die();
}