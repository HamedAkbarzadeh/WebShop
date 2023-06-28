<?php
session_start();
if (isset($_SESSION["admin_Login"])){
?>
<html>
<head>
    <script src="../../assets/js/admin/jquery.js"></script>
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
<div class="All-user-manager">
    <ul>
        <a href="header-slider.php">
            <li>
                <i class=" fas fa-sliders-h"></i>
                اسلایدر 3 عکسی صفحه اصلی (بالا)
            </li>
        </a>
        <a href="first-slider.php">
            <li>
                <i class=" fas fa-sliders-h"></i>
                اسلایدر های صفحه اصلی
            </li>
        </a>
        <a href="second-slider.php">
            <li>
                <i class=" fas fa-sliders-h"></i>
                اسلایدر محصولات اختصاصی صفحه اصلی
            </li>
        </a>
        <a href="Third-slider.php">
            <li>
                <i class=" fas fa-sliders-h"></i>
                اسلایدر 2 عکسی صفحه اصلی
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