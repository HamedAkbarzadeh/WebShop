
<!-- START FOOTER -->
<footer class="footer_dark">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="footer_logo">
                            <a href="#"><img src="assets/images/logo_light.png" alt="logo"/></a>
                        </div>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است</p>
                    </div>
                    <div class="widget">
                        <ul class="social_icons social_white">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
<!--                <div class="col-lg-2 col-md-3 col-sm-6">-->
<!--                    <div class="widget">-->
<!--                        <h6 class="widget_title">لینک های مفید</h6>-->
<!--                        <ul class="widget_links">-->
<!--                            <li><a href="#">درباره ما</a></li>-->
<!--                            <li><a href="#">سؤالات متداول</a></li>-->
<!--                            <li><a href="#">موقعیت</a></li>-->
<!--                            <li><a href="#">شرکت ها</a></li>-->
<!--                            <li><a href="#">تماس با ما</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-2 col-md-3 col-sm-6">-->
<!--                    <div class="widget">-->
<!--                        <h6 class="widget_title">دسته بندی</h6>-->
<!--                        <ul class="widget_links">-->
<!--                            <li><a href="#">مردانه</a></li>-->
<!--                            <li><a href="#">زنانه</a></li>-->
<!--                            <li><a href="#">بچه گانه</a></li>-->
<!--                            <li><a href="#">بهترین فروش</a></li>-->
<!--                            <li><a href="#">تازه رسیده ها</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">حساب کاربری</h6>
                        <ul class="widget_links">
                            <li><a href="my-account.php">حساب من</a></li>
                            <li><a id="order_footer" href="my-account.php">تاریخچه سفارشات</a></li>
                            <li><a href="#">رهگیری سفارش</a></li>
                        </ul>
                    </div>
                </div>
                <?php
                include "connect.php";
                $sql="select * from `contact`";
                $result=$connect->query($sql);
                $data=$result->fetch(PDO::FETCH_OBJ);
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">اطلاعات تماس</h6>
                        <ul class="contact_info contact_info_light">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p><?php if ($data == null){echo '';}else{echo $data->address;} ?></p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:<?php if ($data == null){echo '';}else{echo $data->email;} ?>"><?php if ($data == null){echo '';}else{echo $data->email;} ?></a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p><?php if ($data == null){echo '';}else{echo $data->phone;} ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-md-0 text-center text-md-left">© 1399 کلیه حقوق این سایت متعلق به ... است</p>
                </div>
                <div class="col-md-6">
                    <ul class="footer_payment text-center text-lg-right">
                        <li><a href="#"><img src="assets/images/visa.png" alt="visa"></a></li>
                        <li><a href="#"><img src="assets/images/discover.png" alt="discover"></a></li>
                        <li><a href="#"><img src="assets/images/master_card.png" alt="master_card"></a></li>
                        <li><a href="#"><img src="assets/images/paypal.png" alt="paypal"></a></li>
                        <li><a href="#"><img src="assets/images/amarican_express.png" alt="amarican_express"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

<!-- Latest jQuery -->
<script src="assets/js/jquery-1.12.4.min.js"></script>
<!-- jquery-ui -->
<script src="assets/js/jquery-ui.js"></script>
<!-- popper min js -->
<script src="assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- owl-carousel min js  -->
<script src="assets/owlcarousel/js/owl.carousel.min.js"></script>
<!-- magnific-popup min js  -->
<script src="assets/js/magnific-popup.min.js"></script>
<!-- waypoints min js  -->
<script src="assets/js/waypoints.min.js"></script>
<!-- parallax js  -->
<script src="assets/js/parallax.js"></script>
<!-- countdown js  -->
<script src="assets/js/jquery.countdown.min.js"></script>
<!-- imagesloaded js -->
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js -->
<script src="assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="assets/js/jquery.elevatezoom.js"></script>
<!-- scripts js -->
<script src="assets/js/scripts.js"></script>
<!-- script -->
<script src="assets/js/java.js"></script>

</body>
</php>