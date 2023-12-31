<?php
include "header-UserPanel.php";
?>
<div class="compare_box">
	<div class="table-responsive">
    	<table class="table table-bordered text-center">
        <tbody>
            <tr class="pr_image">
                <td class="row_title">تصویر محصول</td>
                <td class="row_img"><img src="assets/images/product_img1.jpg" alt="compare-img"></td>
                <td class="row_img"><img src="assets/images/product_img2.jpg" alt="compare-img"></td>
                <td class="row_img"><img src="assets/images/product_img3.jpg" alt="compare-img"></td>
            </tr>
            <tr class="pr_title">
                <td class="row_title">نام محصول</td>
                <td class="product_name"><a href="shop-product-detail.php">لباس آبی زنانه</a></td>
                <td class="product_name"><a href="shop-product-detail.php">کت اسپرت خاکستری</a></td>
                <td class="product_name"><a href="shop-product-detail.php">لباس کامل زنانه</a></td>
            </tr>
            <tr class="pr_price">
                <td class="row_title">قیمت</td>
                <td class="product_price"><span class="price">45000 تومان</span></td>
                <td class="product_price"><span class="price">55000 تومان</span></td>
                <td class="product_price"><span class="price">68000 تومان</span></td>
            </tr>
            <tr class="pr_rating">
            	<td class="row_title">رتبه بندی</td>
            	<td>
                    <div class="rating_wrap">
                        <div class="rating">
                            <div class="product_rate" style="width:80%"></div>
                        </div>
                        <span class="rating_num">(21)</span>
                    </div>
                </td>
                <td>
                    <div class="rating_wrap">
                        <div class="rating">
                            <div class="product_rate" style="width:68%"></div>
                        </div>
                        <span class="rating_num">(15)</span>
                    </div>
                </td>
                <td>
                    <div class="rating_wrap">
                        <div class="rating">
                            <div class="product_rate" style="width:87%"></div>
                        </div>
                        <span class="rating_num">(25)</span>
                    </div>
                </td>
            </tr>
            <tr class="pr_add_to_cart">
                <td class="row_title">افزودن به سبد خرید</td>
                <td class="row_btn"><a href="#" class="btn btn-fill-out"><i class="icon-basket-loaded"></i> افزودن به سبد خرید</a></td>
                <td class="row_btn"><a href="#" class="btn btn-fill-out"><i class="icon-basket-loaded"></i> افزودن به سبد خرید</a></td>
                <td class="row_btn"><a href="#" class="btn btn-fill-out"><i class="icon-basket-loaded"></i> افزودن به سبد خرید</a></td>
            </tr>
            <tr class="description">
                <td class="row_title">توضیحات</td>
                <td class="row_text"><p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است </p></td>
                <td class="row_text"><p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است </p></td>
                <td class="row_text"><p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است </p></td>
            </tr>
            <tr class="pr_color">
                <td class="row_title">رنگ</td>
                <td class="row_color">
                	<div class="product_color_switch">
                        <span data-color="#87554B"></span>
                        <span data-color="#333333"></span>
                        <span data-color="#DA323F"></span>
                    </div>
                </td>
                <td class="row_color"></td>
                <td class="row_color">
                	<div class="product_color_switch">
                        <span data-color="#333333"></span>
                        <span data-color="#7C502F"></span>
                        <span data-color="#2F366C"></span>
                        <span data-color="#874A3D"></span>
                    </div>
                </td>
            </tr>
            <tr class="pr_size">
                <td class="row_title">اندازه های موجود</td>
                <td class="row_size"><span>S, M, L, XL</span></td>
                <td class="row_size"><span>S, M, L, XL</span></td>
                <td class="row_size"><span>S, M, L, XL</span></td>
            </tr>
            <tr class="pr_stock">
                <td class="row_title">وضعیت</td>
                <td class="row_stock"><span class="in-stock">موجود</span></td>
                <td class="row_stock"><span class="out-stock">تمام شده</span></td>
                <td class="row_stock"><span class="in-stock">موجود</span></td>
            </tr>
            <tr class="pr_weight">
                <td class="row_title">وزن</td>
                <td class="row_weight"></td>
                <td class="row_weight"></td>
                <td class="row_weight"></td>
            </tr>
            <tr class="pr_dimensions">
                <td class="row_title">ابعاد</td>
                <td class="row_dimensions">N/A</td>
                <td class="row_dimensions">N/A</td>
                <td class="row_dimensions">N/A</td>
            </tr>
            <tr class="pr_remove">
                <td class="row_title"></td>
                <td class="row_remove">
                    <a href="#"><span>حذف</span> <i class="fa fa-times"></i></a>
                </td>
                <td class="row_remove">
                    <a href="#"><span>حذف</span> <i class="fa fa-times"></i></a>
                </td>
                <td class="row_remove">
                    <a href="#"><span>حذف</span> <i class="fa fa-times"></i></a>
                </td>
            </tr>
        </tbody>
	</table>
    </div>
</div>
<?php
include "footer-UserPanel.php";
?>
<script src="assets/js/scripts.js"></script>
