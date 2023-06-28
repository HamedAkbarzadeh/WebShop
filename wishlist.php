<?php include "header-UserPanel.php"; ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>لیست مورد علاقه</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">خانه</a></li>
                    <li class="breadcrumb-item"><a href="#">صفحات</a></li>
                    <li class="breadcrumb-item active">لیست مورد علاقه</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive wishlist_table">
                	<table class="table">
                    	<thead>
                        	<tr>
                            	<th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">محصول</th>
                                <th class="product-price">قیمت</th>
                                <th class="product-stock-status">وضعیت</th>
                                <th class="product-add-to-cart"></th>
                                <th class="product-remove">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td class="product-thumbnail"><a href="#"><img src="assets/images/product_img1.jpg" alt="product1"></a></td>
                                <td class="product-name" data-title="محصول"><a href="#">لباس آبی زنانه</a></td>
                                <td class="product-price" data-title="قیمت">45000 تومان</td>
                              	<td class="product-stock-status" data-title="وضعیت محصول"><span class="badge badge-pill badge-success">موجود</span></td>
                                <td class="product-add-to-cart"><a href="#" class="btn btn-fill-out"><i class="icon-basket-loaded"></i> افزودن به سبد خرید</a></td>
                                <td class="product-remove" data-title="حذف"><a href="#"><i class="ti-close"></i></a></td>
                            </tr>
                            <tr>
                            	<td class="product-thumbnail"><a href="#"><img src="assets/images/product_img2.jpg" alt="product2"></a></td>
                                <td class="product-name" data-title="محصول"><a href="#">چرم خاکستری</a></td>
                                <td class="product-price" data-title="قیمت">55000 تومان</td>
                              	<td class="product-stock-status" data-title="وضعیت محصول"><span class="badge badge-pill badge-success">موجود</span></td>
                                <td class="product-add-to-cart"><a href="#" class="btn btn-fill-out"><i class="icon-basket-loaded"></i> افزودن به سبد خرید</a></td>
                                <td class="product-remove" data-title="حذف"><a href="#"><i class="ti-close"></i></a></td>
                            </tr>
                            <tr>
                            	<td class="product-thumbnail"><a href="#"><img src="assets/images/product_img3.jpg" alt="product3"></a></td>
                                <td class="product-name" data-title="محصول"><a href="#">لباس کامل زنانه</a></td>
                                <td class="product-price" data-title="قیمت">68000 تومان</td>
                              	<td class="product-stock-status" data-title="وضعیت محصول"><span class="badge badge-pill badge-success">موجود</span></td>
                                <td class="product-add-to-cart"><a href="#" class="btn btn-fill-out"><i class="icon-basket-loaded"></i> افزودن به سبد خرید</a></td>
                                <td class="product-remove" data-title="حذف"><a href="#"><i class="ti-close"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
    <div class="container"> 
        <div class="row align-items-center">    
            <div class="col-md-6">
                <div class="heading_s1 mb-md-0 heading_light">
                    <h3>اشتراک در خبرنامه ما</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form>
                        <input type="text" id="email_news" required="" class="form-control rounded-0" placeholder="آدرس ایمیل">
                        <button type="button" id="btn_email_news" class="btn btn-dark rounded-0" name="submit" value="Submit">
                            اشتراک
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->
<?php include "footer-UserPanel.php"; ?>