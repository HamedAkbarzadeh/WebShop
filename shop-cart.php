<?php
session_start();
if (isset($_SESSION["email_Login"])){
session_write_close();
include 'header-UserPanel.php';
include "connect.php";
?>

    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>سبد خرید</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item"><a href="#">صفحات</a></li>
                        <li class="breadcrumb-item active">سبد خرید</li>
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
                        <div class="table-responsive shop_cart_table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">محصول</th>
                                    <th class="product-price">قیمت</th>
                                    <th class="product-quantity">تعداد</th>
                                    <th class="product-subtotal">جمع</th>
                                    <th class="product-remove">حذف</th>
                                </tr>
                                </thead>
                                <tbody id="basket_shop_cart">
                                <?php
                                $sql1="select * from `basket` where `user` = ?";
                                $result1=$connect->prepare($sql1);
                                $result1->bindValue(1,$_SESSION["email_Login"]);
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
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6" class="px-0">
                                        <div class="row no-gutters align-items-center">

                                            <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                                <div class="coupon field_form input-group">
                                                    <input type="text" value="" class="form-control form-control-sm" placeholder="شماره کوپن را وارد کنید...">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-fill-out btn-sm" type="submit">کوپن</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-6 text-left text-md-right">
                                                <button class="btn btn-line-fill btn-sm" id="update_shop_cart" type="button">به روز رسانی سبد خرید</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider"></div>
                        <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading_s1 mb-3">
                            <h6>محاسبه هزینه ارسال</h6>
                        </div>

                        <div class="custom_radio">
                            <input type="radio" name="radio" id="in_city">
                            <label for="in_city">حمل به داخل شهر مشهد</label>
                        </div>
                        <div class="custom_radio">
                            <input type="radio" name="radio" id="radio_out_city">
                            <label for="radio_out_city">حمل به خارج از شهر مشهد</label>
                        </div>
                        <div id="out_of_city">
                            <form class="field_form shipping_calculator">
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <div class="custom_select">
                                            <select id="state" name="state">
                                                <option value="0">استان را انتخاب کنید</option>
                                                <?php
                                                $sql="select * from province";
                                                $result=$connect->query($sql);

                                                while($data=$result->fetch(PDO::FETCH_ASSOC)) {
                                                    echo '  <option value='.$data['id'].'>'.$data['name'].'</option>';     }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <div class="custom_select">
                                            <select id="city" name="city">
                                                <option value="0" selected disabled>شهر را انتخاب کنید</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input required="required" placeholder="کد پستی" class="form-control" name="name" type="text">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <button class="btn btn-fill-line" type="submit">به روزرسانی کل</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border p-3 p-md-4">
                            <div class="heading_s1 mb-3">
                                <h6>جمع سبد خرید</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="cart_total_label">جمع سبد خرید</td>
                                        <td class="cart_total_amount"><?php echo number_format($count_price)?> تومان</td>
                                    </tr>
                                    <tr>
                                        <td>هزینه ارسال</td>
                                        <td class="cart_total_amount" id="price_location">0</td>
                                        <?php
                                        $sql3="select * from `location`";
                                        $result3=$connect->query($sql3);
                                        $data3=$result3->fetch(PDO::FETCH_OBJ);
                                        ?>
                                        <input type="hidden" value="<?php echo $data3->in_city ?>" id="hidden_in_city">
                                        <input type="hidden" value="<?php echo $data3->out_city ?>" id="hidden_out_city">
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">جمع</td>
                                        <td class="cart_total_amount"><strong>349000 تومان</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="#" class="btn btn-fill-out">ادامه</a>
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

    <?php include 'footer-UserPanel.php'; ?>

    <?php
}else{
    header("location: index.php");
    die();
}
?>



