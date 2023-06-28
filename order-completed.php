<?php include "/header.php"; ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>سفارش به پایان رسید</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">خانه</a></li>
                    <li class="breadcrumb-item"><a href="#">صفحات</a></li>
                    <li class="breadcrumb-item active">سفارش به پایان رسید</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center order_complete">
                	<i class="fas fa-check-circle"></i>
                    <div class="heading_s1">
                  	<h3>سفارش شما تمام شد!</h3>
                    </div>
                  	<p>بابت سفارش شما متشکرم! سفارش شما در حال پردازش است و طی 3-6 ساعت به اتمام می رسد. پس از اتمام سفارش ، تأیید نامه الکترونیکی دریافت خواهید کرد.</p>
                    <a href="shop-left-sidebar.php" class="btn btn-fill-out">ادامه خرید</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

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
<?php include "/footer.php"; ?>