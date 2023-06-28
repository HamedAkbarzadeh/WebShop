<?php include "header-UserPanel.php"; ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>ورود</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
                    <li class="breadcrumb-item active">ورود</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<?php
if (isset($_GET["captchaError"])){
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
    <span>ایمیل یا پسورد اشتباه است .</span>
</div>
    ';
}
?>
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
                            <h3>ورود</h3>
                        </div>
                        <form action="user/login-check.php" method="post" id="form_Login">
                            <div class="form-group">
                                <div class="label-group">
                                    <label class="lbl" for="email">ایمیل را وارد کنید</label>
                                </div>
                                <input autofocus type="email"  class="form-control" id="email" name="email" placeholder="ایمیل شما">
                            </div>
                            <div class="form-group">
                                <div class="label-group">
                                    <label class="lbl" for="password"> کلمه عبور را وارد کنید</label>
                                </div>
                                <input class="form-control"  type="password" id="password" name="password" placeholder="کلمه عبور">
                            </div><br />
                            <div class="form-group captcha_code">
                                <img src="captcha.php" id="captcha_refresh">
                                <i class="fas fa-sync" id="btn_captcha_refresh"></i>
                            </div>
                            <div class="form-group">
                                <div class="label-group">
                                    <label class="lbl" for="captcha">کد امنیتی را وارد کنید</label>
                                </div>
                                <input class="form-control" type="text" id="captcha" name="captcha" placeholder="کد امنیتی">
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                        <label class="form-check-label" for="exampleCheckbox1"><span>مرا به خاطر بسپار</span></label>
                                    </div>
                                </div>
                                <a href="forget-password.php">رمز عبور را فراموش کرده اید؟</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">ورود</button>
                            </div>
                        </form>
                        <div class="different_login">
                            <span> یا</span>
                        </div>
                        <div class="form-note text-center">حساب کاربری ندارید؟ <a href="signup.php">ثبت نام کنید</a></div>
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