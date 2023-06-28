<?php
include "../connect.php";
session_start();

/**** default result search ****/
if (isset($_POST["order-search"])) {
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
/**** default result search ****/
/**** new-product-search ******/
if (isset($_POST["date-search"])) {
    $sql1 = "select * from `product` where `name` LIKE '%" . $_SESSION["result_search"] . "%'";
    $result1 = $connect->query($sql1);
    $data1 = $result1->fetch(PDO::FETCH_OBJ);
    $rows1 = $result1->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows1 as $row1) {

        $sql2 = "select * from `product` where `select` = ? ORDER BY `product`.`id` DESC";
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
/**** new-product-search ******/
if (isset($_POST["price-desc-search"])) {
    $sql1 = "select * from `product` where `name` LIKE '%" . $_SESSION["result_search"] . "%'";
    $result1 = $connect->query($sql1);
    $data1 = $result1->fetch(PDO::FETCH_OBJ);
    $rows1 = $result1->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows1 as $row1) {

        $sql2 = "select * from `product` where `select` = ? ORDER BY `product`.`price` DESC";
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
/**** price_ASC ****/
if (isset($_POST["price-search"])) {
    $sql1 = "select * from `product` where `name` LIKE '%" . $_SESSION["result_search"] . "%'";
    $result1 = $connect->query($sql1);
    $data1 = $result1->fetch(PDO::FETCH_OBJ);
    $rows1 = $result1->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows1 as $row1) {

        $sql2 = "select * from `product` where `select` = ? ORDER BY `product`.`price` ASC";
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

/**** price_ASC ****/