<?php
session_start();
if (isset($_SESSION["admin_Login"])){
?>

<html>

<head>
    <script src="../assets/js/admin/jquery.js"></script>
    <script src="../assets/js/admin/responsive.js"></script>
    <script src="../assets/js/admin/Admin-All.js"></script>
    <link rel="stylesheet" href="../assets/css/admin/admin-All.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Josefin+Sans:300,400,600,700|Nunito:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin/responsive.css">
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
<div class="all_fixed_Page">
<div class="left_manager_admin"></div>
<div class="right_manager_admin">
    <div class="nav_manager_admin">
        <ul>
            <li class="self_admin_name">  <span class="admin_name"></span> : ادمین <i class="fas fa-user-tie"></i> </li>
            <a href="admin-Panel.php" target="frame"> <li>صفحه اصلی<i class="fas fa-home"></i> </li></a>
            <a href="user/user-manager.php" target="frame"> <li>مدریت کاربران<i class="fas fa-users-cog shh"></i> </li></a>
            <a href="categories/categories_manager.php" target="frame"> <li>مدریت دسته<i class="fas fa-grip-horizontal"></i> </li></a>
            <a href="product/product-manager.php" target="frame"> <li>مدیریت  محصولات<i class="fas fa-box-open"></i> </li></a>
            <a href="slider/slider-manager.php" target="frame"> <li>مدیریت اسلایدر<i class="fab fa-slideshare"></i> </li></a>
            <a href="vote/vote-manager.php" target="frame"> <li>مدیریت نظرات<i class=" fas fa-comment"></i> </li></a>
            <a href="Order/Order-manager.php" target="frame"> <li>مدیریت سفارشات<i class="fas fa-file-invoice-dollar"></i> </li></a>
            <a href="contact/contact-manager.php" target="frame"> <li>مدیریت تماس با ما<i class="fas fa-newspaper"></i> </li></a>
            <a href="admin-info/admin-exit.php"><li> خروج <i class="fas fa-sign-out-alt"></i> </li></a>
        </ul>
    </div>
</div>
</div>

<div class="top_header">



    <div class="left_header">
        <a class="navbar-brand" href="admin-Panel.php">
            <img class="logo_light" src="../assets/images/logo_light.png" alt="logo" />
        </a>
    </div>

    <div class="center_header">
        <ul>
            <li><a>خروج</a></li>
            <li><a href="product/add-product.php"> افزودن محصول</a></li>
            <li><a href="admin-Panel.php"> صفحه اصلی</a></li>
        </ul>
    </div>

    <div class="right_header">
        <div>
            <span id="welcome" class="name_admin">خوش آمدی</span> <span id="person" class="admin_name"> </span>
        </div>
    </div>

    <div>
        <div class="mini_header"><i id="th_large_nav" class="fas fa-th-large"></i></div>
    </div>

</div>

</body>

</html>
    <?php
}else{
    header("location: ../404.php");
    die();
}