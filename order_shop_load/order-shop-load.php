<?php
include "../connect.php";
session_start();
/**** default order ****/
if (isset($_POST["order"])){
    $sql = "select * from `product` where `select`=?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $_SESSION["name_pr_shop_load"]);
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
}
/**** default order ****/
/**** new product *****/
if (isset($_POST["date"])){
    $sql = "select * from `product` where `select`=? ORDER BY `product`.`id` DESC";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $_SESSION["name_pr_shop_load"]);
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
}


if (isset($_POST["price-desc"])){
    $sql = "select * from `product` where `select`=? ORDER BY `product`.`price` DESC";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $_SESSION["name_pr_shop_load"]);
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
}
if (isset($_POST["price"])){
    $sql = "select * from `product` where `select`=? ORDER BY `product`.`price` ASC";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $_SESSION["name_pr_shop_load"]);
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
}

