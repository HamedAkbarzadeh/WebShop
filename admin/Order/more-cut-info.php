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

    foreach ($rows2 as $row2) {
        $id_basket = $row2["id"];
    }

    $sql4 = "select * from `cut_order` where `id_basket` = ?";
    $result4 = $connect->prepare($sql4);
    $result4->bindValue(1, $id_basket);
    $result4->execute();
    $count4 = $result4->rowCount();
    ?>
    <div id="jadval">

<!--        <div class="group_header_admin">-->
<!--            <div class="heading_s1">-->
<!--            </div>-->
<!--            <div class="back new_style_for_header_admin"><a href="details-order-form.php"><i class="fas fa-arrow-circle-left"></i></a></div>-->
<!--        </div>-->
        <?php
        if ($count4) {
            ?>
            <h1 class="h1-style2">اندازه های برش کاری</h1>
            <table class="table table-hover table-bordered">
                <tr class="tbl_tr">
                    <th>*</th>
                    <th>تعداد</th>
                    <th>عرض</th>
                    <th>طول</th>
                    <th>فارسی (عرض)</th>
                    <th>فارسی(طول)</th>
                    <th>نوار (عرض)</th>
                    <th>نوار (طول)</th>
                </tr>

                <?php

                $sql2 = "SELECT * FROM `cut_order` where `id_basket` = ?";
                $result2 = $connect->prepare($sql2);
                $result2->bindValue(1, $id_basket);
                $i = 0;
                if ($result2->execute()) {
                    $rows2 = $result2->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows2 as $row2) {
                        $i++;
                        echo '
                                <tr dir="ltr" align="right">
                                    <td class="number-cut">' . $i . '</td>
                                    <td>' . $row2["count"] . '</td>
                                    <td>' . $row2["width"] . ' cm</td>
                                    <td>' . $row2["height"] . ' cm</td>
                                    <td>' . $row2["fa_width"] . ' cm</td>
                                    <td>' . $row2["fa_height"] . ' cm</td>
                                    <td>' . $row2["na_width"] . ' cm</td>
                                    <td>' . $row2["na_height"] . ' cm</td>
                                    </tr>
                                            ';
                    }
                }
                ?>

            </table>
            <?php
        } else {
            echo '';
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