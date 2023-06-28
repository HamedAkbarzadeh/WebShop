<?php
session_start();
if (isset($_SESSION["admin_Login"])){
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link
            href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Josefin+Sans:300,400,600,700|Nunito:300,400,600,700"
            rel="stylesheet">

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
    if (isset($_GET["success"])){
        echo '
            <div class="new_validation msg_noti_plus d-flex">
        <div><i class="fas fa-times close-icon"></i></div>
    <span>محصول شما با موفقیت ثبت شد .</span>
</div>
        ';
    }

    if (isset($_GET["failed"])){
        echo '<div class="new_validation msg_noti_minus d-flex">
        <div><i class="fas fa-times close-icon"></i></div>
    <span>پسوند یا حجم مغایرت میکند .</span>
</div>
';
    }

    ?>
    <div class="container">
        <a href="#" id="top_add_product"></a>   
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>اضافه محصول جدید</h3>
                        </div>
                        <form action="add-product-check.php" method="post" id="form_add_product" enctype="multipart/form-data" >
                            <div class="form-group">
                                <div class="label-group">
                                    <label for="name-product">نام محصول</label>
                                    <label for="name-product" class="mini_label">نام محصول خود را به طور <b>کوتاه</b> وارد کنید .</label>
                                </div>
                                <input type="text"  class="form-control" name="name-product" id="name-product" placeholder="نام محصول">
                            </div>
                            <div class="form-group">
                                <div class="label-group">
                                    <label for="price-product">قیمت محصول :</label>
                                    <label for="price-product" class="mini_label">قیمت محصولی که میخواهید وارد کنید به <b>تومان</b> وارد شود.</label>
                                </div>
                                <input type="text"  class="form-control" name="price-product" id="price-product" placeholder="قیمت محصول">
                            </div>
                            <div class="form-group">
                                <div class="label-group">
                                    <label for="Discount-product">تخفیف :</label>
                                    <label for="Discount-product" class="mini_label">میزان تخفیفی که میخواهید داشته باشد این محصول به <b>تومان</b> وارد کنید .</label>
                                </div>
                                <input type="text"  class="form-control" name="Discount-product" id="Discount-product" placeholder="تخفیف">
                            </div>
                            <div class="form-group">
                                <div class="label-group">
                                    <label for="count">تعداد محصول :</label>
                                    <label for="count" class="mini_label"><b>تعداد محصولی که از همین محصول هم اکنون در انبار موجود است</b> را وارد کنید .</label>
                                </div>
                                <input type="number"  class="form-control" name="count" id="count" placeholder="تعداد محصول">
                            </div>
                            <div class="form-group">
                                <div class="label-group">
                                    <label for="select-product">دسته : </label>
                                    <label for="select-product" class="mini_label"><b>عضو کدام</b> دسته بشود این محصول ؟</label>
                                </div>
                                <select name="select-product" id="select-product" class="select_class form-control">
                                    <?php
                                    include '../connect.php';
                                    $sql="select * from `cat`";
                                    $result=$connect->query($sql);
                                    $rows=$result->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($rows as $row){
                                        if ($row["subcat"] == 0){
                                        }else{
                                            echo '<option value='.$row["id"].'> '.$row["name"].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="label-group">
                                    <label for="Explanation-product">توضیحات مختصر محصول : </label>
                                    <label for="Explanation-product" class="mini_label">توضیحات درباره محصول تا <b>2 الی 4</b> جمله .</label>
                                </div>
                                <textarea class="form-control"  type="text" name="Explanation-mini-product" id="Explanation-mini-product" placeholder="توضیحات مختصر محصول :"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="label-group">
                                    <label for="Explanation-product">توضیحات کامل محصول : </label>
                                    <label for="Explanation-product" class="mini_label"> محصول خود را <b>به طور کامل</b> با کمک ادیتور با فونت مناسب بنویسید .</label>
                                </div>
                                <textarea class="form-control ckeditor" required="" type="text" name="editor1" id="Explanation-All-product" placeholder="توضیحات کامل محصول :"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="label-group">
                                    <label for="file-product">عکس کالا : </label>
                                    <label for="file-product" class="mini_label">حجم عکس باید  <b>کمتر از 2 مگابایت</b> باشد و باید <b>اندازه عکس 540w*600h</b> باشد , <b>فرمت</b>  عکس باید از نوع <b>jpeg یا jpg یا png</b> باشد .</label>
                                </div>
                                <input class="form-control" type="file" name="file_product" id="file_product" placeholder="عکس خود را انتخاب کنید .">
                            </div>
                            <div class="form-group">
                                <a><button type="submit" id="btn-product" class="btn btn-fill-out btn-block btn_login" name="btn-product"> ثبت محصول </button></a>
                            </div>
                        </form>
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