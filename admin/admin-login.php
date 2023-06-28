<html>
<head>
    <script src="../assets/js/admin/jquery.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/admin/Admin-All.js"></script>
    <script src="../assets/js/java.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../assets/css/rtl-style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/admin/admin-All.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link
            href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Josefin+Sans:300,400,600,700|Nunito:300,400,600,700"
            rel="stylesheet">

</head>

<body>
<!-- START LOGIN SECTION -->
<?php
if (isset($_GET["captcha_Error"])){
    echo '
    <div class="new_validation msg_noti_minus d-flex">
        <div><i class="fas fa-times close-icon"></i></div>
    <span>کد امنیتی درست وارد نشده است .</span>
</div>
    ';
}

if (isset($_GET["failed_Login"])){
    echo '
    <div class="new_validation msg_noti_minus d-flex">
        <div><i class="fas fa-times close-icon"></i></div>
    <span> پسورد یا نام کاربری اشتباه است .</span>
</div>
    ';
}
?>
<div class="login_register_wrap section">

    <!-- Msg Box -->
    <div class="validation_input MSG_ALL_NOTI_MINUS">
        <span id="msg-validation-m"></span>
        <div class="full_bottom_Border_validation"></div>
    </div>

    <div class="validation_input MSG_ALL_NOTI_PLUS">
        <span id="msg-validation-p"></span>
        <div class="full_bottom_Border_validation"></div>
    </div>
    <!-- Msg Box -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>ورود به پنل ادمین</h3>
                        </div>
                        <form action="admin-login-check.php" method="post" id="form_admin_login">
                            <div class="form-group">
                                <div class="label-group">
                                    <label class="text_blue" for="username">نام کاربری خود را وارد کنید</label>
                                </div>
                                <input type="text" class="form-control" name="username" id="username_admin" placeholder=" نام کاربری">
                            </div>
                            <div class="form-group">
                                <div class="label-group">
                                    <label class="text_blue" for="password">پسورد خود را وارد کنید</label>
                                </div>
                                <input class="form-control" type="password" name="password" id="password_admin" placeholder="کلمه عبور">
                            </div>

                            <div class="form-group captcha_code">
                                <img src="captcha.php" id="captcha_refresh">
                                <i class="fas fa-sync" id="btn_captcha_refresh"></i>
                            </div>
                            <div class="form-group">
                                <div class="label-group">
                                    <label class="text_blue" for="captcha"> کد امنیتی خود را وارد کنید</label>
                                </div>
                                <input class="form-control" type="text" name="captcha" id="captcha_admin" placeholder="کد امنیتی را وارد کنید ">
                            </div>
                            <div class="form-group">
                                <button type="submit" id="btn-Login-admin" class="btn btn-fill-out btn-block" name="login">ورود</button>
                            </div>
                            <div class="backToindex">
                                <a href="../index.php">بازگشت به صفحه نخست</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->
</body>
</html>