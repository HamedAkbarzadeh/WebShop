<?php
session_start();
include "../connect.php";
$sql3="select * from `basket` where `user` = ? and `state` = 0";
$result3=$connect->prepare($sql3);
$result3->bindValue(1,$_SESSION["email_Login"]);
$result3->execute();



    $All_Price = 0;
    $count_price=0;
    $rows3 = $result3->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows3 as $row3) {

        $sql0 = "select * from `product` where id = ?";
        $result0 = $connect->prepare($sql0);
        $result0->bindValue(1, $row3["id_product"]);
        $result0->execute();

        $rows0 = $result0->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows0 as $row0) {
            $discount =$row0["discount"] * $row3["count"];
            $solo_product =$row0["price"] * $row3["count"];;
            $Last_price=$solo_product-$discount;
            echo '
        <li class="li_basket_header">
             <a href="#" class="item_remove"><i id=' . $row3["id"] . ' class="ion-close closed_icon"></i></a>
             <a href="#"><img src="admin/product/' . $row0["images"] . '" alt="cart_thumb1">' . $row0["name"] . '</a>
            <span class="cart_quantity"> '.$row3["count"].' عدد  ' . number_format($Last_price) . '<span class="cart_amount"> <span class="price_symbole">تومان</span></span></span>
        </li>


    ';
            $count_price += $Last_price;
        }
    }
echo '
<p class="cart_total"><strong>جمع:</strong> '.number_format($count_price).'<span class="cart_price"> <span class="price_symbole">تومان</span></span></p>

';
