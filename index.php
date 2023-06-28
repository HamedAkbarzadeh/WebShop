<?php include "header.php";
include "connect.php";

$sql11 = "SELECT * FROM `slider_banner` WHERE `number` = 1 and `which_slider` = 1";
$result11 = $connect->query($sql11);
$data11 = $result11->fetch(PDO::FETCH_OBJ);
/****/
$sql12 = "SELECT * FROM `slider_banner` WHERE `number` = 2 and `which_slider` = 1";
$result12 = $connect->query($sql12);
$data12 = $result12->fetch(PDO::FETCH_OBJ);
/****/
$sql13 = "SELECT * FROM `slider_banner` WHERE `number` = 3 and `which_slider` = 1";
$result13 = $connect->query($sql13);
$data13 = $result13->fetch(PDO::FETCH_OBJ);
?>
    <!-- START SECTION BANNER -->
    <div class="banner_section slide_wrap shop_banner_slider staggered-animation-wrap">
        <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                if ($data11 == null) {
                    echo "";
                } else {
                    ?>
                    <div class="carousel-item active background_bg"
                         data-img-src="admin/product/<?php echo $data11->images ?>">
                        <div class="banner_slide_content banner_content_inner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-8 col-sm-9 col-10">
                                        <div class="banner_content2">
                                            <h6 class="mb-2 mb-sm-3 staggered-animation text-uppercase"
                                                data-animation="fadeInDown"
                                                data-animation-delay="0.2s"><?php echo $data11->mini_txt ?></h6>
                                            <h2 class="staggered-animation" data-animation="fadeInDown"
                                                data-animation-delay="0.3s"><?php echo $data11->title_txt ?></h2>
                                            <p class="staggered-animation" data-animation="fadeInUp"
                                               data-animation-delay="0.4s"><?php echo $data11->mini_explanation ?></p>
                                            <a class="btn btn-line-fill btn-radius staggered-animation text-uppercase"
                                               href="shop-load-more.php?name_pr=<?php echo $data11->cat_collection ?>"
                                               data-animation="fadeInUp"
                                               data-animation-delay="0.5s">اکنون
                                                خرید کنید</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }

                if ($data12 == null) {
                    echo "";
                } else {
                    ?>
                    <div class="carousel-item background_bg" data-img-src="admin/product/<?php echo $data12->images ?>">
                        <div class="banner_slide_content banner_content_inner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-8 col-sm-9 col-10">
                                        <div class="banner_content2">
                                            <h5 class="mb-2 mb-sm-3 staggered-animation font-weight-light"
                                                data-animation="fadeInDown"
                                                data-animation-delay="0.2s"><?php echo $data12->mini_txt ?></h5>
                                            <h2 class="staggered-animation" data-animation="fadeInDown"
                                                data-animation-delay="0.3s"><?php echo $data12->title_txt ?></h2>
                                            <p class="staggered-animation" data-animation="fadeInUp"
                                               data-animation-delay="0.4s"><?php echo $data12->mini_explanation ?></p>
                                            <a class="btn btn-border-fill btn-radius staggered-animation text-uppercase"
                                               href="shop-load-more.php?name_pr=<?php echo $data12->cat_collection ?>"
                                               data-animation="fadeInUp"
                                               data-animation-delay="0.4s">اکنون
                                                خرید کنید</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                if ($data13 == null) {
                    echo "";
                } else {
                    ?>
                    <div class="carousel-item background_bg" data-img-src="admin/product/<?php echo $data13->images ?>">
                        <div class="banner_slide_content banner_content_inner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-8 col-sm-9 col-10">
                                        <div class="banner_content2">
                                            <h5 class="mb-2 mb-sm-3 staggered-animation font-weight-light"
                                                data-animation="fadeInDown"
                                                data-animation-delay="0.2s"><?php echo $data13->mini_txt ?></h5>
                                            <h2 class="staggered-animation" data-animation="fadeInDown"
                                                data-animation-delay="0.3s"><?php echo $data13->title_txt ?></h2>
                                            <p class="staggered-animation" data-animation="fadeInUp"
                                               data-animation-delay="0.4s"><?php echo $data13->mini_explanation ?></p>
                                            <a class="btn btn-border-fill btn-radius staggered-animation text-uppercase"
                                               href="shop-load-more.php?name_pr=<?php echo $data13->cat_collection ?>"
                                               data-animation="fadeInUp"
                                               data-animation-delay="0.4s">اکنون
                                                خرید کنید</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <ol class="carousel-indicators indicators_style2">
                <?php
                if ($data11 == null) {
                    echo "";
                } else {
                    ?>
                    <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                    <?php
                }
                if ($data12 == null) {
                    echo "";
                } else {
                    ?>
                    <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                    <?php
                }
                if ($data13 == null) {
                    echo "";
                } else {
                    ?>
                    <li data-target="#carouselExampleControls" data-slide-to="2"></li>
                    <?php
                }
                ?>
            </ol>
        </div>
    </div>
    <!-- END SECTION BANNER -->

    <!-- END MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION SHIPPING INFO -->
        <div class="section small_pb">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-3 col-sm-6">
                        <div class="icon_box icon_box_style3">
                            <div class="icon">
                                <i class="flaticon-shipped"></i>
                            </div>
                            <div class="icon_box_content">
                                <h6>ارسال رایگان</h6>
                                <p>در سراسر کشور</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="icon_box icon_box_style3">
                            <div class="icon">
                                <i class="flaticon-money-back"></i>
                            </div>
                            <div class="icon_box_content">
                                <h6>بازپرداخت پول</h6>
                                <p>ضمانت 30 روز بازگشت</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="icon_box icon_box_style3">
                            <div class="icon">
                                <i class="flaticon-support"></i>
                            </div>
                            <div class="icon_box_content">
                                <h6>پشتیبانی 24 ساعته</h6>
                                <p>پشتیبانی مشتری</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="icon_box icon_box_style3">
                            <div class="icon">
                                <i class="flaticon-lock"></i>
                            </div>
                            <div class="icon_box_content">
                                <h6>امنیت پرداخت</h6>
                                <p>پرداخت امن</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START SECTION SHIPPING INFO -->


        <!-- START SECTION SHOP  ( 1 ) -->
        <?php
        $sql0 = "select * from `slider` where `state` = 1";
        $result0 = $connect->query($sql0);
        $result0->execute();
        $data0 = $result0->fetch(PDO::FETCH_OBJ);
        if ($data0 == null) {
            echo '';
        } else {
            ?>
            <div class="section small_pt pb_20">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="heading_s3 text-center">
                                <h2><?php echo $data0->name; ?></h2>
                            </div>
                            <div class="small_divider clearfix"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product_slider carousel_slider owl-carousel owl-theme nav_style4"
                                 data-loop="true" data-dots="false" data-nav="true" data-margin="30"
                                 data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                                <?php
                                $first_slider = $data0->select;
                                $Number3 = 0;

                                $sql = "SELECT * FROM `product` where `select` = ? ORDER BY `id` DESC ";
                                $result = $connect->prepare($sql);
                                $result->bindValue(1, $first_slider);
                                $result->execute();
                                $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row) {
                                    $Last_Price = $row["price"] + $row["discount"];

                                    $sql2 = "select * from `vote` where `id_product` = ? AND `state` = 1";
                                    $result2 = $connect->prepare($sql2);
                                    $result2->bindValue(1, $row["id"]);
                                    $result2->execute();
                                    $rows2 = $result2->fetchAll(PDO::FETCH_ASSOC);
                                    $count2 = $result2->rowCount();
                                    foreach ($rows2 as $row2) {
                                        $Number3 += $row2["star_rating"];
                                        $average3 = (($Number3) / ($count2));
                                        $last_average3 = $average3 * 20;
                                    }
                                    echo '
                        <!-- Items -->
                        <div class="item">
                            <div class="product_box text-center">
                                <div class="product_img">
                                    <a href="shop-product-detail.php">
                                        <img src="admin/product/' . $row["images"] . '" alt="furniture_img6">
                                    </a>
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                    <!--    <li><a href="shop-compare.php" class="popup-ajax"><i class="icon-shuffle"></i></a></li> 
                                        <li><a href="shop-product-detail.php?id_pr=' . $row["id"] . '"><i class="fas fa-expand"></i></a></li> -->
                                    </ul>
                                </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.php?id_pr=' . $row["id"] . '">' . $row["name"] . '</a></h6>
                                    <div class="product_price">
                                        <span class="price">' . number_format($row["price"]) . ' تومان</span>
                                        <del>' . number_format($Last_Price) . ' تومان</del>
                                    </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                    ';
                                    if ($Number3 == null) {
                                        echo '';
                                    } else {
                                        echo '<div class="product_rate" style="width:' . $last_average3 . '%"></div>';
                                    }
                                    echo '
                                    </div>
                                    <span class="rating_num">(' . $count2 . ')</span>
                                </div>
                                    <div class="add-to-cart">
                                        <a href="shop-product-detail.php?id_pr=' . $row["id"] . '" class=" btn btn-fill-out btn-radius"><i class="icon-basket-loaded"></i> مشاهده جزئیات </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            ';
                                }
                                ?>
                                <!-- Items -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <!-- END SECTION SHOP -->

        <!-- START SECTION SHOP  ( 1 ) -->
        <?php
        $sql10 = "select * from `slider` where `state` = 2";
        $result10 = $connect->query($sql10);
        $result10->execute();
        $data1 = $result10->fetch(PDO::FETCH_OBJ);
        if ($data1 == null) {
            echo '';
        } else {
            ?>
            <div class="section small_pt pb_20">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="heading_s3 text-center">
                                <h2><?php echo $data1->name; ?></h2>
                            </div>
                            <div class="small_divider clearfix"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product_slider carousel_slider owl-carousel owl-theme nav_style4"
                                 data-loop="true" data-dots="false" data-nav="true" data-margin="30"
                                 data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                                <?php
                                $second_slider = $data1->select;
                                $sql9 = "SELECT * FROM `product` where `select` = ? ORDER BY `id` DESC ";
                                $result9 = $connect->prepare($sql9);
                                $result9->bindValue(1, $second_slider);
                                $result9->execute();
                                $rows9 = $result9->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows9 as $row9) {
                                    $Last_Price9 = $row9["price"] + $row9["discount"];

                                    $sql16 = "select * from `vote` where `id_product` = ? AND `state` = 1";
                                    $result16 = $connect->prepare($sql16);
                                    $result16->bindValue(1, $row9["id"]);
                                    $result16->execute();
                                    $rows16 = $result16->fetchAll(PDO::FETCH_ASSOC);
                                    $count16 = $result16->rowCount();
                                    $Number16=0;
                                    foreach ($rows16 as $row16) {
                                        $Number16 += $row16["star_rating"];
                                        $average16 = (($Number16) / ($count16));
                                        $last_average16 = $average16 * 20;
                                    }

                                    echo '
                        <!-- Items -->
                        <div class="item">
                            <div class="product_box text-center">
                                <div class="product_img">
                                    <a href="shop-product-detail.php">
                                        <img src="admin/product/' . $row9["images"] . '" alt="furniture_img6">
                                    </a>
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                    <!--    <li><a href="shop-compare.php" class="popup-ajax"><i class="icon-shuffle"></i></a></li> 
                                        <li><a href="shop-product-detail.php?id_pr=' . $row9["id"] . '"><i class="fas fa-expand"></i></a></li>-->
                                    </ul>
                                </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.php?id_pr=' . $row9["id"] . '">' . $row9["name"] . '</a></h6>
                                    <div class="product_price">
                                        <span class="price">' . number_format($row9["price"]) . ' تومان</span>
                                        <del>' . number_format($Last_Price9) . ' تومان</del>
                                    </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                    ';
                                    if ($Number16 == null) {
                                        echo '';
                                    } else {
                                        echo '<div class="product_rate" style="width:' . $last_average16 . '%"></div>';
                                    }
                                    echo '
                                    </div>
                                    <span class="rating_num">(' . $count16 . ')</span>
                                </div>
                                    <div class="add-to-cart">
                                        <a href="shop-product-detail.php?id_pr=' . $row9["id"] . '" class=" btn btn-fill-out btn-radius"><i class="icon-basket-loaded"></i> مشاهده جزئیات </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            ';
                                }
                                ?>
                                <!-- Items -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <!-- END SECTION SHOP -->

        <!-- START SECTION SHOP -->
        <div class="section small_pt pb_20">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="heading_s3 text-center">
                            <h2>محصولات اختصاصی</h2>
                        </div>
                        <div class="small_divider clearfix"></div>
                    </div>
                </div>
                <div class="row shop_container">

                    <?php
                    include "connect.php";
                    $sql1 = "select * from `product` where `Exclusive` = 1";
                    $result1 = $connect->query($sql1);
                    $rows1 = $result1->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows1 as $row1) {
                        $Last_Price1 = $row1["price"] + $row1["discount"];

                        $sql17 = "select * from `vote` where `id_product` = ? AND `state` = 1";
                        $result17 = $connect->prepare($sql17);
                        $result17->bindValue(1, $row1["id"]);
                        $result17->execute();
                        $rows17 = $result17->fetchAll(PDO::FETCH_ASSOC);
                        $count17 = $result17->rowCount();
                        $Number17=0;
                        foreach ($rows17 as $row17) {
                            $Number17 += $row17["star_rating"];
                            $average17 = (($Number17) / ($count17));
                            $last_average17 = $average17 * 20;
                        }
                        echo '
                <div class="col-lg-3 col-md-4 col-6">
                <div class="product_box text-center">
                    <div class="product_img">
                        <a href="shop-product-detail.php">
                            <img src="admin/product/' . $row1["images"] . '" alt="furniture_img1">
                        </a>
                        <div class="product_action_box">
                            <ul class="list_none pr_action_btn">
                              <!--  <li><a href="shop-product-detail.php?id_pr=' . $row1["id"] . '"><i class="fas fa-expand"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="product_info">
                        <h6 class="product_title"><a href="shop-product-detail.php?id_pr=' . $row1["id"] . '">' . $row1["name"] . '</a></h6>
                        <div class="product_price">
                            <span class="price">' . number_format($row1["price"]) . ' تومان</span>
                            <del>' . number_format($Last_Price1) . ' تومان</del>
                        </div>
                    <div class="rating_wrap">
                                    <div class="rating">
                                    ';
                        if ($Number17 == null) {
                            echo '';
                        } else {
                            echo '<div class="product_rate" style="width:' . $last_average17 . '%"></div>';
                        }
                        echo '
                                    </div>
                                    <span class="rating_num">(' . $count17 . ')</span>
                                </div>
                        <div class="add-to-cart">
                        	<a href="shop-product-detail.php?id_pr=' . $row1["id"] . '" class=" btn btn-fill-out btn-radius"><i class="icon-basket-loaded"></i> مشاهده جزئیات</a>
                        </div>
                    </div>
                </div>
            </div>
                ';
                    }
                    ?>

                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

        <!-- START SECTION BANNER -->
        <div class="section pb_20 small_pt">
            <div class="container">
                <div class="row">
                    <?php
                    $sql14 = "SELECT * FROM `slider_banner` where `which_slider` = 2 and `number` = 1";
                    $result14 = $connect->query($sql14);
                    $data14 = $result14->fetch(PDO::FETCH_OBJ);
                    /*****/
                    $sql15 = "SELECT * FROM `slider_banner` where `which_slider` = 2 and `number` = 2";
                    $result15 = $connect->query($sql15);
                    $data15 = $result15->fetch(PDO::FETCH_OBJ);

                    if ($data14 == null) {
                        echo "";
                    } else {
                        ?>

                        <div class="col-md-5">
                            <div class="single_banner">
                                <img src="admin/product/<?php echo $data14->images ?>" alt="furniture_banner1">
                                <div class="fb_info">
                                    <h5 class="single_bn_title1"><?php echo $data14->mini_txt ?></h5>
                                    <h3 class="single_bn_title"><?php echo $data14->title_txt ?></h3>
                                    <h4 class="single_bn_title1"><?php echo $data14->mini_explanation ?></h4>
                                    <a href="shop-load-more.php?name_pr=<?php echo $data14->cat_collection ?>"
                                       class="single_bn_link">اکنون خرید کنید</a>
                                </div>
                            </div>
                        </div>
                    <?php }
                    if ($data15 == null) {
                        echo "";
                    } else { ?>
                        <div class="col-md-7">
                            <div class="single_banner">
                                <img src="admin/product/<?php echo $data15->images ?>" alt="furniture_banner2">
                                <div class="fb_info2">
                                    <h5 class="single_bn_title1"><?php echo $data15->mini_txt ?></h5>
                                    <h3 class="single_bn_title"><?php echo $data15->title_txt ?></h3>
                                    <h4 class="single_bn_title1"><?php echo $data15->mini_explanation ?></h4>
                                    <a href="shop-load-more.php?name_pr=<?php echo $data15->cat_collection ?>"
                                       class="single_bn_link">اکنون خرید کنید</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- END SECTION BANNER -->

        <!-- START SECTION SHOP  ( 3 ) -->
        <?php
        $sql3 = "select * from `slider` where `state` = 3";
        $result3 = $connect->query($sql3);
        $result3->execute();
        $data3 = $result3->fetch(PDO::FETCH_OBJ);
        if ($data3 == null) {
            echo '';
        } else {
            ?>
            <div class="section small_pt pb_20">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="heading_s3 text-center">
                                <h2><?php echo $data3->name; ?></h2>
                            </div>
                            <div class="small_divider clearfix"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product_slider carousel_slider owl-carousel owl-theme nav_style4"
                                 data-loop="true" data-dots="false" data-nav="true" data-margin="30"
                                 data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                                <?php
                                $Third_slider = $data3->select;

                                $sql8 = "SELECT * FROM `product` where `select` = ? ORDER BY `id` DESC ";
                                $result8 = $connect->prepare($sql8);
                                $result8->bindValue(1, $Third_slider);
                                $result8->execute();
                                $rows8 = $result8->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows8 as $row8) {
                                    $Last_Price8 = $row8["price"] + $row8["discount"];

                                    $sql18 = "select * from `vote` where `id_product` = ? AND `state` = 1";
                                    $result18 = $connect->prepare($sql18);
                                    $result18->bindValue(1, $row8["id"]);
                                    $result18->execute();
                                    $rows18 = $result18->fetchAll(PDO::FETCH_ASSOC);
                                    $count18 = $result18->rowCount();
                                    $Number18=0;
                                    foreach ($rows18 as $row18) {
                                        $Number18 += $row18["star_rating"];
                                        $average18 = (($Number18) / ($count18));
                                        $last_average18 = $average18 * 20;
                                    }
                                    echo '
                        <!-- Items -->
                        <div class="item">
                            <div class="product_box text-center">
                                <div class="product_img">
                                    <a href="shop-product-detail.php">
                                        <img src="admin/product/' . $row8["images"] . '" alt="furniture_img6">
                                    </a>
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                    <!--    <li><a href="shop-compare.php" class="popup-ajax"><i class="icon-shuffle"></i></a></li> -->
                                       <!--- <li><a href="shop-product-detail.php?id_pr=' . $row8["id"] . '"><i class="fas fa-expand"></i></a></li> -->
                                    </ul>
                                </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.php?id_pr=' . $row8["id"] . '">' . $row8["name"] . '</a></h6>
                                    <div class="product_price">
                                        <span class="price">' . number_format($row8["price"]) . ' تومان</span>
                                        <del>' . number_format($Last_Price8) . ' تومان</del>
                                    </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                    ';
                                    if ($Number18 == null) {
                                        echo '';
                                    } else {
                                        echo '<div class="product_rate" style="width:' . $last_average18 . '%"></div>';
                                    }
                                    echo '
                                    </div>
                                    <span class="rating_num">(' . $count18 . ')</span>
                                </div>
                                    <div class="add-to-cart">
                                        <a href="shop-product-detail.php?id_pr=' . $row8["id"] . '" class=" btn btn-fill-out btn-radius"><i class="icon-basket-loaded"></i> مشاهده جزئیات </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            ';
                                }
                                ?>
                                <!-- Items -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <!-- END SECTION SHOP -->

        <!-- START SECTION SHOP  ( 4 ) -->
        <?php
        $sql4 = "select * from `slider` where `state` = 4";
        $result4 = $connect->query($sql4);
        $result4->execute();
        $data4 = $result4->fetch(PDO::FETCH_OBJ);
        if ($data4 == null) {
            echo '';
        } else {
            ?>
            <div class="section small_pt pb_20">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="heading_s3 text-center">
                                <h2><?php echo $data4->name; ?></h2>
                            </div>
                            <div class="small_divider clearfix"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product_slider carousel_slider owl-carousel owl-theme nav_style4"
                                 data-loop="true" data-dots="false" data-nav="true" data-margin="30"
                                 data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                                <?php
                                $Fourth_slider = $data4->select;

                                $sql7 = "SELECT * FROM `product` where `select` = ? ORDER BY `id` DESC ";
                                $result7 = $connect->prepare($sql7);
                                $result7->bindValue(1, $Fourth_slider);
                                $result7->execute();
                                $rows7 = $result7->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows7 as $row7) {
                                    $Last_Price7 = $row7["price"] + $row7["discount"];

                                    $sql19 = "select * from `vote` where `id_product` = ? AND `state` = 1";
                                    $result19 = $connect->prepare($sql19);
                                    $result19->bindValue(1, $row7["id"]);
                                    $result19->execute();
                                    $rows19 = $result19->fetchAll(PDO::FETCH_ASSOC);
                                    $count19 = $result19->rowCount();
                                    $Number19=0;
                                    foreach ($rows19 as $row19) {
                                        $Number19 += $row19["star_rating"];
                                        $average19 = (($Number19) / ($count19));
                                        $last_average19 = $average19 * 20;
                                    }
                                    echo '
                        <!-- Items -->
                        <div class="item">
                            <div class="product_box text-center">
                                <div class="product_img">
                                    <a href="shop-product-detail.php">
                                        <img src="admin/product/' . $row7["images"] . '" alt="furniture_img6">
                                    </a>
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                    <!--    <li><a href="shop-compare.php" class="popup-ajax"><i class="icon-shuffle"></i></a></li> 
                                        <li><a href="shop-product-detail.php?id_pr=' . $row7["id"] . '"><i class="fas fa-expand"></i></a></li> -->
                                    </ul>
                                </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.php?id_pr=' . $row7["id"] . '">' . $row7["name"] . '</a></h6>
                                    <div class="product_price">
                                        <span class="price">' . number_format($row7["price"]) . ' تومان</span>
                                        <del>' . number_format($Last_Price7) . ' تومان</del>
                                    </div>
                               <div class="rating_wrap">
                                    <div class="rating">
                                    ';
                                    if ($Number19 == null) {
                                        echo '';
                                    } else {
                                        echo '<div class="product_rate" style="width:' . $last_average19 . '%"></div>';
                                    }
                                    echo '
                                    </div>
                                    <span class="rating_num">('.$count19.')</span>
                                </div>
                                    <div class="add-to-cart">
                                        <a href="shop-product-detail.php?id_pr=' . $row7["id"] . '" class=" btn btn-fill-out btn-radius"><i class="icon-basket-loaded"></i> مشاهده جزئیات </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            ';
                                }
                                ?>
                                <!-- Items -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <!-- END SECTION SHOP -->


        <!-- START SECTION INSTAGRAM IMAGE -->
        <div class="section small_pt small_pb">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-12">

                        <div class="follow_box">
                            <i class="ti-instagram"></i>
                            <h3>اینستاگرام</h3>
                            <span>@shoppingzone</span>
                        </div>
                        <div class="client_logo carousel_slider owl-carousel owl-theme" data-dots="false"
                             data-margin="0" data-loop="true" data-autoplay="true"
                             data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "6"}}'>
                            <div class="item">
                                <div class="instafeed_box">
                                    <a href="#">
                                        <img src="assets/images/furniture_insta1.jpg" alt="furniture_insta1"/>
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="instafeed_box">
                                    <a href="#">
                                        <img src="assets/images/furniture_insta2.jpg" alt="furniture_insta2"/>
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="instafeed_box">
                                    <a href="#">
                                        <img src="assets/images/furniture_insta3.jpg" alt="furniture_insta3"/>
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="instafeed_box">
                                    <a href="#">
                                        <img src="assets/images/furniture_insta4.jpg" alt="furniture_insta4"/>
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="instafeed_box">
                                    <a href="#">
                                        <img src="assets/images/furniture_insta5.jpg" alt="furniture_insta5"/>
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="instafeed_box">
                                    <a href="#">
                                        <img src="assets/images/furniture_insta6.jpg" alt="furniture_insta6"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION INSTAGRAM IMAGE -->

        <!-- START SECTION CLIENT LOGO -->
        <div class="section small_pt">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="client_logo carousel_slider owl-carousel owl-theme" data-dots="false"
                             data-margin="30" data-loop="true" data-autoplay="true"
                             data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}}'>
                            <div class="item">
                                <div class="cl_logo">
                                    <img src="assets/images/cl_logo1.png" alt="cl_logo"/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="cl_logo">
                                    <img src="assets/images/cl_logo2.png" alt="cl_logo"/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="cl_logo">
                                    <img src="assets/images/cl_logo3.png" alt="cl_logo"/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="cl_logo">
                                    <img src="assets/images/cl_logo4.png" alt="cl_logo"/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="cl_logo">
                                    <img src="assets/images/cl_logo5.png" alt="cl_logo"/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="cl_logo">
                                    <img src="assets/images/cl_logo6.png" alt="cl_logo"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION CLIENT LOGO -->

    </div>
    <!-- END MAIN CONTENT -->


<?php include 'footer.php'; ?>