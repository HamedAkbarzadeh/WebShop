<?php
session_start();
if (isset($_SESSION["admin_Login"])){
    session_write_close();
    include "header-Admin.php";
?>
    <div class="All-Body">



        <div class="manager_left">
            <iframe name="frame" id="frame">
            </iframe>
        </div>

        <div class="manager_right">
            <ul>
                <a href="delfult-page.php" id="home_page" target="frame"> <li>صفحه اصلی<i class="fas fa-home"></i> </li></a>
                <a href="user/user-manager.php" target="frame"> <li>مدریت کاربران<i class="fas fa-users-cog shh"></i> </li></a>
                <a href="categories/categories_manager.php" target="frame"> <li>مدریت دسته<i class="fas fa-grip-horizontal"></i> </li></a>
                <a href="product/product-manager.php" target="frame"> <li>مدیریت  محصولات<i class="fas fa-box-open"></i> </li></a>
                <a href="slider/slider-manager.php" target="frame"> <li>مدیریت اسلایدر<i class="fab fa-slideshare"></i> </li></a>
                <a href="vote/vote-manager.php" target="frame"> <li>مدیریت نظرات<i class=" fas fa-comment"></i> </li></a>
                <a href="Order/Order-manager.php" target="frame"> <li>مدیریت سفارشات<i class="fas fa-file-invoice-dollar"></i> </li></a>
                <a href="contact/contact-manager.php" target="frame"> <li>مدیریت تماس با ما<i class="fas fa-newspaper"></i> </li></a>
                <a href="admin-info/admin-exit.php"><li> خروج <i class="fas fa-sign-out-alt"></i> </li></a>
            </ul>
        </div>

    </div>


    <?php
}else{
    header("location: ../404.php");
    die();
}