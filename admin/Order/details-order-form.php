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

    $sql = "SELECT * FROM `order_user` where id = ?";
    $result = $connect->prepare($sql);
    $result->bindValue(1, $_POST["id"]);
    $result->execute();
    $data = $result->fetch(PDO::FETCH_OBJ);

    $sql0 = "SELECT * FROM `province` where id =?";
    $result0 = $connect->prepare($sql0);
    $result0->bindValue(1, $data->province);
    $result0->execute();
    $data0 = $result0->fetch(PDO::FETCH_OBJ);

    $sql10 = "SELECT * FROM `city` where id =?";
    $result10 = $connect->prepare($sql10);
    $result10->bindValue(1, $data->city);
    $result10->execute();
    $data10 = $result10->fetch(PDO::FETCH_OBJ);

    $sql2 = "select * from `basket` where `code` = ?";
    $result2 = $connect->prepare($sql2);
    $result2->bindValue(1, $data->Code_Follow);
    $result2->execute();
    $rows2 = $result2->fetchAll(PDO::FETCH_ASSOC);


    ?>
    <br>
    <div id="jadval">
        <table class="table table-hover table-bordered">
            <tr>
                <td class="tbl_tr">نام و نام خانوادگی</td>
                <td class="lbl"><?php echo $data->fname . ' ' . $data->lname ?></td>
            </tr>
            <tr>
                <td class="tbl_tr">شماره تماس</td>
                <td class="lbl"><?php echo $data->phone ?></td>
            </tr>
            <tr>
                <td class="tbl_tr">ایمیل</td>
                <td class="lbl"><?php echo $data->email ?></td>
            </tr>
            <tr>
                <td class="tbl_tr">کد پیگری سفارش</td>
                <td class="lbl"><?php echo $data->Code_Follow ?></td>
            </tr>
            <tr>
                <td class="tbl_tr">کد پستی</td>
                <td class="lbl"><?php echo $data->code_post ?></td>
            </tr>
            <tr>
                <td class="tbl_tr">استان / شهر</td>
                <td class="lbl"><?php echo $data0->name . ' / ' . $data10->name ?></td>
            </tr>
            <tr>
                <td class="tbl_tr">آدرس</td>
                <td class="lbl"><?php echo $data->address ?></td>
            </tr>
            <tr>
                <td class="tbl_tr">نام شرکت</td>

                <?php
                if ($data->cname == null) {
                    echo '<td class="tbl_tr_second">ندارد</td>';
                } else {
                    echo '<td class="lbl">' . $data->cname . ' </td>';
                }
                ?>
            </tr>
            <tr>
                <td class="tbl_tr">توضیحات اضافی</td>
                <?php
                if ($data->comment == null) {
                    echo '<td class="tbl_tr_second">ندارد</td>';
                } else {
                    echo '<td class="lbl">' . $data->comment . ' </td>';
                }
                ?>
            </tr>
        </table>
        <input type="hidden" id="code_follow" value="<?php echo $data->Code_Follow ?>">
        <table class="table table-hover table-bordered">
            <tr class="tbl_tr">
                <td>#</td>
                <td>نام محصول</td>
                <td>تعداد محصول</td>
                <td>رنگ</td>
                <td>قیمت</td>
                <td>تخفیف</td>
                <?php
                foreach ($rows2 as $row2_new) {
                    $id_basket = $row2_new["id"];
                    if ($row2_new["images_cnc"] !== null || $row2_new["comment_cnc"] !== null) {
                        echo '<td>cnc</td>';
                    } else {
                        echo '';
                    }
                }

                $sql4 = "select * from `cut_order` where `id_basket` = ?";
                $result4 = $connect->prepare($sql4);
                $result4->bindValue(1, $id_basket);
                $result4->execute();
                $count4 = $result4->rowCount();

                if ($count4) {
                    echo '<td>برش کاری</td>';
                } else {
                    echo '';
                }
                ?>
                <td>قیمت کل</td>
            </tr>
            <?php
            $i = 1;
            $All_price_product = 0;
            foreach ($rows2 as $row2) {

                $sql3 = "select * from `product` where id = ?";
                $result3 = $connect->prepare($sql3);
                $result3->bindValue(1, $row2["id_product"]);
                $result3->execute();
                $data3 = $result3->fetch(PDO::FETCH_OBJ);

                $new_price = ($data3->price) - ($data3->discount);
                $solo_product = $new_price * $row2["count"];
                $All_price_product += $new_price * $row2["count"];

                echo '
             <tr class="border-warning">
             <td>' . $i . '</td>
             <td>' . $data3->name . '</td>
             <td>' . $row2["count"] . '</td>
             ';
                switch ($row2["color"]) {
                    case '#333333';
                        echo '<td>مشکی</td>';
                        break;
                }
                switch ($row2["color"]) {
                    case '#ffffff';
                        echo '<td>سفید</td>';
                        break;
                }
                switch ($row2["color"]) {
                    case '#bab100';
                        echo '<td>طلایی</td>';
                        break;
                }
                switch ($row2["color"]) {
                    case '#a33c00';
                        echo '<td>قهوه ای</td>';
                        break;
                }
                switch ($row2["color"]) {
                    case '#ffd257';
                        echo '<td>کرم</td>';
                        break;
                }
                switch ($row2["color"]) {
                    case '#dbdbdb';
                        echo '<td>استخوانی</td>';
                        break;
                }
                echo '
             <td>' . number_format($data3->price) . ' تومان</td>
             <td>' . number_format($data3->discount) . ' تومان</td>
             ';

                $id_basket = $row2["id"];
                if ($row2["images_cnc"] !== null || $row2["comment_cnc"] !== null) {
                    echo '<td><a href="#" class="more-cnc-info" id='.$row2["id"].'">نمایش بیشتر</a></td>';
                } else {
                    echo '';
                }


                if ($count4) {
                    echo '<td><a href="#" class="more-cut-info" id='.$row2["id"].'>نمایش لیست برش</a></td>';
                } else {
                    echo '';
                }
                echo '
            
             
             <td class="text_blue">' . number_format($solo_product) . ' تومان</td>
             </tr>

             
            ';
                $i++;


            }
            echo '
<tr>
             <td class="lbl" colspan="9">قیمت کل : ' . number_format($All_price_product) . ' تومان</td>
</tr>
';

            ?>

        </table>

    </div>
    </body>
    </html>

    <?php
} else {
    header("location: ../../404.php");
    die();
}