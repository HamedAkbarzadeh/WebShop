<?php
include "connect.php";
$sql = "select * from `product` where `name` LIKE '%" . $_POST["text"] . "%'";
$result = $connect->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);


foreach ($rows as $row) {
    $Last_Price = $row["price"] + $row["discount"];
    echo '
         
                                  
                                <a href=shop-product-detail.php?id_pr=' . $row["id"] . '>
                                    <div class="body_search_box">
                                <div class="right_search_new">
                                    <img src="admin/product/' . $row["images"] . '" alt="">
                                </div>
                                <div class="left_search_new">
                                    <div class="title_search">' . $row["name"] . '</div>
                                    <div class="categories_search">' . $row["explanation_mini"] . '</div>
                                    <div class="price_search_new">
                                        <del class="del_price">' . $Last_Price . '</del>
                                        <span class="price">' . $row["price"] . '</span>
                                    </div>
                                </div>
                            </div>
</a>
    ';
}