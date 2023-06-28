<?php include "header.php" ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>صفحه یافت نشد</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">خانه</a></li>
                    <li class="breadcrumb-item"><a href="#">صفحات</a></li>
                    <li class="breadcrumb-item active">404</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START 404 SECTION -->
<div class="section">
	<div class="error_wrap">
    	<div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-10 order-lg-first">
                	<div class="text-center">
                        <div class="error_txt">404</div>
                        <h5 class="mb-2 mb-sm-3">صفحه مورد نظر شما یافت نشد!</h5> 
                        <p>همچین صفحه ای وجود ندارد.</p>
                        <div class="search_form pb-3 pb-md-4">
                            <form method="post">
                                <input name="text" id="search_box_404" type="search" placeholder="جستجو" class="form-control">
                                <button type="submit" class="btn  icon_search"><i class="ion-ios-search-strong"></i></button>
                            </form>
                            <div class="result_search_404" id="result_404_search">
                            </div>
                        </div>
                        <a href="index.php" class="btn btn-fill-out">بازگشت به خانه</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END 404 SECTION -->

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