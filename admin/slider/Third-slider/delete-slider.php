<?php
session_start();
if (isset($_SESSION["admin_Login"])){
    ?>

    <body>
<head>

    <script src="../../../assets/js/admin/jquery.js"></script>
    <script src="../../../assets/js/admin/Admin-All.js"></script>
    <link rel="stylesheet" href="../../../assets/css/admin/admin-All.css">
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/rtl-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Josefin+Sans:300,400,600,700|Nunito:300,400,600,700" rel="stylesheet">


</head>
<body>
<div id="jadval">
    <table class="table table-hover table-bordered">
        <tr class="tbl_tr">
            <td>#</td>
            <td> متن کوتاه</td>
            <td>متن اصلی</td>
            <td> میزان تخفیف </td>
            <td> عکس</td>
            <td>حذف</td>
        </tr>
        <?php
        include "../../connect.php";
        $i=1;
        $sql="select * from slider_banner where `which_slider` = 2";
        $result=$connect->query($sql);
        $rows=$result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row)
        {
            echo '
            <tr class="border-warning">
            <td>'.$i.'</td>
            <td>'.$row["mini_txt"].'</td>
            <td>'.$row["title_txt"].'</td>
            <td>'.$row["mini_explanation"].' </td>
             <td class="td_img"><img src="../../product/'.$row["images"].'" class="delete_img_product" alt=""></td>
            <td><a href="#" class="delete_slider_banner stClass" id='.$row["id"].'>حذف <i class="fas fa-times-circle"></i></a></td>
            </tr>
            ';
            $i++;
        }

        ?>
    </table>
</div>
</body>
    <?php
}else{
    header("location: ../../404.php");
    die();
}