<?php
session_start();
if (isset($_SESSION["admin_Login"])){?>
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

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>اضافه کردن دسته </h3>
                            </div>

                            <div>
                                <div class="label-group">
                                    <label for="file-product"> نام دسته : </label>
                                    <label for="file-product" class="mini_label">اسم ای که برای دسته خود میخواهید را وارد کنید .</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="name" id="name" placeholder="نام دسته">
                                </div>
                                <div class="label-group">
                                    <label for="file-product">  زیر شاخه : </label>
                                    <label for="file-product" class="mini_label">عضو کدام دسته بشود ؟</label>
                                </div>
                                <div class="form-group">
                                    <select id="cat" class="select_class form-control">
                                        <option value="0"> ندارد</option>
                                        <?php
                                        include '../connect.php';
                                        $sql="select * from `cat`";
                                        $result=$connect->query($sql);
                                        $rows=$result->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows as $row){
                                            if ($row["subcat"]==0){
                                                echo '<option  value='.$row["id"].'> '.$row["name"].' </option>';
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="button" id="btn_add_cat" class="btn btn-fill-out btn-block btn_cat" name="register">ثبت نام</button>
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
    header("location: ../../404.php");
    die();
}