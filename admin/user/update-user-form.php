<?php
session_start();
if (isset($_SESSION["admin_Login"])){

include '../connect.php';
?>
<html>
<head>
    <script src="../../assets/js/admin/jquery.js"></script>
    <script src="../../assets/js/admin/update-user.js"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../../assets/css/rtl-style.css">
    <link rel="stylesheet" href="../../assets/css/responsive.css">
    <link rel="stylesheet" href="../../assets/css/admin/admin-All.css"></head>
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
        <?php

        $sql="select * from `users` where `id` = ?";
        $result=$connect->prepare($sql);
        $result->bindValue(1,$_POST["id"]);
        $result->execute();
        $data=$result->fetch(PDO::FETCH_OBJ);
        $_SESSION["id"]=$_POST["id"];
        ?>

        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>بروز رسانی اطلاعات کاربر</h3>
                        </div>
                        <div>
                            <label for="fname">نام کاربر</label>
                            <div class="form-group">
                                <input value="<?php echo $data->fname ?>"  type="text" required="" class="form-control" name="fname" id="fname" placeholder="نام کاربر">
                            </div>
                            <label for="lname">نام خانوادگی کاربر</label>
                            <div class="form-group">
                                <input value="<?php echo $data->lname ?>" type="text" required="" class="form-control" name="lname" id="lname" placeholder="نام خانوادگی کاربر">
                            </div>
                            <label for="password">کلمه عبور کاربر</label>
                            <div class="form-group">
                                <input value="<?php echo $data->password ?>" class="form-control" required="" type="password" name="password" id="password" placeholder="کلمه عبور کاربر">
                            </div>
                            <label for="email">ایمیل کاربر</label>
                            <div class="form-group">
                                <input value="<?php echo $data->email ?>" class="form-control" required="" type="email" name="email" id="email" placeholder=" ایمیل کاربر">
                            </div>
                            <label for="phone">شماره تلفن کاربر</label>
                            <div class="form-group">
                                <input value="<?php echo $data->phone ?>" class="form-control" required="" type="email" name="phone" id="phone" placeholder=" شماره تلفن کاربر">
                            </div>
                            <div class="form-group">
                                <button type="button" id="btn-update" class="btn btn-fill-out btn-block btn_update" name="update">ثبت بروز رسانی </button>
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