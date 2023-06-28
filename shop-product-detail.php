<?php include "header-UserPanel.php";
include "connect.php";
$_SESSION["id_product"] = $_GET["id_pr"];
?>
    <!--- want cnc --->
<!--    <div class="cnc_want">-->
<!--        <div class="icon_cnc_close"><i class="fas fa-times close-icon"></i></div>-->
<!--        <div class="box_cnc_exit"></div>-->
<!--        <div class="box_cnc">-->
<!--            <div class="body_cnc">-->
<!--                <form action="basket/update-basket-state-info.php" id="form_update_info_state" method="post">-->
<!--                    <div class="wrapper">-->
<!--                        <input type="radio" name="select" id="option-1" checked>-->
<!--                        <input type="radio" name="select" id="option-2">-->
<!--                        <label for="option-1" class="option option-1">-->
<!--                            <div class="dot"></div>-->
<!--                            <span>به cnc کاری نیاز ندارم</span>-->
<!--                        </label>-->
<!--                        <label for="option-2" class="option option-2">-->
<!--                            <div class="dot"></div>-->
<!--                            <span>به cnc کاری نیاز دارم</span>-->
<!--                        </label>-->
<!--                    </div>-->
<!--                    <div>-->
<!--                        <div class="form-group form_cnc">-->
<!--                            <div class="label-group">-->
<!--                                <label class="lbl_red bg_white" for="comment_cnc">لطفا اطلاعات دقیق اندازه و شکل و را-->
<!--                                    وارد کنید .<br> در صورت نیاز نمونه عکس بار گذاری کنید .</label>-->
<!--                            </div>-->
<!--                            <textarea type="text" class="form-control" id="comment_cnc" name="comment_cnc"-->
<!--                                      placeholder=" توضیحات : "></textarea>-->
<!--                            <input type="file" name="userImage" id="file-7" class="inputfile inputfile-6 photo_cnc"-->
<!--                                   data-multiple-caption="{count} فایل انتخاب شد." multiple/>-->
<!--                            <label for="file-7"><span></span> <strong>-->
<!--                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">-->
<!--                                        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>-->
<!--                                    </svg>-->
<!--                                    انتخاب فایل</strong></label>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    - want cnc --->
<!--                    <div class="btn_body_cnc">-->
<!--                        <button type="submit" id="--><?php //echo $_GET["id_pr"] ?><!--"-->
<!--                                class="add-info-basket btn btn-fill-out get_id"><i class="icon-basket-loaded"></i>-->
<!--                            افزودن به سبد خرید-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>جزئیات محصول پیش فرض</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item"><a href="#">صفحات</a></li>
                        <li class="breadcrumb-item active">جزئیات محصول پیش فرض</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->

    <!-- START MAIN CONTENT -->
    <div class="main_content">
        <!-- START SECTION SHOP -->
        <?php
        if (isset($_GET["id_pr"])) {
            $sql = "select * from `product` where `id`= ?";
            $result = $connect->prepare($sql);
            $result->bindValue(1, $_GET["id_pr"]);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_OBJ);
            $Last_Price = ($data->price) - ($data->discount);
        } else {
            header("location:index.php");
            die();
        }

        $sql3 = "select * from `cat` where id = ?";
        $result3 = $connect->prepare($sql3);
        $result3->bindValue(1, $data->select);
        $result3->execute();
        $data3 = $result3->fetch(PDO::FETCH_OBJ);
        ?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <!----->
                        <div class="product-image">
                            <div class="product_img_box">
                                <img id="product_img" src='admin/product/<?php echo $data->images ?>'
                                     data-zoom-image="admin/product/<?php echo $data->images ?>" alt="product_img1"/>
                                <a href="#" class="product_img_zoom" title="Zoom">
                                    <span class="linearicons-zoom-in"></span>
                                </a>
                            </div>
                            <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4"
                                 data-slides-to-scroll="1" data-infinite="false">
                                <div class="item">
                                    <a href="#" class="product_gallery_item active"
                                       data-image="admin/product/<?php echo $data->images ?>"
                                       data-zoom-image="admin/product/<?php echo $data->images ?>">
                                        <img src="admin/product/<?php echo $data->images ?>" alt="product_small_img1"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!----->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="pr_detail">
                            <div class="product_description">
                                <h4 class="product_title"><a href="#"><?php echo $data->name ?></a></h4>
                                <div class="product_price">
                                    <span class="price"><?php echo number_format($Last_Price) ?> تومان</span>
                                    <del><?php echo number_format($data->price) ?> تومان</del>
                                    <div class="on_sale">
                                        <span><?php echo number_format($data->discount) ?> تخفیف</span>
                                    </div>
                                </div>
                                <?php
                                $sql66 = "SELECT * FROM `vote` where id_product = ? AND `state` = 1 ";
                                $result66 = $connect->prepare($sql66);
                                $result66->bindValue(1, $_GET['id_pr']);
                                $result66->execute();
                                $count_vote66 = $result66->rowCount();
                                $rows66 = $result66->fetchAll(PDO::FETCH_ASSOC);
                                $Number66 = 0;
                                foreach ($rows66 as $row66) {
                                    $Number66 += $row66["star_rating"];
                                    $average66 = (($Number66) / ($count_vote66));
                                    $last_average66 = $average66 * 20;
                                }
                                ?>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <?php
                                        if ($Number66 == null) {
                                            echo '';
                                        } else {
                                            echo '<div class="product_rate" style="width:' . $last_average66 . '%"></div>';
                                        }
                                        ?>
                                    </div>
                                    <span class="rating_num"><?php echo $count_vote66?></span>
                                </div>
                                <div class="group_flex">
                                    <div class="pr_desc">
                                        <p><?php echo $data->explanation_mini ?></p>
                                    </div>
                                    <div class="product_sort_info">
                                        <ul>
                                            <li><i class="linearicons-shield-check"></i> 1 سال ضمانت برند</li>
                                            <li><i class="linearicons-sync"></i> 72 ساعت ضمانت برگشت</li>
                                            <li><i class="linearicons-bag-dollar"></i> پرداخت نقدی موجود است</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pr_switch_wrap">
                                    <span class="switch_lable">رنگ</span>
                                    <div class="product_color_switch">
                                        <?php
                                        $sql5 = "select * from `color_product` where id_product = ?";
                                        $result5 = $connect->prepare($sql5);
                                        $result5->bindValue(1, $_GET["id_pr"]);
                                        $result5->execute();
                                        $rows5 = $result5->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows5 as $row5) {
                                            switch ($row5["black"]) {
                                                case '#333333';
                                                    echo '<span id="black-check" name="black-check" class="color_order_pick" data-color="#333333"></span>';
                                                    break;
                                            }
                                            switch ($row5["white"]) {
                                                case '#ffffff';
                                                    echo '<span id="white-check" name="white-check" class="color_order_pick" data-color="#ffffff"></span>';
                                            }
                                            switch ($row5["gold"]) {
                                                case '#bab100';
                                                    echo '<span id="gold-check" name="gold-check" class="color_order_pick" data-color="#bab100"></span>';
                                                    break;
                                            }
                                            switch ($row5["brown"]) {
                                                case '#a33c00';
                                                    echo '<span id="brown-check" name="brown-check" class="color_order_pick" data-color="#a33c00"></span>';
                                                    break;
                                            }
                                            switch ($row5["cream"]) {
                                                case '#ffd257';
                                                    echo '<span id="cream-check" name="cream-check" class="color_order_pick" data-color="#ffd257"></span>';
                                                    break;
                                            }
                                            switch ($row5["bony"]) {
                                                case '#dbdbdb';
                                                    echo '<span id="bony-check" name="bony-check" class="color_order_pick" data-color="#dbdbdb"></span>';
                                                    break;
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="pr_switch_wrap">
                                    <span class="switch_lable">سایز</span>
                                    <div class="product_size_switch">
                                        <span>xs</span>
                                        <span>s</span>
                                        <span>m</span>
                                        <span>l</span>
                                        <span>xl</span>
                                    </div>
                                </div>
                            </div>
                            <!--- want cnc --->
                            <!--                            <div>-->
                            <!--                                <div class="wrapper">-->
                            <!--                                    <input type="radio" name="select" id="option-1" checked>-->
                            <!--                                    <input type="radio" name="select" id="option-2">-->
                            <!--                                    <label for="option-1" class="option option-1">-->
                            <!--                                        <div class="dot"></div>-->
                            <!--                                        <span>به cnc کاری نیاز ندارم</span>-->
                            <!--                                    </label>-->
                            <!--                                    <label for="option-2" class="option option-2">-->
                            <!--                                        <div class="dot"></div>-->
                            <!--                                        <span>به cnc کاری نیاز دارم</span>-->
                            <!--                                    </label>-->
                            <!--                                </div>-->
                            <!--                                <div>-->
                            <!--                                    <div class="form-group form_cnc">-->
                            <!--                                        <div class="label-group">-->
                            <!--                                            <label class="lbl_red" for="comment_cnc">لطفا اطلاعات دقیق اندازه و شکل و را وارد کنید . در صورت نیاز نمونه عکس بار گذاری کنید .</label>-->
                            <!--                                        </div>-->
                            <!--                                        <textarea type="text"  class="form-control" id="comment_cnc" name="comment_cnc" placeholder=" توضیحات : "></textarea>-->
                            <!--                                                <input type="file" name="userImage" id="file-7" class="inputfile inputfile-6 photo_cnc" data-multiple-caption="{count} فایل انتخاب شد." multiple />-->
                            <!--                                                <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> انتخاب فایل</strong></label>-->
                            <!--                                     </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--- want cnc --->
                            <hr/>
                            <div class="cart_extra">
                                <div class="cart-product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" id="minus_count" class="minus">
                                        <input type="text" disabled name="count_product" value="1" id="count_product"
                                               title="Qty" class="qty" size="4">
                                        <input type="button" value="+" id="plus_count" class="plus">
                                        <input type="hidden" id="count_hidden"
                                               value="<?php echo $data->count_product ?>">
                                    </div>
                                </div>
                                <div class="cart_btn">
                                    <button type="button" formtarget="_blank" id="<?php echo $_GET["id_pr"] ?>"
                                            class="add-to-basket btn btn-fill-out get_id btn-addtocart"><i
                                                class="icon-basket-loaded"></i> افزودن به سبد خرید
                                    </button>
                                    <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                                    <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                                </div>
                            </div>
                            <div class="count_product">تعداد موجود از این محصول :
                                <b><?php echo $data->count_product ?></b>عدد
                            </div>

                            <hr/>
                            <ul class="product-meta">
                                <li>دسته بندی: <a href="#"><?php echo $data3->name ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="large_divider clearfix"></div>
                    </div>
                </div>
                <!-- نظرات php -->
                <?php
                $sql2 = "select * from `vote` where `id_product` = ? AND `state` = 1";
                $result2 = $connect->prepare($sql2);
                $result2->bindValue(1, $_GET["id_pr"]);
                $result2->execute();
                $rows2 = $result2->fetchAll(PDO::FETCH_ASSOC);
                $count = $result2->rowCount();
                ?>
                <!-- نظرات php -->
                <div class="row">
                    <div class="col-12">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-toggle="tab"
                                       href="#Description" role="tab" aria-controls="Description" aria-selected="true">توضیحات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-toggle="tab"
                                       href="#Additional-info" role="tab" aria-controls="Additional-info"
                                       aria-selected="false">اطلاعات اضافی</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab"
                                       aria-controls="Reviews" aria-selected="false">نظرات (<?php echo $count ?>)</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab">
                                <div class="tab-pane fade show active" id="Description" role="tabpanel"
                                     aria-labelledby="Description-tab">
                                    <p><?php echo $data->explanation_All ?></p>
                                </div>
                                <!-- توضحات اضافی -->
                                <div class="tab-pane fade" id="Additional-info" role="tabpanel"
                                     aria-labelledby="Additional-info-tab">
                                    <table class="table table-bordered">
                                        <?php
                                        $sql1 = "SELECT * FROM `information` where `id_product`= ?";
                                        $result1 = $connect->prepare($sql1);
                                        $result1->bindValue(1, $data->id);
                                        $result1->execute();
                                        $rows = $result1->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows as $row) {
                                            echo '
                                    <tr>
                                        <td>' . $row["question"] . '</td>
                                        <td>' . $row["answer"] . '</td>
                                    </tr>
                                        ';
                                        }
                                        ?>
                                    </table>
                                </div>
                                <!-- توضحات اضافی -->
                                <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                    <div class="comments">
                                        <?php

                                        ?>
                                        <h5 class="product_tab_title"><span><?php echo $count ?></span> نظر برای
                                            <span><?php echo $data->name ?></span></h5>
                                        <ul class="list_none comment_list mt-4">

                                            <!-- نظر شخص -->
                                            <?php
                                            foreach ($rows2 as $row2) {
                                                echo '
                                            <li>
                                            <div class="comment_img">
                                                <img src="admin/vote/images/person.png" alt="user1"/>
                                            </div>
                                            <div class="comment_block">
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                    ';
                                                switch ($row2["star_rating"]) {
                                                    case '0';
                                                        echo '<div class="product_rate" style="width:0"></div>';
                                                        break;

                                                    case '1';
                                                        echo '<div class="product_rate" style="width:20%"></div>';
                                                        break;

                                                    case '2';
                                                        echo '<div class="product_rate" style="width:40%"></div>';
                                                        break;

                                                    case '3';
                                                        echo '<div class="product_rate" style="width:60%"></div>';
                                                        break;

                                                    case '4';
                                                        echo '<div class="product_rate" style="width:80%"></div>';
                                                        break;

                                                    case '5';
                                                        echo '<div class="product_rate" style="width:100%"></div>';
                                                        break;
                                                }
                                                echo '
                                                    </div>
                                                </div>
                                                <p class="customer_meta">
                                                    <span class="review_author">' . $row2["name"] . '</span>
                                                    <span class="comment-date"> ' . $row2["date"] . '</span>
                                                </p>
                                                <div class="description">
                                                    <p>' . $row2["vote"] . '</p>
                                                </div>
                                            </div>
                                        </li>
                                            ';
                                            }
                                            ?>

                                            <!-- نظر شخص -->

                                        </ul>
                                    </div>
                                    <!-- ارسال نظر -->
                                    <div class="review_form field_form">

                                        <div class="validation_input_plus">
                                            <span id="msg-validation-p"></span>
                                            <div class="full_bottom_Border_validation"></div>
                                        </div>

                                        <h5>ارسال نظرات</h5>
                                        <form class="row mt-3">
                                            <div class="form-group col-12">
                                                <div class="star_rating">
                                                    <span data-value="1" id="vote_one"><i
                                                                class="far fa-star"></i></span>
                                                    <span data-value="2" id="vote_two"><i
                                                                class="far fa-star"></i></span>
                                                    <span data-value="3" id="vote_three"><i
                                                                class="far fa-star"></i></span>
                                                    <span data-value="4" id="vote_four"><i
                                                                class="far fa-star"></i></span>
                                                    <span data-value="5" id="vote_five"><i
                                                                class="far fa-star"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-12">
                                                <textarea placeholder="نظر شما *" class="form-control " name="vote"
                                                          id="vote" rows="4"></textarea>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <input placeholder="نام خود را وارد کنید *" class="form-control"
                                                       id="name_vote" name="name" type="text">

                                            </div>
                                            <div class="form-group col-md-6">
                                                <input placeholder="ایمیل خود را وارد کنید *" class="form-control"
                                                       id="email_vote" name="email" type="email">
                                            </div>

                                            <div class="form-group col-12">
                                                <button type="button" id="btn_vote" class="btn btn-fill-out">ارسال نظر
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- ارسال نظر -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="small_divider"></div>
                        <div class="divider"></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="heading_s1">
                            <h3>محصولات مرتبط</h3>
                        </div>
                        <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20"
                             data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>

                            <?php
                            $sql4 = "select * from `product` where `select` = ? AND `id` != ?";
                            $result4 = $connect->prepare($sql4);
                            $result4->bindValue(1, $data->select);
                            $result4->bindValue(2, $data->id);
                            $result4->execute();
                            $rows4 = $result4->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows4 as $row4) {
                                $Last_Price = $row4["price"] + $row4["discount"];


                                $sql6 = "SELECT * FROM `vote` where id_product = ? AND `state` = 1 ";
                                $result6 = $connect->prepare($sql6);
                                $result6->bindValue(1, $row4["id"]);
                                $result6->execute();
                                $count_vote = $result6->rowCount();
                                $rows6 = $result6->fetchAll(PDO::FETCH_ASSOC);
                                $Number = 0;
                                foreach ($rows6 as $row6) {
                                    $Number += $row6["star_rating"];
                                    $average = ($Number) / ($count_vote);
                                    $last_average = $average * 20;
                                }

                                echo '
                            <div class="item">
                            <div class="product">
                                <span class="pr_flash">جدید</span>
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="admin/product/' . $row4["images"] . '" alt="product_img3">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li><a href="shop-product-detail.php?id_pr=' . $row4["id"] . '"><i class="fas fa-expand"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.php?id_pr=' . $row4["id"] . '">' . $row4["name"] . '</a></h6>
                                    <div class="product_price">
                                        <span class="price">' . $row4["price"] . ' تومان</span>
                                        <del>' . $Last_Price . ' تومان</del>
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

                                        <span class="rating_num">' . $count_vote . '</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>' . $row4["explanation_mini"] . '</p>
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
<?php include "footer-UserPanel.php"; ?>