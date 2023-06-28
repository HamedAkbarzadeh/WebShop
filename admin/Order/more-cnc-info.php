<?php
session_start();
if (isset($_SESSION["admin_Login"])) {
    ?>

    <html>
    <head>

        <script src="../../assets/js/admin/jquery.js"></script>
        <script src="../../assets/js/admin/Admin-All.js"></script>
        <link rel="stylesheet" href="../../assets/css/admin/admin-All.css">
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/css/rtl-style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
              integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
              crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Josefin+Sans:300,400,600,700|Nunito:300,400,600,700"
              rel="stylesheet">


    </head>
    <body>
    <?php
    include "../connect.php";



    $sql2 = "select * from `basket` where `code` = ?";
    $result2 = $connect->prepare($sql2);
    $result2->bindValue(1, $_POST["code_follow"]);
    $result2->execute();
    $rows2 = $result2->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <div id="jadval">
        <?php
        foreach ($rows2 as $row2) {
            if ($row2["images_cnc"] !== null || $row2["comment_cnc"] !== null) {
                ?>
                <h1 class="h1-style2">توضیحات و عکس cnc</h1>
                <div class="cnc_want_div">

                    <br>
                    <div class="right_cnc">
                        <span class="tbl_tr_second">توضیحات : </span>
                        <?php echo $row2["comment_cnc"] ?>
                    </div>
                    <div class="left_cnc">
                        <?php
                        if ($row2["images_cnc"] !== 0) {
                            echo '<img src="../../basket/' . $row2["images_cnc"] . '" alt="">';
                        } else {
                            echo '<span class="tbl_tr_second">عکس ندارد</span>';
                        }
                        ?>
                    </div>
                </div>
                <?php
            } else {
                echo '';
            }
        }
        ?>


    </div>
    </body>
    </html>

    <?php
} else {
    header("location: ../../404.php");
    die();
}