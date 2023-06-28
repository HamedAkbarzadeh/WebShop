<?php
session_start();
if (isset($_SESSION["email_Login"])) {
    include 'connect.php';

    $sql0 = "select * from `basket` where id = ? and `user` = ? and `state` = 0";
    $result0 = $connect->prepare($sql0);
    $result0->bindValue(1, $_SESSION["id_basket"]);
    $result0->bindValue(2, $_SESSION["email_Login"]);
    $result0->execute();
    $data0=$result0->fetch(PDO::FETCH_OBJ);
    if ($_SESSION["id_basket"] ==$data0->id){


    session_write_close();
    include 'header-UserPanel.php';

    ?>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/btn_java.js"></script>


    <div class="all-body-order">
        <div class="right-menu-order">
            <div class="widget">
                <h5 class="widget_title">نیاز به :</h5>
                <ul class="list_brand">
                    <!-- <li>-->
                    <!-- <div class="custome-checkbox">-->
                    <!-- <input class="form-check-input" type="checkbox" name="checkbox" checked id="Arrivals" value="">-->
                    <!-- <label class="form-check-label" for="Arrivals"><span>درخواست cnc کاری ندارم </span></label>-->
                    <!-- /div>-->
                    <!-- /li>-->
                    <li>
                        <div class="custome-checkbox">
                            <input class="form-check-input" type="checkbox" name="checkbox" id="Lighting" value="">
                            <label class="form-check-label" for="Lighting"><span>در خواست cnc کاری</span></label>
                        </div>
                    </li>
                    <li>
                        <div class="custome-checkbox">
                            <input class="form-check-input" type="checkbox" name="checkbox" id="Tables" value="">
                            <label class="form-check-label" for="Tables"><span>درخواست برش کاری</span></label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="left-menu-order">
            <form action="basket/add-to-basket-all-order.php" method="post" enctype="multipart/form-data">
                <div class="content-order">
                    <h1>کالا مورد نظر شما </h1>
                    <div class="info-order">
                        <?php
                        $sql = "select * from `basket` where id = ? and `user` = ? and `state` = 0";
                        $result = $connect->prepare($sql);
                        $result->bindValue(1, $_SESSION["id_basket"]);
                        $result->bindValue(2, $_SESSION["email_Login"]);
                        $result->execute();
                        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($rows as $row) {
                            $sql1 = "select * from `product` where `id` = ?";
                            $result1 = $connect->prepare($sql1);
                            $result1->bindValue(1, $row["id_product"]);
                            $result1->execute();
                            $data1 = $result1->fetch(PDO::FETCH_OBJ);

                            $last_price = $data1->price - $data1->discount;

                            $r_code = $row["r_code"];
                            echo '
<input type="hidden" id="r_code" value="'.$row["r_code"].'">
                                                <div class="right-order">
                            <img src="admin/product/' . $data1->images . ' ">

                        </div>
                        <!--- left --->
                        <div class="left-order">
                            <div class="name-info-order">
                                <span class="count-order"> ' . $row["count"] . ' عدد</span><span
                                        class="name-info-order-span"> ' . $data1->name . '</span>
                            </div>
                            <div class="color-order">
                                <div class="product_color_switch" id="color-order-info">
                                    
                        ';

                            switch ($row["color"]) {
                                case '#333333';
                                    echo '<span data-color="#333333" class="active" id="self-color"></span><span>مشکی </span >';
                                    break;
                            }
                            switch ($row["color"]) {
                                case '#ffffff';
                                    echo '<span data-color="#ffffff" class="active" id="self-color"></span><span>سفید </span >';
                                    break;
                            }
                            switch ($row["color"]) {
                                case '#bab100';
                                    echo '<span data-color="#bab100" class="active" id="self-color"></span><span>طلایی </span >';

                                    break;
                            }
                            switch ($row["color"]) {
                                case '#a33c00';
                                    echo '<span data-color="#a33c00" class="active" id="self-color"></span><span>قهوه ای </span >';

                                    break;
                            }
                            switch ($row["color"]) {
                                case '#ffd257';
                                    echo '<span data-color="#ffd257" class="active" id="self-color"></span><span> کرم </span >';

                                    break;
                            }
                            switch ($row["color"]) {
                                case '#dbdbdb';
                                    echo '<span data-color="#dbdbdb" class="active" id="self-color"></span><span> استخوانی </span >';

                                    break;
                            }

                            echo '
                            </div>
            </div>
            <div class="warranty-order"><i class="fas fa-certificate"></i> گارانتی اصالت و سلامت فیزیکی
                کالا
            </div>
            <div class="order-price">
                <del class="order-last-price"> ' . number_format($data1->price) . '  تومان</del>
               ' . number_format($last_price) . '  تومان
            </div>
        </div>
            ';

                        }
                        ?>
                    </div>
                </div>

                <!------>
                <div class="cnc-order-collection">
                    <div class="form-group">
                        <div class="label-group">
                            <label class="lbl_green" for="comment_cnc">لطفا اطلاعات دقیق اندازه و شکل و را
                                وارد کنید .<br> در صورت نیاز نمونه عکس بار گذاری کنید .</label>
                        </div>
                        <textarea type="text" class="form-control" id="comment_cnc" name="comment_cnc"
                                  placeholder=" توضیحات : "></textarea>

                        <br>
<!--                        <form action="#">-->
                            <div class="input-file-container">
                                <input class="input-file" id="my-file" name="my_file" type="file">
                                <label tabindex="0" for="my-file" class="input-file-trigger">انتخاب عکس ...</label>
                            </div>
                            <p class="file-return"></p>
<!--                        </form>-->
                    </div>
                </div>

                <div class="cut-order-collection">
                    <section class="section-cut-table">
                        <!--for demo wrap-->
                        <h1 class="h1-style">اندازه های برش کاری را وارد کنید</h1>
                        <div class="tbl-header">
                            <table class="cut-table-order" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                <tr>
                                    <th>تعداد</th>
                                    <th>عرض</th>
                                    <th>طول</th>
                                    <th>فارسی (عرض)</th>
                                    <th>فارسی(طول)</th>
                                    <th>نوار (عرض)</th>
                                    <th>نوار (طول)</th>
                                    <th>ثبت و حذف</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tbl-content">
                            <table class="cut-table-order" cellpadding="0" cellspacing="0" border="0">
                                <tbody id="tbody-append">
                                <tr class="tr-recorde-cut">
                                    <td><input type="number" class="form-control" name="count" id="count"
                                               placeholder="" min="1">
                                    </td>
                                    <td><input type="number" class="form-control" name="width" id="width"
                                               placeholder=""
                                               min="1">
                                    </td>
                                    <td><input type="number" class="form-control" name="height" id="height"
                                               placeholder=""
                                               min="1">
                                    </td>
                                    <td><input type="number" class="form-control" name="fa_width" id="fa_width"
                                               placeholder=""
                                               min="1"></td>
                                    <td><input type="number" class="form-control" name="fa_height" id="fa_height"
                                               placeholder=""
                                               min="1"></td>
                                    <td><input type="number" class="form-control" name="na_width" id="na_width"
                                               placeholder=""
                                               min="1"></td>
                                    <td><input type="number" class="form-control" name="na_height" id="na_height"
                                               placeholder=""
                                               min="1"></td>
                                    <td class="delete_td_order">
                                        <a id="check-order-btn"><i class="fas fa-check big-font ml-2"></i></a>

                                        <a class="a-link-order">
                                            <i class="fas fa-times big-font lbl_red"></i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                    </section>
                    <!---- inserted ---->
                    <br>
                    <br>
                    <section class="section-cut-table">
                        <!--for demo wrap-->
                        <h1 class="h1-style2">اندازه های که وارد کردید</h1>
                        <div class="tbl-header2">
                            <table class="cut-table-order" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                <tr>
                                    <th>*</th>
                                    <th>تعداد</th>
                                    <th>عرض</th>
                                    <th>طول</th>
                                    <th>فارسی (عرض)</th>
                                    <th>فارسی(طول)</th>
                                    <th>نوار (عرض)</th>
                                    <th>نوار (طول)</th>
                                </tr>
                                <input type="hidden" id="r_code" name="r_code" value="<?php echo $r_code?>">
                                </thead>
                            </table>
                        </div>
                        <div class="tbl-content2">
                            <table class="cut-table-order" cellpadding="0" cellspacing="0" border="0">
                                <tbody id="tbody-append-answer">
                                    <?php

                                    $sql2 = "SELECT * FROM `cut_order` where `user` = ? and `id_basket` = ? and `r_code`= ?";
                                    $result2 = $connect->prepare($sql2);
                                    $result2->bindValue(1, $_SESSION["email_Login"]);
                                    $result2->bindValue(2, $_SESSION["id_basket"]);
                                    $result2->bindValue(3, $r_code);
                                    $i=0;
                                    if ($result2->execute()) {
                                        $rows2 = $result2->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows2 as $row2) {
                                            $i++;
                                            echo '
                                <tr class="tr-recorde-cut" dir="ltr">
                                    <td class="number-cut">'.$i.'</td>
                                    <td>'.$row2["count"].'</td>
                                    <td>'.$row2["width"].' cm</td>
                                    <td>'.$row2["height"].' cm</td>
                                    <td>'.$row2["fa_width"].' cm</td>
                                    <td>'.$row2["fa_height"].' cm</td>
                                    <td>'.$row2["na_width"].' cm</td>
                                    <td>'.$row2["na_height"].' cm</td>
                                    </tr>
                                            ';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>

                <button id="btn-submit-order" type="submit"" class="add-order-to-basket btn btn-fill-out">
                <i class="icon-basket-loaded"></i>
                ادامه فرایند خرید
                </button>
            </form>

        </div>
    </div>
    <!--- rigt --->

    <?php
    include 'footer-UserPanel.php';
    }else{
        header("location: index.php");
        die();
    }
} else {
    header("location: 404.php");
    die();
}
?>