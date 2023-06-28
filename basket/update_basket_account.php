<?php
session_start();
include "../connect.php";

$sql1="select * from `basket` where `user` = ?";
$result1=$connect->prepare($sql1);
$result1->bindValue(1,$_SESSION["email_Login"]);
$result1->execute();
$rows1=$result1->fetchAll(PDO::FETCH_ASSOC);
$All_Price=0;
$discount=0;
$Last_count_price=0;
$L_P=0;
foreach ($rows1 as $row1){
    $sql2="select * from `product` where `id`= ?";
    $result2=$connect->prepare($sql2);
    $result2->bindValue(1,$row1["id_product"]);
    $result2->execute();
    $rows2=$result2->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows2 as $row2) {

        $discount =$row2["discount"] * $row1["count"];
        $solo_product =$row2["price"] * $row1["count"];;
        $Last_price=$solo_product-$discount;
        echo '
        <tr>
        <td><a href="shop-product-detail.php?id_pr='.$row2["id"].'">'.$row2["name"].'</a></td>
        <td>'.$row1["date"].' </td>
        ';
        if ($row1["state"] == 0){
            echo '<td>هنوز پرداخت نشده</td>';
        }
        elseif ($row1["state"] == 1){
            echo '<td>تکمیل شد</td>';
        }
        echo '
             <td>'.number_format($Last_price).' تومان برای '.$row1["count"].' مورد</td>
             <td class="td_child"><a id='.$row2["id"].' class="delete_order_account btn btn-fill-out btn-sm">حذف</a></td>                            
             </tr>      
                                                            ';
        $Last_count_price +=$Last_price;
    }
//    $count_price= $All_Price * $row1["count"] ;
}
    echo '
    <tr>
    <td colspan="5">جمع کل : <b>'.number_format($Last_count_price).'</b> هزار تومان </td>
    </tr>
    ';
