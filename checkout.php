<?php
session_start();
if (isset($_SESSION["email_Login"])){
    session_write_close();
include "header.php";
include "connect.php";
?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <?php
    if (isset($_GET["failed"])){
        echo '
<div class="new_validation msg_noti_minus d-flex">
     <div><i class="fas fa-times close-icon"></i></div>
    <span>لطفا دوباره تلاش کنید . (کادر ها را درست پر کنید)</span>
</div>
        ';
    }
    ?>
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>بررسی</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">خانه</a></li>
                    <li class="breadcrumb-item"><a href="#">صفحات</a></li>
                    <li class="breadcrumb-item active">بررسی</li>
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
<!--            <div class="col-lg-6">-->
<!--            	<div class="toggle_info">-->
<!--                	<span><i class="fas fa-user"></i>مشتری برگشتی؟ <a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">برای ورود اینجا کلیک کنید</a></span>-->
<!--                </div>-->
<!--                <div class="panel-collapse collapse login_form" id="loginform">-->
<!--                    <div class="panel-body">-->
<!--                    	<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>-->
<!--                    	<form method="post">-->
<!--                            <div class="form-group">-->
<!--                                <input type="text" class="form-control" name="email" placeholder="نام کاربری یا ایمیل">-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <input class="form-control" ="" type="password" name="password" placeholder="کلمه عبور">-->
<!--                            </div>-->
<!--                            <div class="login_footer form-group">-->
<!--                                <div class="chek-form">-->
<!--                                    <div class="custome-checkbox">-->
<!--                                        <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">-->
<!--                                        <label class="form-check-label" for="remember"><span>مرا به خاطر بسپار</span></label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <a href="#">رمز عبور را فراموش کرده اید؟</a>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <button type="submit" class="btn btn-fill-out btn-block" name="login">ورود</button>-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-6">-->
<!--            	<div class="toggle_info">-->
<!--            		<span><i class="fas fa-tag"></i>کوپن تخفیف دارید؟ <a href="#coupon" data-toggle="collapse" class="collapsed" aria-expanded="false">برای وارد کردن کد خود اینجا را کلیک کنید</a></span>-->
<!--                </div>-->
<!--                <div class="panel-collapse collapse coupon_form" id="coupon">-->
<!--                    <div class="panel-body">-->
<!--                    	<p>اگر کد کوپن دارید ، لطفاً آن را در اینجا وارد کنید.</p>-->
<!--                        <div class="coupon field_form input-group">-->
<!--                            <input type="text" value="" class="form-control" placeholder="شماره کوپن را وارد کنید...">-->
<!--                            <div class="input-group-append">-->
<!--                                <button class="btn btn-fill-out btn-sm" type="submit">کوپن</button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <div class="row">
            <div class="col-12">
            	<div class="medium_divider"></div>
            	<div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
            	<div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-6">
            	<div class="heading_s1">
            		<h4>جزئیات صورتحساب</h4>
                </div>

                <form action="basket/add-user-order.php" method="post" class="order_review">

                    <div class="form-group">
                     <div class="label-group">
                        <label class="lbl Important" for="fname">نام</label>
                     </div>
                        <input type="text" autofocus  class="form-control" name="fname" id="fname" placeholder="نام *">
                    </div>
                    <div class="form-group">
                    <div class="label-group">
                        <label class="lbl Important" for="lname">نام خانوادگی</label>
                     </div>
                        <input type="text"  class="form-control" name="lname"  id="lname" placeholder="نام خانوادگی *">
                    </div>
                    <div class="form-group">
                    <div class="label-group">
                        <label class="lbl" for="cname">نام شرکت</label>
                     </div>
                        <input class="form-control"  type="text" name="cname" id="cname" placeholder="نام شرکت">
                    </div>
                    <div class="form-group">
                    <div class="label-group">
                        <label class="lbl Important" for="billing_address">آدرس </label>
                     </div>
                        <input type="text" class="form-control" name="billing_address" id="billing_address" ="" placeholder="آدرس *">
                    </div>
                    <div class="form-group">
                        <div class="label-group">
                            <label class="lbl Important" for="code_post"> کد پستی</label>
                        </div>
                        <input class="form-control"  type="text" name="code_post" id="code_post" placeholder=" کد پستی *">
                    </div>
                    <div class="form-group">
                    <div class="label-group">
                        <label class="lbl Important" for="phone" > تلفن</label>
                     </div>
                        <input class="form-control keyDown_phone"  type="text" name="phone" id="phone" placeholder="تلفن *">
                    </div>
                    <div class="form-group">
                    <div class="label-group">
                        <label class="lbl Important" for="email"> ایمیل</label>
                     </div>
                        <input class="form-control"  type="email" name="email" id="email" placeholder="آدرس ایمیل *">
                    </div>
                    <div class="ship_detail">
                    <div>
                        <div class="heading_s1">
                        <h4>محاسبه هزینه ارسال</h4>
                    </div>
<!--                        <div class="custom_radio">-->
<!--                            <input type="radio" name="radio" id="in_city" checked>-->
<!--                            <label for="in_city">حمل به داخل شهر مشهد</label>-->
<!--                        </div>-->
<!--                        <div class="custom_radio">-->
<!--                            <input type="radio" name="radio" id="radio_out_city">-->
<!--                            <label for="radio_out_city">حمل به خارج از شهر مشهد</label>-->
<!--                        </div>-->
<!--                        <div id="out_of_city">-->
                            <div class="field_form shipping_calculator">
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <div class="custom_select">
                                            <select id="state" name="state">
                                                <option value="start" id="province_location" class="province_loc">استان را انتخاب کنید *</option>
                                                <?php
                                                $sql="select * from province";
                                                $result=$connect->query($sql);
                                                $rows=$result->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($rows as $row) {
                                                    echo '  <option value='.$row['id'].' class="province_loc" >'.$row['name'].'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <div class="custom_select">
                                            <select id="city" name="city">
                                                <option value="0" selected disabled id="city_location">شهر را انتخاب کنید *</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <button class="btn btn-fill-line" id="btn_update_checkout" type="button">به روزرسانی کل</button>
                                    </div>
                                </div>
                            </div>
<!--                        </div>-->
                    </div>
                    </div>
                    <div class="heading_s1">
                        <h4>اطلاعات اضافی</h4>
                    </div>
                    <div class="form-group mb-0">
                    <div class="label-group">
                        <label class="lbl" for="comment"> یادداشت</label>
                     </div>
                        <textarea rows="5" class="form-control" name="comment" id="comment" placeholder="یادداشت های سفارش"></textarea>
                    </div>
                    </div>
                    <div class="col-md-6">



                    <div class="heading_s1">
                        <h4>سفارشات شما</h4>
                    </div>
                    <div class="table-responsive order_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>محصول</th>
                                    <th>جمع</th>
                                    <th>تخفیف</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql1="select * from `basket` where `user` = ? and `state` = 0";
                            $result1=$connect->prepare($sql1);
                            $result1->bindValue(1,$_SESSION["email_Login"]);
                            $result1->execute();
                            $rows1=$result1->fetchAll(PDO::FETCH_ASSOC);
                            $new_price=0;
                            $All_Discount=0;
                            $All_Price_Last=0;
                            $solo_discount=0;
                            foreach ($rows1 as $row1) {
                                $sql2="select * from `product` where id = ?";
                                $result2=$connect->prepare($sql2);
                                $result2->bindValue(1,$row1["id_product"]);
                                $result2->execute();
                                $rows2=$result2->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows2 as $row2) {
                                    $new_price =$row2["price"]-$row2["discount"];
                                    $solo_product =$new_price * $row1["count"];;
                                    $solo_product_old =$row2["price"] * $row1["count"];;
                                    $All_Price_Last +=$solo_product;

                                    $solo_discount=$row2["discount"] * $row1["count"];
                                    $All_Discount += $row2["discount"] * $row1["count"];
                                    echo '
                                <tr>
                                    <td>'.$row2["name"].' <span class="product-qty">x '.$row1["count"].'</span>
                                    <br>
                                    <span>
                                    رنگ : 
                                    ';
                                    switch ($row1["color"]) {
                                        case '#333333';
                                            echo '<span>مشکی</span>';
                                            break;
                                    }
                                    switch ($row1["color"]) {
                                        case '#ffffff';
                                            echo '<span>سفید</span>';
                                            break;
                                    }
                                    switch ($row1["color"]) {
                                        case '#bab100';
                                            echo '<span>طلایی</span>';
                                            break;
                                    }
                                    switch ($row1["color"]) {
                                        case '#a33c00';
                                            echo '<span>قهوه ای</span>';
                                            break;
                                    }
                                    switch ($row1["color"]) {
                                        case '#ffd257';
                                            echo '<span>کرم</span>';
                                            break;
                                    }
                                    switch ($row1["color"]) {
                                        case '#dbdbdb';
                                            echo '<span>استخوانی</span>';
                                            break;
                                    }
                                    echo '
                                    </span>
                                    <span>
                                    
</span>
                                    </td>
                                    <td>  '.number_format($solo_product_old).' تومان </td>
                                    <td class="discount_price">'.number_format($solo_discount).' تومان</td>
                                </tr>
                                    ';
                                }
                            }
                            ?>

                            </tbody>
                            <tfoot>
<!--                            <tr>-->
<!--                                <th>جمع</th>-->
<!--                                <td class="product-subtotal">--><?php //echo number_format($All_Price)?><!-- تومان</td>-->
<!--                            </tr>-->
                            <tr>
                                <th> کل تخفیف</th>
                                <td> <?php echo number_format($All_Discount)?> تومان</td>
                            </tr>
                            <tr>
                                <th>جمع کل با میزان تخفیف</th>
                                <td> <b><?php echo number_format($All_Price_Last)?></b> تومان</td>
                                <input id="New_price" type="hidden" value="<?php echo $All_Price_Last?>">
                            </tr>
                                <tr>
                                    <th>هزینه ارسال</th>
                                    <td id="price_post">هنوز انتخاب نشده</td>
                                </tr>
                                <tr>
                                    <th> قیمت نهایی</th>
                                    <td class="product-subtotal">نوع ارسال را انتخاب کنید.</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php
                    $sql0="SELECT * FROM `location`";
                    $result0=$connect->query($sql0);
                    $data0=$result0->fetch(PDO::FETCH_OBJ);
                    ?>
                    <input type="hidden" id="hidden_in_city" value="<?php echo $data0->in_city ?>">
                    <input type="hidden" id="hidden_out_city" value="<?php echo $data0->out_city ?>">
                    <div class="payment_method">
                        <div class="heading_s1">
                            <h4>پرداخت</h4>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input" ="" type="radio" name="payment_option" id="exampleRadios3" value="option3" checked="">
                                <label class="form-check-label" for="exampleRadios3">پرداخت از طریق درگاه ذرین پال</label>
<!--                                <p data-method="option3" class="payment-text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است. </p>-->
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-fill-out btn-block" id="order_product"> پرداخت</button>
<!--                    <div class="lbl_normal">-->
<!--                        <br>-->
<!--                        <br>-->
<!--                        نکته : <br>-->
<!--                        اگر در خارج از شهر مشهد میخواهید محصول به دست شما برسد تیک <b>(حمل به خارج از شهر مشهد)</b>-->
<!--                        بزنید و استان و شهر خود را انتخاب کنید و در قسمت آدرس , آدرس را به صورت دقیق وارد کنید .-->
<!--                        <br>-->
<!--                        <br>-->
<!--                        اگر در داخل خود شهر مشهد هستید بر تیک <b>(حمل به داخل شهر مشهد)</b>-->
<!--                        بزنید و در قسمت آدرس , آدرس را به صورت دقیق وارد کنید .-->
<!--                    </div>-->
                </form>
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
<?php include "footer.php";
}else{
    header("location: 404.php");
    die();
}

?>