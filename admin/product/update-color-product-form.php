<?php
session_start();
if (isset($_SESSION["admin_Login"])){

    include "../connect.php";
    ?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="Anil z" name="author">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../../assets/js/admin/jquery.js"></script>
        <script src="../../assets/js/admin/Admin-All.js"></script>
        <link rel="stylesheet" href="../../assets/css/style.css">
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../assets/css/rtl-style.css">
        <link rel="stylesheet" href="../../assets/css/responsive.css">
        <link rel="stylesheet" href="../../assets/css/admin/admin-All.css">
    </head>

    <body>
    <!-- START LOGIN SECTION -->
    <!-- Msg Box -->

    <div class="validation_input MSG_ALL_NOTI_MINUS">
        <span id="msg-m"></span>
        <div class="full_bottom_Border_validation"></div>
    </div>

    <div class="validation_input MSG_ALL_NOTI_PLUS">
        <span id="msg-p"></span>
        <div class="full_bottom_Border_validation"></div>
    </div>

    <!-- Msg Box -->
    <div class="login_register_wrap section">
        <?php
        $sql1="select * from `product` where id = ?";
        $result1=$connect->prepare($sql1);
        $result1->bindValue(1,$_POST["id"]);
        $result1->execute();
        $data1=$result1->fetch(PDO::FETCH_OBJ);
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 header_form">
                                <h3>ویرایش نمودن رنگ های <span class="empty_td"><?php echo $data1->name ?></span></h3>
                                <a href="update-color-product.php"><i class="fas fa-arrow-alt-circle-left"></i></a>
                            </div>
                                <table class="table table-hover table-bordered">
                                    <tr class="tbl_tr">
                                    <td colspan="6">رنگ های که قبلا ثبت شده برای <?php echo $data1->name ?></td>
                                    </tr>
                                    <tr>
                                        <?php
                                        $sql="select * from `color_product` where `id_product` = ?";
                                        $result=$connect->prepare($sql);
                                        $result->bindValue(1,$_POST["id"]);
                                        $result->execute();

                                        $data=$result->fetch(PDO::FETCH_OBJ);

                                        $black = $data->black ;
                                        $white = $data->white ;
                                        $gold =$data->gold ;
                                        $brown =$data->brown;
                                        $cream =$data->cream;
                                        $bony =$data->bony ;

                                        ?>
                                        <td><?php
                                            switch ($black){
                                                case "#333333";
                                                    echo 'مشکی';
                                                    break;
                                            } ?>
                                        </td>
                                        <td><?php
                                            switch ($white){
                                                case "#ffffff";
                                                    echo 'سفید';
                                                    break;
                                            } ?>
                                        </td>
                                        <td><?php
                                            switch ($gold){
                                                case "#bab100";
                                                    echo 'طلایی';
                                                    break;
                                            } ?>
                                        </td>
                                        <td><?php
                                            switch ($brown){
                                                case "#a33c00";
                                                    echo 'قهوه ای';
                                                    break;
                                            } ?>
                                        </td>
                                        <td><?php
                                            switch ($cream){
                                                case "#ffd257";
                                                    echo 'کرم';
                                                    break;
                                            } ?>
                                        </td>
                                        <td><?php
                                            switch ($bony){
                                                case "#dbdbdb";
                                                    echo 'استخوانی';
                                                    break;
                                            } ?>
                                        </td>
                                    </tr>
                                </table>

                            <div class="form-group">
                                <div class="label-group">
                                    <label for="count">رنگ های موجود :</label>
                                    <label for="count" class="mini_label">در اینجا هر رنگی که از محصول در انبار موجود دارید را انتخاب کنید .</label>
                                </div>
                                <div>
                                    <input id="checkbox-1" value="#333333" class="checkbox-custom" name="checkbox-1" type="checkbox" checked>
                                    <label for="checkbox-1" class="checkbox-custom-label"> مشکی</label>
                                </div>
                                <div>
                                    <input id="checkbox-2" value="#ffffff" class="checkbox-custom" name="checkbox-2" type="checkbox">
                                    <label for="checkbox-2" class="checkbox-custom-label"> سفید</label>
                                </div>
                                <div>
                                    <input id="checkbox-3" value="#bab100" class="checkbox-custom" name="checkbox-3" type="checkbox">
                                    <label for="checkbox-3" class="checkbox-custom-label"> طلایی</label>
                                </div>
                                <div>
                                    <input id="checkbox-4" value="#a33c00" class="checkbox-custom" name="checkbox-4" type="checkbox">
                                    <label for="checkbox-4" class="checkbox-custom-label"> قهوه ای</label>
                                </div>
                                <div>
                                    <input id="checkbox-5" value="#ffd257" class="checkbox-custom" name="checkbox-5" type="checkbox">
                                    <label for="checkbox-5" class="checkbox-custom-label">کرم </label>
                                </div>
                                <div>
                                    <input id="checkbox-6" value="#dbdbdb" class="checkbox-custom" name="checkbox-6" type="checkbox">
                                    <label for="checkbox-6" class="checkbox-custom-label"> استخوانی</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="button" data-id-product="<?php echo $_POST["id"] ?>" id="btn_update_color_product" class="btn btn-fill-out btn-block btn_cat">ثبت رنگ ها</button>
                            </div>
                            <div class="form-group a_color">
                                <a href="product-manager.php" id="back_to" class="btn_deluxe d-none">بازگشت به مدیریت محصولات</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->
    </body>
    </html>
    <?php
}else{
    header("location: ../../404.php");
    die();
}
