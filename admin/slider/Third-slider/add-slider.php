<?php
session_start();
if (isset($_SESSION["admin_Login"])){
    include "../../connect.php";
?>

    <html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="Anil z" name="author">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../../../assets/js/admin/jquery.js"></script>
        <script src="../../../assets/js/admin/Admin-All.js"></script>
        <link rel="stylesheet" href="../../../assets/css/style.css">
        <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../../assets/css/rtl-style.css">
        <link rel="stylesheet" href="../../../assets/css/responsive.css">
        <link rel="stylesheet" href="../../../assets/css/admin/admin-All.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Josefin+Sans:300,400,600,700|Nunito:300,400,600,700" rel="stylesheet">
    </head>
    <?php
    if (isset($_GET["success"])){
        echo '
<div class="new_validation msg_noti_plus d-flex">
        <div><i class="fas fa-times close-icon"></i></div>
    <span>اطلاعات با موفقیت اضافه شد .</span>
</div>';
    }
    if (isset($_GET["failed"])){
        echo '
<div class="new_validation msg_noti_minus d-flex">
        <div><i class="fas fa-times close-icon"></i></div>
    <span>پسوند یا حجم مغایرت میکند .</span>
</div>';
    }
    ?>
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
                                <h3>ثبت اطلاعات مجموعه 2 اسلایدی صفحه اصلی</h3>
                            </div>
                            <div class="empty_td">
                                در اینجا تنها قادر به وارد کردن دو مجموعه هستید که کاربر با کلیک روی آنها وارد زیر شاخه های آن مجموعه میشود .
                            </div>
                            <br>

                            <form action="add-slider-check.php" method="post" id="form_add_slider_banner" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="label-group">
                                        <label for="mini_title" class="text_blue"> متن کوتاه : </label>
                                        <label for="mini_title" class="mini_label">متنی کوتاه در حد 3 الی 5 کلمه برای بالا ترین متن .</label>
                                    </div>
                                    <input type="text" class="form-control" name="mini_title" id="mini_title" placeholder="متن کوتاه">
                                </div>
                                <div class="form-group">
                                    <div class="label-group">
                                        <label for="mini_title" class="text_blue Important"> متن اصلی : </label>
                                        <label for="mini_title" class="mini_label">متن اصلی که در بنر سایت قرار میگیرد .</label>
                                    </div>
                                    <input type="text" class="form-control" name="txt_title" id="txt_title" placeholder="متن اصلی ">
                                </div>
                                <div class="form-group">
                                    <div class="label-group">
                                        <label for="mini_explanation" class="text_blue"> متن کوتاه : </label>
                                        <label for="mini_explanation" class="mini_label">متنی در حد 3 کلمه مثل میزان تخفیف برای همه این محصولات مثلا (40% تخفیف)</label>
                                    </div>
                                    <input type="text" class="form-control" name="mini_explanation" id="mini_explanation" placeholder="متن کوتاه">
                                </div>

                                <div class="form-group">
                                    <div class="label-group">
                                        <label for="mini_explanation" class="text_blue"> اسلاید را انتخاب کنید . </label>
                                        <label for="mini_explanation" class="mini_label">اسلاید را انتخاب کنید یعنی اولی (راستی) باشد یا دومی (چپی).</label>
                                    </div>
                                    <select id="slide_banner" name="slide_banner" class="form-control">
                                        <?php
                                        $sql1="select * from `slider_banner` where `number` = 1 and `which_slider` = 2";
                                        $result1=$connect->query($sql1);
                                        $data1=$result1->fetch(PDO::FETCH_OBJ);
                                        /**/
                                        $sql2="select * from `slider_banner` where `number` = 2 and `which_slider` = 2";
                                        $result2=$connect->query($sql2);
                                        $data2=$result2->fetch(PDO::FETCH_OBJ);
                                        /**/
                                        if ($data1 == null){
                                            echo '<option value="1">اسلاید اول </option>';
                                        }else{echo '';}

                                        if ($data2 == null){
                                            echo '<option value="2">اسلاید دوم</option>';
                                        }else{echo '';}

                                        ?>
                                    </select>
                                </div>
                                <!----->
                                <div class="form-group">
                                    <div class="label-group">
                                        <label for="cat_Collection" class="text_blue Important">کدام مجموعه را نشان دهد :</label>
                                        <label for="mini_explanation" class="mini_label">یکی از زیر شاخه ها را انتخاب کنید .</label>
                                    </div>
                                    <select id="cat_Collection" name="cat_Collection" class="select_class form-control">
                                        <?php
                                        $sql3="select * from `cat`";
                                        $result3=$connect->query($sql3);
                                        $rows3=$result3->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows3 as $row3){
                                            if ($row3["subcat"]==0){
                                            }else{
                                                echo '<option value='.$row3["id"].'> '.$row3["name"].' </option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="label-group">
                                        <label for="image_slide" class="text_blue Important"> عکس بنر خود : </label>
                                        <label for="image_slide" class="mini_label">عکس باید 350 * 635 باشد و باید فرمت آن png , jpg , jpeg باشد و حجم کمتر از 2 مگابایت باشد . و بهتر است که یک بگ گراند ملایم کم رنگ داشته باشد .</label>
                                    </div>
                                    <input type="file" class="form-control" name="image_slide" id="image_slide">
                                </div>
                                <?php
                                $sql="SELECT * FROM `slider_banner` where `which_slider` = 2";
                                $result=$connect->query($sql);
                                $count=$result->rowCount();

                                if ($count < 2){
                                    echo '     
                               <div class="form-group">
                                    <button type="submit" id="btn_add_slider_banner" class="btn btn-fill-out btn-block btn_cat" name="register">ثبت اطلاعات</button>
                                </div>';
                                }else{
                                    echo '<div class="empty_td">شما تنها قادر به اضافه کردن 2 اسلاید هستید . <br> اگر می خواهید جایگزین کنید ابتدا یک بنر را حذف کنید .</div>';
                                }
                                ?>

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
    header("location: ../../../404.php");
    die();
}

