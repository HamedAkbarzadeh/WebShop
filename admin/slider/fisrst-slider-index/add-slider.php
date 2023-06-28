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
    <script src="../../../assets/js/admin/jquery.js"></script>
    <script src="../../../assets/js/admin/Admin-All.js"></script>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../../../assets/css/rtl-style.css">
    <link rel="stylesheet" href="../../../assets/css/responsive.css">
    <link rel="stylesheet" href="../../../assets/css/admin/admin-All.css">
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
                            <h3>ثبت اطلاعات اسلایدر اول صفحه اصلی</h3>
                        </div>

                        <div>
                            <div class="label-group">
                                <label for="file-product"> نام اسلایدر یک : </label>
                                <label for="file-product" class="mini_label">اسمی که دوست دارید <b>سر تیتر</b> اسلایدر باشه رو وارد کنید .</label>
                            </div>
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="name-slider" id="name-slider" placeholder="نام اسلایدر">
                            </div>
                            <div class="label-group">
                                <label for="file-product">  محصولات کدوم شاخه را نمایش بدهد ؟  </label>
                                <label for="file-product" class="mini_label">
                                    لطفا شاخه ای را انتخاب کنید که <b>حداقل 6 محصول ثبت شده باشد</b> .
                                </label>
                            </div>
                            <div class="form-group">
                                <select id="select-slider" name="select-slider" class="select_class form-control">
                                    <?php
                                    include '../../connect.php';
                                    $sql="select * from `cat`";
                                    $result=$connect->query($sql);
                                    $rows=$result->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($rows as $row){
                                        if ($row["subcat"]==0){
                                        }else{
                                            echo '<option value='.$row["id"].'> '.$row["name"].' </option>';
                                        }
                                    }
                                    ?>
                                </select>

<br>
                                <div class="label-group">
                                    <label for="file-product"> اسلایدر در کجای صفحه اصلی قرار بگیرد ؟ </label>
                                    <label for="file-product" class="mini_label">
                                        در اینجا باید مشخص کنید که اسلایدر شما برای <b>کدام قسمت صفحه اصلی</b> باشد .
                                    </label>
                                </div>
                                <div class="form-group">
                                    <select id="state" name="state" class="select_class form-control">
                                        <?php
                                        $sql1="select * from `slider` where `state` = 1";
                                        $result1=$connect->query($sql1);
                                        $data1=$result1->fetch(PDO::FETCH_OBJ);
                                        /**/
                                        $sql2="select * from `slider` where `state` = 2";
                                        $result2=$connect->query($sql2);
                                        $data2=$result2->fetch(PDO::FETCH_OBJ);
                                        /**/
                                        $sql3="select * from `slider` where `state` =3";
                                        $result3=$connect->query($sql3);
                                        $data3=$result3->fetch(PDO::FETCH_OBJ);
                                        /**/
                                        $sql4="select * from `slider` where `state` = 4";
                                        $result4=$connect->query($sql4);
                                        $data4=$result4->fetch(PDO::FETCH_OBJ);

                                        if ($data1 == null){
                                            echo '<option value="1">اسلایدر اول (بالاترین اسلایدر)</option>';
                                        }else{echo '';}

                                        if ($data2 == null){
                                            echo '<option value="2">اسلایدر دوم</option>';
                                        }else{echo '';}

                                        if ($data3 == null){
                                            echo '<option value="3">اسلایدر سوم</option>';
                                        }else{echo '';}

                                        if ($data4 == null){
                                            echo '<option value="4">اسلایدر چهارم</option>';
                                        }else{echo '';}
                                        ?>




                                    </select>

                                </div>

                            </div>
                            <div class="form-group">
                                <button type="button" id="btn_add_first_slider_one" class="btn btn-fill-out btn-block btn_cat" name="register">ثبت نام</button>
                            </div>
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
    header("location: ../../../404.php");
    die();
}

