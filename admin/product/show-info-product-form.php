<?php
session_start();
if (isset($_SESSION["admin_Login"])){
include "../connect.php";
$_SESSION["id_delete_info"] = $_POST["id"];
?>
<html>

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

                        <div class="group_header_admin">
                            <div class="heading_s1">
                                <h3> اطلاعات اضافی محصول</h3>
                            </div>
                            <div class="back"><a href="delete-info-product.php"><i class="fas fa-arrow-circle-left"></i></a></div>
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
                        <table class="table table-bordered">
                            <?php
                            $sql="select * from `product` where `id`= ?";
                            $result=$connect->prepare($sql);
                            $result->bindValue(1,$_POST["id"]);
                            $result->execute();
                            $data=$result->fetch(PDO::FETCH_OBJ);

                            $sql1="SELECT * FROM `information` where `id_product`= ?";
                            $result1=$connect->prepare($sql1);
                            $result1->bindValue(1,$data->id);
                            $result1->execute();
                            $rows=$result1->fetchAll(PDO::FETCH_ASSOC);


                            foreach ($rows as $row){

                                echo '
                                    <tr>
                                        <td>'.$row["question"].'</td>
                                        <td>'.$row["answer"].'</td>
                                    </tr>
                                        ';

                            }
                            ?>

                            <div class="empty_td"> اگر قصد دارید اطلاعاتی اضافه کنید روی لینک پایین کلیک کنید .<br>
                                <a href="#" id='<?php echo $data->id ?>' class="a_post lbl">برای اضافه کردن رو این لینک کلیک کنید</a>
                            </div>
                            <br>
                        </table>
                        <div class="form-group">
                            <button type="button" class="btn-delete-info-product btn btn-fill-out btn-block btn_login"> حذف اطلاعات </button>
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