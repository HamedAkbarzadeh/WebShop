<?php
include '../connect.php';
session_start();
if (isset($_SESSION["admin_Login"])){

?>
<html>
<head>
    <script src="../../assets/js/admin/jquery.js"></script>
    <script src="../../assets/js/admin/update-cat.js"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../../assets/css/rtl-style.css">
    <link rel="stylesheet" href="../../assets/css/responsive.css">
    <link rel="stylesheet" href="../../assets/css/admin/admin-All.css"></head>
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
        <?php

        $sql="select * from `cat` where `id` = ?";
        $result=$connect->prepare($sql);
        $result->bindValue(1,$_POST["id"]);
        $result->execute();
        $data=$result->fetch(PDO::FETCH_OBJ);
        $_SESSION["id-cat"]=$_POST["id"];
        ?>

        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>بروز رسانی دسته </h3>
                        </div>
                        <div>
                            <label for="fname"> </label>
                            <div class="form-group">
                                <input value="<?php echo $data->name ?>"  type="text" required="" class="form-control" name="name" id="name" placeholder="نام دسته">
                            </div>
                            <div class="form-group">
                                <select id="cat" class="select_class form-control">
                                    <option value="0"> ندارد</option>
                                    <?php
                                    $sql2="select * from `cat`";
                                    $result2=$connect->query($sql2);
                                    $rows2=$result2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($rows2 as $row){
                                        if ($row["subcat"]==0){
                                            echo '<option  value='.$row["id"].'> '.$row["name"].' </option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="button" id="btn-update-cat" class="btn btn-fill-out btn-block" name="update">ثبت بروز رسانی </button>
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
