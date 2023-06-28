<?php include "header-UserPanel.php";
if (isset($_GET["NotUser"])){
    echo '
    <div class="new_validation msg_noti_minus d-flex">
        <div><i class="fas fa-times close-icon"></i></div>
    <span>همچین ایمیلی وجود ندارد .</span>
</div>
    ';
}
?>
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>باز نشانی رمز عبور</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
                        <li class="breadcrumb-item active">باز نشانی رمز عبور</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->

    <!-- START MAIN CONTENT -->


    <div class="main_content">

        <!-- START LOGIN SECTION -->
        <div class="login_register_wrap section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-md-10">
                        <div class="login_wrap">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3>بروز رسانی رمز عبور</h3>
                                </div>
                                <form action="user/forget-password-check.php" method="post">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label class="lbl Important" for="email">  ایمیل خود را وارد کنید</label>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="ایمیل خود را وارد کنید">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="forget-password" class="btn btn-fill-out btn-block" name="forget-password">تایید </button>
                                    </div>
                                </form>
                                <div class="different_login">
                                    <span> یا</span>
                                </div>
                                <div class="form-note text-center">حساب کاربری دارید؟ <a href="login.php">وارد شوید</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END LOGIN SECTION -->

        <!-- START SECTION SUBSCRIBE NEWSLETTER -->
        <div class="section bg_default small_pt small_pb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="heading_s1 mb-md-0 heading_light">
                            <h3>اشتراک در خبرنامه ما</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsletter_form">
                            <form>
                                <input type="text" id="email_news" required="" class="form-control rounded-0" placeholder="آدرس ایمیل">
                                <button type="button" id="btn_email_news" class="btn btn-dark rounded-0" name="submit" value="Submit">
                                    اشتراک
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    </div>
    <!-- END MAIN CONTENT -->
<?php include "footer.php"; ?>