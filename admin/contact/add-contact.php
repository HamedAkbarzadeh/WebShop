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

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>اضافه کردن اطلاعات راه ارتباطی </h3>
                        </div>

                        <div>
                            <div class="label-group">
                                <label for="file-product">شماره تلفن :</label>
                                <label for="file-product" class="mini_label">شماره تلفن محل کار یا تلفن همراه را میتوانید وارد کنید .</label>
                            </div>
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="phone" id="phone" placeholder=" شماره تلفن">
                            </div>
                            <div class="label-group">
                                <label for="file-product">آدرس ایمیل : </label>
                                <label for="file-product" class="mini_label">یک آدرس ایمیلی که پاسخگو باشید را وارد کنید .</label>
                            </div>
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="email" id="email" placeholder="آدرس ایمیل">
                            </div>
                            <div class="label-group">
                                <label for="file-product">آدرس محل کار :</label>
                                <label for="file-product" class="mini_label">آدرس محل کار را به این صورت وارد کنید ==> ایران , تهران , زعفرانیه , ساختمان 32</label>
                            </div>
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="address" id="address" placeholder="آدرس محل کار">
                            </div>
                            <?php
                            include "../connect.php";
                            $sql="select * from `contact`";
                            $result=$connect->query($sql);
                            $count=$result->rowCount();
                            if ($count == 0){
                                echo '                   
                            <div class="form-group">
                                <button type="button" id="btn_add_contact" class="btn btn-fill-out btn-block btn_cat" name="register">ثبت اطلاعات</button>
                            </div>';
                            }
                            else{
                                echo '
                                <div class="empty_td">شما نمی توانید بیش تر از یک فرم پر کنید . <br> اگر میخواهید دوباره فرم پر کنید ابتدا فرم قبلی را حذف کنید  .</div>
                                ';
                            }
                            ?>

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