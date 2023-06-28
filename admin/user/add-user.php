<?php
session_start();
if (isset($_SESSION["admin_Login"])){
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../../assets/js/admin/jquery.js"></script>
    <script src="../../assets/js/admin/Admin-All.js"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../../assets/css/rtl-style.css">
    <link rel="stylesheet" href="../../assets/css/responsive.css">
    <link rel="stylesheet" href="../../assets/css/admin/admin-All.css">
</head>

<body>
<!-- START LOGIN SECTION -->
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
<div class="login_register_wrap section">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>اضافه کردن کاربر Vip</h3>
                        </div>
                        <div>
                            <div class="form-group">
                                <label for="fname" class="text_blue">نام</label>
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="نام کاربر">
                            </div>
                            <div class="form-group">
                                <label for="lname" class="text_blue">نام خانوادگی</label>
                                <input type="text" class="form-control" name="lname" id="lname" placeholder="نام خانوادگی کاربر">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text_blue">ایمیل </label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="ایمیل کاربر">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text_blue">رمز عبور</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="کلمه عبور کاربر">
                            </div>
                            <div class="form-group">
                                <button type="button" id="btn-Login" class="btn btn-fill-out btn-block btn_login" name="register">ثبت نام</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->
</body>
</html>
    <?php
}else{
    header("location: ../../404.php");
    die();
}