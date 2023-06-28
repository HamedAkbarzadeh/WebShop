<?php
session_start();
if (isset($_SESSION["admin_Login"])){
?>


<html>
<head>
    <script src="../../assets/js/admin/jquery.js"></script>
    <script src="../../assets/js/admin/Admin-All.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/admin/admin-All.css">
    <link rel="stylesheet" href="../../assets/css/rtl-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Josefin+Sans:300,400,600,700|Nunito:300,400,600,700" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<!-- notification --->
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
<!-- notification --->
    <?php
    if (isset($_GET["success"])){
        echo '
            <div class="new_validation msg_noti_plus d-flex">
        <div><i class="fas fa-times close-icon"></i></div>
    <span>اطلاعات با موفقیت اضافه شد .</span>
</div>';
    }
    if (isset($_GET["failed"])){
        echo '<div class="new_validation msg_noti_minus d-flex">
        <div><i class="fas fa-times close-icon"></i></div>
    <span>پسوند یا حجم مغایرت میکند .</span>
</div>';
    }
        if (isset($_GET["failed_color"])){
        echo '<div class="new_validation msg_noti_minus d-flex">
        <div><i class="fas fa-times close-icon"></i></div>
    <span>اطلاعات این محصول قبلا ذخیره شده است .</span>
</div>';
    }

    ?>
<div class="All-user-manager">
    <ul>
        <a href="add-product.php">
            <li>
                <i class="fas fa-cart-plus"></i>
                اضافه نمودن محصول
            </li>
        </a>
        <a href="delete-product.php">
            <li>
                <i class="fas fa-times-circle"></i>
                حذف نمودن نمودن محصول
            </li>
        </a>
        <a href="update-product.php">
            <li>
                <i class="fas fa-edit"></i>
                ویرایش نمودن اطلاعات محصول
            </li>
        </a>
        <a href="show-product.php">
            <li>
                <i class=" fas fa-eye"></i>
                مشاهده همه محصول ها
            </li>
        </a>
        <a href="color-product.php">
            <li>
                <i class="fas fa-palette"></i>
                اضافه نمودن رنگ محصولات
            </li>
        </a>
        <a href="update-color-product.php">
            <li>
                <i class="fas fa-fill-drip"></i>
                ویرایش نمودن رنگ محصولات
            </li>
        </a>
        <a href="add-info-product.php">
            <li>
                <i class="fas fa-folder-plus"></i>
                اضافه نمودن توضیحات بیشتر محصول
            </li>
        </a>
        <a href="delete-info-product.php">
            <li>
                <i class="fas fa-minus-square"></i>
                نمایش و حذف نمودن توضیحات بیشتر محصول
            </li>
        </a>
    </ul>
</div>
</body>
</html>
    <?php
}else{
    header("location: ../../404.php");
    die();
}