<?php
session_start();
include "../connect.php";

if(isset($_POST["id"])){
    
$sql="UPDATE `basket` SET `count`= ? WHERE `user` = ? AND `id`= ?";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["count"]);
$result->bindValue(2,$_SESSION["email_Login"]);
$result->bindValue(3,$_POST["id"]);

if ($result->execute()){


                                $sql1="select * from `basket` where `user` = ? and `id`= ?";
                                $result1=$connect->prepare($sql1);
                                $result1->bindValue(1,$_SESSION["email_Login"]);
                                $result1->bindValue(2,$_POST["id"]);
                                $result1->execute();
                                $rows1=$result1->fetchAll(PDO::FETCH_ASSOC);
                                $count_price=0;

                                foreach ($rows1 as $row1) {
                                    $sql2="select * from `product` where id = ?";
                                    $result2=$connect->prepare($sql2);
                                    $result2->bindValue(1,$row1["id_product"]);
                                    $result2->execute();
                                    $rows2=$result2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($rows2 as $row2) {
                                        $Old_price =$row2["price"]+$row2["discount"];
                                        $new_price =$row2["price"]-$row2["discount"];
                                        $solo_product =$new_price * $row1["count"];;
                                        echo '
                                 <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="admin/product/'.$row2["images"].'" alt="product1"></a></td>
                                    <td class="product-name" data-title="محصول"><a href="#">'.$row2["name"].'</a></td>
                                    <td class="product-price" data-title="قیمت"><del class="old_price">'.number_format($Old_price).'  تومان </del> '.number_format($new_price).' تومان</td>
                                    <td class="product-quantity" data-title="تعداد">
                                    <div class="quantity">
                                            <input id='.$row1['id'].' class="qty product_shop_cart_counter" type="number" min="1" max='.$row2["count_product"].' name="quantity" value='.$row1["count"].' title="Qty" size="4">
                                        </div>
                                        <span class="count_product">تعداد موجود از این محصول : <b>'.$row2["count_product"].'</b> عدد </span>
                                        </td>
                                    <td class="product-subtotal" data-title="جمع">'.number_format($solo_product).' تومان</td>
                                    <td class="product-remove" data-title="حذف"><a id='.$row2["id"].' class="delete_shop_cart"><i class="ti-close"></i></a></td>
                                </tr>                                       
                                        ';
                                        $count_price += $new_price * $row1["count"];
                                    }
                                }
}

}else{
    header("location: index.php");
    die();
}