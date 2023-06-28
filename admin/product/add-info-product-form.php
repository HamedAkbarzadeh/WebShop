<html>
<?php
session_start();
if (isset($_SESSION["admin_Login"])){


$_SESSION["id_product"] = $_POST["id"];
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../../assets/js/admin/jquery.js"></script>
    <script src="../../assets/js/admin/Admin-All.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>
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
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>اضافه اطلاعات اضافی محصول</h3>
                        </div>
                        <table class="table table-hover table-bordered">
                            <tr class="tbl_tr">
                                <td>#</td>
                                <td>نام محصول</td>
                                <td>قیمت محصول با تخفیف</td>
                                <td>توضیحات مختصر محصول</td>
                                <td>عکس محصول</td>
                                <td>تاریخ ثبت محصول</td>
                            </tr>
                            <?php
                            include "../connect.php";

                            $i=1;
                            $sql0="select * from `product` where id = ?";
                            $result0=$connect->prepare($sql0);
                            $result0->bindValue(1,$_POST["id"]);
                            $result0->execute();
                            $rows0=$result0->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows0 as $row0)
                            {
                                $Last_Price=$row0["price"]-$row0["discount"];
                                echo '
                            <tr class="border-warning">
                            <td>'.$i.'</td>
                            <td>'.$row0["name"].'</td>
                            <td>'.number_format($Last_Price).' <span class="tmn_price">هزار تومان</span> </td>
                            <td>'.$row0["explanation_mini"].'</td>
                            <td class="td_img"><img src='.$row0["images"].' class="delete_img_product" alt=""></td>
                            <td>'.$row0["date"].'</td>
                            </tr>
            ';
                                $i++;
                            }

                            ?>
                        </table>
                            <div class="form-group">
                                <div class="label-group">
                                    <label for="Explanation-product">توضیحات اضافی محصول : </label>
                                    <label for="Explanation-product" class="mini_label"> باید <b>ویژیگی های محصول خود را اضافه کنید</b> . در <b>کادر سمت راست عنوان و در کادر چپ جواب .</b> <br>  <b>بعد از نوشتن هر کدوم دکمه تایید را بزنید و باز هم اضافه کنید</b> و به تعداد نا محدود میشه اضافه کرد .</label>
                                </div>

                                <div class="div_information">
                                    <div class="two_div_information">
                                        <label for="question" class="lbl">عنوان</label>
                                        <input type="text" name="question" id="question" class="right_inf" placeholder="جنس محصول : " />
                                    </div>

                                    <div class="two_div_information">
                                        <label for="answer" class="lbl">جواب</label>
                                        <input type="text" name="answer" id="answer" class="left_inf" placeholder="ام دی اف" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="button" id="btn-info-product" class="btn btn-fill-out btn-block btn_login" name="btn-product"> ثبت محصول </button>
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

