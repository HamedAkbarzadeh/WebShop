<?php
session_start();
if (isset($_SESSION["email_Login"]))
{
session_write_close();
include "header-UserPanel.php";
include "connect.php";

?>
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>حساب کاربری</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item"><a href="#">صفحات</a></li>
                        <li class="breadcrumb-item active">حساب کاربری</li>
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
                    <div class="col-lg-3 col-md-4">
                        <div class="dashboard_menu">
                            <ul class="nav nav-tabs flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>داشبورد</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full orders-tab-ORDER"></i>سفارشات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="order-success-tab" data-toggle="tab" href="#order-success" role="tab" aria-controls="order-success" aria-selected="true"><i class="ti-shopping-cart "></i>خرید های من</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>آدرس من</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>جزئیات حساب</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="user/exit.php"><i class="ti-lock"></i>خروج</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>داشبورد</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>از داشبورد حساب شما. می توانید سفارشات اخیر خود را به راحتی بررسی کرده و <a href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">مشاهده کنید</a>، آدرس های ارسالی و <a href="javascript:void(0);" onclick="$('#address-tab').trigger('click')">صورتحساب خود را مدیریت کنید</a> و <a href="javascript:void(0);" onclick="$('#account-detail-tab').trigger('click')">گذرواژه و جزئیات حساب خود را ویرایش کنید.</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>سفارشات</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>سفارش</th>
                                                    <th>تاریخ</th>
                                                    <th>وضعیت</th>
                                                    <th>جمع</th>
                                                    <th>حذف</th>
                                                </tr>
                                                </thead>
                                                <tbody class="basket_my_account">

                                                    <?php
                                                    $sql1="select * from `basket` where `user` = ?";
                                                    $result1=$connect->prepare($sql1);
                                                    $result1->bindValue(1,$_SESSION["email_Login"]);
                                                    $result1->execute();
                                                    $rows1=$result1->fetchAll(PDO::FETCH_ASSOC);
                                                    $data1=$result1->fetch(PDO::FETCH_OBJ);

                                                    $All_Price=0;
                                                    $discount=0;
                                                    $Last_count_price=0;
                                                    foreach ($rows1 as $row1){
                                                        $sql2="select * from `product` where `id`= ?";
                                                        $result2=$connect->prepare($sql2);
                                                        $result2->bindValue(1,$row1["id_product"]);
                                                        $result2->execute();
                                                        $rows2=$result2->fetchAll(PDO::FETCH_ASSOC);
                                                        $data2=$result2->fetch(PDO::FETCH_OBJ);

                                                        foreach ($rows2 as $row2) {
                                                            $discount =$row2["discount"] * $row1["count"];
                                                            $solo_product =$row2["price"] * $row1["count"];;
                                                            $Last_price=$solo_product-$discount;
                                                            echo '
                                                    <tr>
                                                    <td><a href="shop-product-detail.php?id_pr='.$row2["id"].'">'.$row2["name"].'</a></td>
                                                    <td>'.$row1["date"].' 14</td>
                                                    ';
                                                    if ($row1["state"] == 0){
                                                        echo '<td>هنوز پرداخت نشده .</td>';
                                                    }
                                                    elseif ($row1["state"] == 1){
                                                        echo '<td>پرداخت شد .</td>';
                                                    }
                                                    echo '
                                                    <td>'.number_format($Last_price).' تومان برای '.$row1["count"].' مورد</td>
                                                    <td class="td_child"><a id='.$row2["id"].' class="delete_order_account btn btn-fill-out btn-sm">حذف</a></td>                            
                                                     </tr>      
                                                            ';
                                                            $Last_count_price +=$Last_price;
                                                        }
                                                    }
                                                    ?>
                                                <tr>
                                                    <td colspan="5">جمع کل : <b><?php echo number_format($Last_count_price)?></b> هزار تومان </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="btn_div">
                                                <?php
                                                $sql0="select * from `basket` where `user` = ? and `state` = 0";
                                                $result0=$connect->prepare($sql0);
                                                $result0->bindValue(1,$_SESSION["email_Login"]);
                                                $result0->execute();
                                                $count=$result0->rowCount();


                                                        if ($count)
                                                        {
                                                            echo '<span><a href="checkout.php" class="btn btn-fill-out btn-sm">ادامه فرایند خرید</a></span>';
                                                        }
                                                        else{
                                                            echo " ";
                                                        }



                                                ?>
                                                <span><a class="update_basket_account btn btn-fill-out btn-sm">بروز رسانی سبد </a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- order-success -->
                            <div class="tab-pane fade" id="order-success" role="tabpanel" aria-labelledby="order-success-tab">
                                <div class="all_order">
                                    <?php
                                    $sql3="select * from `basket` where `user` = ? and `state` = 1";
                                    $result3=$connect->prepare($sql3);
                                    $result3->bindValue(1,$_SESSION["email_Login"]);
                                    $result3->execute();
                                    $rows3=$result3->fetchAll(PDO::FETCH_ASSOC);


                                    foreach ($rows3 as $row3) {
                                        $sql5="SELECT * FROM `order_user` where `Code_Follow` = ?";
                                        $result5=$connect->prepare($sql5);
                                        $result5->bindValue(1,$row3["code"]);
                                        $result5->execute();
                                        $data5=$result5->fetch(PDO::FETCH_OBJ);

                                        $sql4="select * from `product` where id=?";
                                        $result4=$connect->prepare($sql4);
                                        $result4->bindValue(1,$row3["id_product"]);
                                        $result4->execute();
                                        $rows4=$result4->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($rows4 as $row4) {
                                            $new_price =$row4["price"]-$row4["discount"];
                                            $solo_product =$new_price * $row3["count"];;
                                            $solo_product_old =$row4["price"] * $row3["count"];;
                                            echo '
                                    <div class="my-order">
                                        <div class="right-order">
                                            <img src="admin/product/'.$row4["images"].'" alt="">
                                        </div>
                                        <div class="left-order">
                                            <div class="title-order">'.$row3["count"].' عدد '.$row4["name"].'</div>
                                            <div class="color-order">
                                                    <div class="product_color_switch" id="color-order-info">
                                                        <span data-color='.$row3["color"].' class="active" id="self-color"></span>
                                                        ';
                                            switch ($row3["color"]) {
                                                case '#333333';
                                                    echo '<span>مشکی</span>';
                                                    break;
                                            }
                                            switch ($row3["color"]) {
                                                case '#ffffff';
                                                    echo '<span>سفید</span>';
                                                    break;
                                            }
                                            switch ($row3["color"]) {
                                                case '#bab100';
                                                    echo '<span>طلایی</span>';
                                                    break;
                                            }
                                            switch ($row3["color"]) {
                                                case '#a33c00';
                                                    echo '<span>قهوه ای</span>';
                                                    break;
                                            }
                                            switch ($row3["color"]) {
                                                case '#ffd257';
                                                    echo '<span>کرم</span>';
                                                    break;
                                            }
                                            switch ($row3["color"]) {
                                                case '#dbdbdb';
                                                    echo '<span>استخوانی</span>';
                                                    break;
                                            }
                                            echo '
                                                    </div>
                                            </div>
                                            <div class="warranty-order"> <i class="fas fa-certificate"></i> گارانتی اصالت و سلامت فیزیکی کالا</div>
                                            <div class="order-price"><del class="order-last-price">'.number_format($solo_product_old).' تومان</del>'.number_format($solo_product).' تومان </div>
                                            ';
                                            if ($data5->state_admin == 1){
                                                echo '<div class="order-state">ارسال شد</div>';
                                            }else{
                                                echo '<div class="order-state">درحال ارسال ...</div>';
                                            }
                                            echo '
                                            
                                            <div class="order-follow-code">
                                               <span>کد رهگیری   : <b id="code-follow-order"> '.$data5->Code_Follow.' </b></span>
                                                <br>
                                                <span>کد پیگیری محصوله پستی : <b id="code-follow-order"> 432432432 </b></span>
                                                <br>
                                                <span>جهت اطلاع از چگونگی پیگیری <b><a href="Follow_Product.php">اینجا</a></b> کنید .</span>
                                            </div>
                                        </div>
                                    </div>                                        
                                        ';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- order-success -->
                            <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card mb-3 mb-lg-0">
                                            <div class="card-header">
                                                <h3>آدرس قبض</h3>
                                            </div>
                                            <div class="card-body">
                                                <address>واحد #15<br>طبقه #1<br>ساختمان #C <br>کوچه <br> خیابان <br>1212</address>
                                                <p>تهران</p>
                                                <a href="#" class="btn btn-fill-out">ویرایش</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>آدرس ارسالی</h3>
                                            </div>
                                            <div class="card-body">
                                                <address>واحد #15<br>طبقه #1<br>ساختمان #C <br>کوچه <br> خیابان <br>1212</address>
                                                <p>تهران</p>
                                                <a href="#" class="btn btn-fill-out">ویرایش</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $sql="select * from `users` where email = ?";
                            $result=$connect->prepare($sql);
                            $result->bindValue(1,$_SESSION["email_Login"]);
                            $result->execute();
                            $data=$result->fetch(PDO::FETCH_OBJ);
                            ?>
                            <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>جزئیات حساب</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>قبلاً حساب دارید؟ <a href="#">وارد شوید!</a></p>
                                        <form method="post" name="enq">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>نام <span class="required">*</span></label>
                                                    <input value="<?php echo $data->fname?>" class="form-control" name="name" type="text">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>نام خانوادگی <span class="required">*</span></label>
                                                    <input value="<?php echo $data->lname?>" class="form-control" name="phone">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>آدرس ایمیل <span class="required">*</span></label>
                                                    <input value="<?php echo $data->email?>" class="form-control" name="email" type="email">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>کلمه عبور فعلی <span class="required">*</span></label>
                                                    <input value="" class="form-control" name="password" type="password">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>کلمه عبور جدید <span class="required">*</span></label>
                                                    <input value="" class="form-control" name="npassword" type="password">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>تأیید کلمه عبور جدید <span class="required">*</span></label>
                                                    <input value="" class="form-control" name="cpassword" type="password">
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">ذخیره</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
<?php
include "footer-UserPanel.php";
}
else{
    header("location: login.php");
    die();
}
?>
