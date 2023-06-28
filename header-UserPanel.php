<?php
session_start();
include "connect.php";
?>
<!DOCTYPE html>
<php lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
    <meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

    <!-- SITE TITLE -->
    <title></title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/simple-line-icons.css">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="assets/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/css/owl.theme.css">
    <link rel="stylesheet" href="assets/owlcarousel/css/owl.theme.default.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- jquery-ui CSS -->
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- RTL CSS -->
    <link rel="stylesheet" href="assets/css/rtl-style.css">

</head>

<body dir="rtl">

<!-- LOADER -->

<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- END LOADER -->
<!-- Msg Box -->

<div class="validation_input MSG_ALL_NOTI_MINUS">
    <span id="msg-validation-m"></span>
    <div class="full_bottom_Border_validation"></div>
</div>

<div class="validation_input MSG_ALL_NOTI_PLUS">
    <span id="msg-validation-p"></span>
    <div class="full_bottom_Border_validation"></div>
</div>

<!-- Msg Box -->
<!-- START HEADER -->
<header class="header_wrap fixed-top header_with_topbar">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <?php
                        $sql0="SELECT * FROM `contact`";
                        $result0=$connect->query($sql0);
                        $data0=$result0->fetch(PDO::FETCH_OBJ);
                        ?>
                        <ul class="contact_detail text-center text-lg-left">
                            <li><i class="ti-mobile"></i><span><?php echo $data0->phone ?></span></li>
                            <li><a href="Follow_Product.php"><i class="fas fa-shipping-fast"></i><span>پیگیری سفارش</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-right">
                        <ul class="header_list">
                            <li><a href="signup.php"><i class="fas fa-user-plus"></i><span> ثبت نام</span></a></li>
                            <li><a href="login.php"><i class="ti-user"></i><span>ورود</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.php">
                    <img class="logo_light" src="assets/images/logo_light.png" alt="logo" />
                    <img class="logo_dark" src="assets/images/logo_dark.png" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                    <?php
                    $sql="select * from `cat` where `subcat` = 0";
                    $result=$connect->query($sql);
                    $rows=$result->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $row)
                    {
                        echo '
                          <li class="dropdown">
                            <a data-time='.$row["id"].' class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">'.$row["name"].'</a>
                            <div class="dropdown-menu">
                          <ul>
                        ';
                    $sql2="select * from `cat` where `subcat` = ?";
                    $result2=$connect->prepare($sql2);
                    $result2->bindValue(1,$row["id"]);
                    $result2->execute();
                    $rows2=$result2->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows2 as $row2){
                        echo '<li><a data-time='.$row2["id"].' class="dropdown-item nav-link nav_item" href="shop-load-more.php?name_pr='.$row2["id"].'"> '.$row2["name"].'</a></li>';
                    }
                    echo '
                        </ul>
                            </div>
                        </li>
                    ';
                    }
                        ?>




                        <li><a class="nav-link nav_item" href="contact.php">تماس با ما</a></li>
                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                        <div class="search_wrap">
                            <form action="shop-load-more.php" method="post">
                                <input type="search" placeholder="جستجوی" class="form-control" id="search_input" name="search_input">
                                <i class="loading"></i>
                                <div class="search_all">
                                    <div class="result_search_404">
                                    </div>
                                </div>
                                <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div><div class="search_overlay"></div><div class="search_overlay"></div>
                    </li>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">0</span></a>
                        <div id="update_basket" class="cart_box dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <?php
                                if (isset($_SESSION["email_Login"])){
                                    $sql3="select * from `basket` where `user` = ? and `state` = 0";
                                    $result3=$connect->prepare($sql3);
                                    $result3->bindValue(1,$_SESSION["email_Login"]);
                                    $result3->execute();


                                    $All_Price=0;
                                    $count_price=0;
                                    $rows3=$result3->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($rows3 as $row3) {
                                        if ($row3 == null){
                                            echo ' ';
                                        }else{
                                        }


                                        $sql4="select * from `product` where `id` = ?";
                                        $result4=$connect->prepare($sql4);
                                        $result4->bindValue(1,$row3["id_product"]);
                                        $result4->execute();
                                        $rows4=$result4->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows4 as $row4){
                                            $discount =$row4["discount"] * $row3["count"];
                                            $solo_product =$row4["price"] * $row3["count"];;
                                            $Last_price=$solo_product-$discount;
                                            echo '
                                <li class="li_basket_header">
                                    <a href="#" class="item_remove"><i id='.$row3["id"].' class="ion-close closed_icon"></i></a>
                                    <a href="shop-product-detail.php?id_pr='.$row4["id"].'"><img src="admin/product/'.$row4["images"].'" alt="cart_thumb1">'.$row4["name"].'</a>
                                    <span class="cart_quantity"> '.$row3["count"].' عدد  '.number_format($Last_price).'<span class="cart_amount"> <span class="price_symbole">تومان</span></span></span>
                                </li>
                                        ';
                                            $count_price += $Last_price;

                                        }

                                    }


                                    echo '
                                <p class="cart_total"><strong>جمع:</strong>'.number_format($count_price).'<span class="cart_price"> <span class="price_symbole">تومان</span></span></p>
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_buttons"><a href="my-account.php" class="btn btn-fill-line btn-radius view-cart">سبد خرید</a><a href="#" class="btn_update_basket btn btn-fill-out btn-radius checkout">بروز رسانی سبد</a></p>
                            </div>
';
                                }else{echo '';}

                                ?>

                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!-- END HEADER -->