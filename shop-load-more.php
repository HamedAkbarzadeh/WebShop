<?php include "header-UserPanel.php";
include "connect.php";
if (isset($_GET["name_pr"])){
    $_SESSION["name_pr_shop_load"] = $_GET["name_pr"];
}
?>
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>بارگذاری بیشتر</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item"><a href="#">صفحات</a></li>
                        <li class="breadcrumb-item active">بارگذاری بیشتر</li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center mb-4 pb-1">
                            <div class="col-12">
                                <div class="product_header">
                                    <div class="product_header_left">
                                        <div class="custom_select">
                                            <?php
                                            if (isset($_GET["name_pr"])){?>
                                                <select class="form-control form-control-sm" id="shop-load-categories">
                                                    <option value="order">مرتب سازی پیش فرض</option>
                                                    <!--                                                <option value="popularity">مرتب سازی بر اساس محبوبیت</option>-->
                                                    <option value="date">مرتب سازی بر اساس جدید</option>
                                                    <option value="price">مرتب سازی بر اساس قیمت: پایین تا بالا</option>
                                                    <option value="price-desc">مرتب سازی بر اساس قیمت: بالا تا پایین</option>
                                                </select>
                                            <?php }?>
                                            <?php
                                            if (isset($_POST["search_input"])){?>
                                                <select class="form-control form-control-sm" id="shop-load-categories-search">
                                                    <option value="order-search">مرتب سازی پیش فرض</option>
                                                    <!--<option value="popularity-search">مرتب سازی بر اساس محبوبیت</option>-->
                                                    <option value="date-search">مرتب سازی بر اساس جدید</option>
                                                    <option value="price-search">مرتب سازی بر اساس قیمت: پایین تا بالا</option>
                                                    <option value="price-desc-search">مرتب سازی بر اساس قیمت: بالا تا پایین</option>
                                                </select>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="product_header_right">
                                        <div class="products_view">
                                            <a href="javascript:void(0);" class="shorting_icon grid active"><i
                                                        class="ti-view-grid"></i></a>
                                            <a href="javascript:void(0);" class="shorting_icon list"><i
                                                        class="ti-layout-list-thumb"></i></a>
                                        </div>
                                        <div class="custom_select">
                                            <select class="form-control form-control-sm">
                                                <option value="">نمایش</option>
                                                <option value="9">9</option>
                                                <option value="12">12</option>
                                                <option value="18">18</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row shop_container loadmore" id="show-load-more-order" data-item="8"
                             data-item-show="4" data-finish-message="مورد دیگری برای نمایش وجود ندارد"
                             data-btn="بارگذاری بیشتر">
                            <?php
                            if (isset($_GET["name_pr"])) {
                                $sql = "select * from `product` where `select`=?";
                                $result = $connect->prepare($sql);
                                $result->bindValue(1, $_GET["name_pr"]);
                                $result->execute();
                                $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row) {
                                    $Last_Price = $row["price"] - $row["discount"];

                                    $sql6 = "SELECT * FROM `vote` where id_product = ? AND `state` = 1 ";
                                    $result6 = $connect->prepare($sql6);
                                    $result6->bindValue(1, $row["id"]);
                                    $result6->execute();
                                    $count_vote = $result6->rowCount();
                                    $rows6 = $result6->fetchAll(PDO::FETCH_ASSOC);
                                    $Number = 0;
                                    foreach ($rows6 as $row6) {
                                        $Number += $row6["star_rating"];
                                        $average = (($Number) / ($count_vote));
                                        $last_average = $average * 20;
                                    }
                                    echo '
                            <div class="col-lg-3 col-md-4 col-6 grid_item">
                        <div class="product">
                            <div class="product_img">
                                <a href="shop-product-detail.php">
                                    <img src="admin/product/' . $row["images"] . '" alt="product_img1">
                                </a>
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> افزودن به سبد خرید</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="shop-product-detail.php?id_pr=' . $row["id"] . '">' . $row["name"] . '</a></h6>
                                <div class="product_price">
                                    <span class="price price_font_bg">' . number_format($Last_Price) . ' تومان</span>
                                    <del>' . number_format($row["price"]) . ' تومان</del>
                                    <div class="on_sale">
                                        <span>' . number_format($row["discount"]) . '  تومان تخفیف</span>
                                    </div>
                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                    ';
                                    if ($Number == null) {
                                        echo '';
                                    } else {
                                        echo '<div class="product_rate" style="width:' . $last_average . '%"></div>';
                                    }
                                    echo '
                                    
                                    </div>
                                    <span class="rating_num">(' . $count_vote . ')</span>
                                </div>
                                <div class="pr_desc">
                                    <p>' . $row["explanation_mini"] . '</p>
                                </div>
                                <div class="pr_switch_wrap">
                               <!--     <div class="product_color_switch">
                                        <span class="active" data-color="#87554B"></span>
                                        <span data-color="#333333"></span>
                                        <span data-color="#DA323F"></span>
                                    </div> --->
                                </div>
                                <div class="list_product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a href="shop-product-detail.php?id_pr=' . $row["id"] . '"><i class="icon-basket-loaded"></i> مشاهده جزئیات</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                            ';
                                }
                            } /******* search result ********/

                            elseif (isset($_POST["search_input"])) {
                                $_SESSION["result_search"] = $_POST["search_input"];


                                $sql1 = "select * from `product` where `name` LIKE '%" . $_SESSION["result_search"] . "%'";
                                $result1 = $connect->query($sql1);
                                $data1 = $result1->fetch(PDO::FETCH_OBJ);
                                $rows1 = $result1->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows1 as $row1) {

                                    $sql2 = "select * from `product` where `select` = ?";
                                    $result2 = $connect->prepare($sql2);
                                    $result2->bindValue(1, $data1->select);
                                    $result2->execute();

                                    $rows2 = $result2->fetchAll(PDO::FETCH_ASSOC);
                                }
                                foreach ($rows2 as $row2) {
                                    $Last_Price = $row2["price"] - $row2["discount"];

                                    $sql3 = "SELECT * FROM `vote` where id_product = ? AND `state` = 1 ";
                                    $result3 = $connect->prepare($sql3);
                                    $result3->bindValue(1, $row2["id"]);
                                    $result3->execute();
                                    $count_vote3 = $result3->rowCount();
                                    $rows3 = $result3->fetchAll(PDO::FETCH_ASSOC);
                                    $Number3 = 0;
                                    foreach ($rows3 as $row3) {
                                        $Number3 += $row3["star_rating"];
                                        $average3 = (($Number3) / ($count_vote3));
                                        $last_average3 = $average3 * 20;
                                    }

                                    echo '
                            <div class="col-lg-3 col-md-4 col-6 grid_item">
                        <div class="product">
                            <div class="product_img">
                                <a href="shop-product-detail.php">
                                    <img src="admin/product/' . $row2["images"] . '" alt="product_img1">
                                </a>
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a href="shop-product-detail.php?id_pr=' . $row2["id"] . '" ><i class="icon-basket-loaded"></i> افزودن به سبد خرید</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="shop-product-detail.php?id_pr=' . $row2["id"] . '">' . $row2["name"] . '</a></h6>
                                <div class="product_price">
                                    <span class="price price_font_bg">' . number_format($Last_Price) . ' تومان</span>
                                    <del>' . number_format($row2["price"]) . ' تومان</del>
                                    <div class="on_sale">
                                        <span>' . number_format($row2["discount"]) . '  تومان تخفیف</span>
                                    </div>
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
                                    <span class="rating_num">(' . number_format($count_vote3) . ')</span>
                                </div>
                                <div class="pr_desc">
                                    <p>' . $row2["explanation_mini"] . '</p>
                                </div>
                                <div class="list_product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> افزودن به سبد خرید</a></li>
         
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                            ';

                                }

                            }
                            /******* search result ********/


                            ?>

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
                                <input type="text" required="" class="form-control rounded-0" placeholder="آدرس ایمیل">
                                <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">
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
<?php include "footer-UserPanel.php"; ?>