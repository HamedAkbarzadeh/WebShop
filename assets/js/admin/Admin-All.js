$(document).ready(function () {
    /****** Start add-user ********/
    $("#btn-Login").click(function (e) {
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var password = $("#password").val();


        if (fname !=="" && lname !=="" && email !=="" && password !==""){
            $.post("add-user-check.php",{fname:fname,lname:lname,email:email,password:password},function(data){

                if (data=="ok"){
                    EndOfPlus();
                    $("#msg-p").html("کاربر با موفقیت ثبت نام شد .");

                    $("#fname").val("");
                    $("#lname").val("");
                    $("#username").val("");
                    $("#password").val("");
                }
                else{
                    EndOfMinus();
                    $("#msg-m").html("این ایمیل قبلا استفاده شده است !");
                }
            })
        }else {
            if (fname==""){
                EndOfMinus();
                $("#msg-m").html("لطفا نام کاربر را وارد کنید .");
            }
            if (lname==""){
                EndOfMinus();
                $("#msg-m").html("لطفا نام خانوادگی کاربر را وارد کنید .");
            }
            if (email==""){
                EndOfMinus();
                $("#msg-m").html("لطفا ایمیل کاربر را وارد کنید .");
            }
            if (password==""){
                EndOfMinus();
                $("#msg-m").html("لطفا رمز عبور کاربر را وارد کنید .");
            }
        }
    });
    /****** End add-user ********/

 /********* Start Delete-user **********/
     $(".delete").click(function(){
         var id=$(this).attr("id");
         $.post("delete-user-check.php",{id:id},function(data){

             if (data !=="no")
             {
                 $("#jadval").html();
                 $("#jadval").html(data);
             }
         });
     });
 /********* End Delete-user **********/

/********** start update-user ADMIN_PANEL ***********/

    $(".update-user").click(function(){
        var id=$(this).attr("id");
        $.post("update-user-form.php",{id:id},function(data){

            if (data !=="no")
            {
                $("#jadval").html();
                $("#jadval").html(data);
            }

        });
    });
/********** End update-user ADMIN_PANEL ***********/

/******* Start Show_User With Search Box ************/
$("#btn_search").click(function () {
    var data = $("#search_Box").val();
    $.post("serch-user-check.php",{data:data},function (data) {
        $("#jadval").html("");
        $("#jadval").html(data);

        if (data !==""){
            EndOfMinus();
            $("#msg-m").html("همیچین نام کاربری وجود ندارد.");
        }

    });
})

/******* End Show_User With Search Box ************/

/******* Start Add-categories *********/
    $("#btn_add_cat").click(function () {
        var name = $("#name").val();
        var cat = $("#cat").val();

        if (name == ""){
            EndOfMinus();
            $("#msg-m").html("نام دسته را وارد کنید .");
        }
        $.post("add-categories-check.php",{name:name,cat:cat},function (data) {
            if (data == "ok"){
                EndOfPlus();
                $("#msg-p").html("دسته با موفقیت اضافه شد .");

                $("#name").val("");
            }
            else {
                EndOfMinus();
                $("#msg-m").html("خطا در اضافه شدن دسته .");
            }
        })

    })
/******* End Add-categories *********/


/******* Start delete-categories *********/
$(".delete_cat").click(function () {
    var id = $(this).attr("id");
    $.post("delete-categories-check.php",{id:id},function (data) {
        if (data !=="no")
        {
            $("#jadval").html();
            $("#jadval").html(data);
        }
    })
})
/******* End delete-categories *********/

/********* Start update-cat *********/
$(".update-cat").click(function(){
    var id = $(this).attr("id");
    $.post("update-categories-form.php",{id:id},function(data){

        if (data !=="no")
        {
            $("#jadval").html();
            $("#jadval").html(data);
        }

    });
});
/********** End update-cat *********/

/********* Start add-product ************/
$("#form_add_product").submit(function (e) {
    var name_product = $("#name-product").val();
    var price_product = $("#price-product").val();
    var Discount_product = $("#Discount-product").val();
    var Explanation_mini_product = $("#Explanation-mini-product").val();
    var Explanation_All_product = $("#Explanation-All-product").val();
    var count = $("#count").val();
    var file_product = $("#file_product").val();

    if (name_product !== "" && price_product !== "" && Discount_product !== "" && Explanation_mini_product !=="" &&
        count !== "" && file_product !== "")
    {
        return;
    }else{

        e.preventDefault();
        if (name_product == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا نام محصول خود را وارد کنید .");
            setFocus("name-product");
        }
        if (price_product == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا قیمت محصول خود را وارد کنید .");
            setFocus("price-product");
        }
        if (Discount_product == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا میزان تخفیف را وارد کنید .");
            setFocus("Discount-product");
        }
        if (Explanation_mini_product == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا توضیحات مختصر محصول خود را وارد کنید .");
            setFocus("Explanation-mini-product");
        }
        if (Explanation_All_product == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا توضیحات کامل محصول خود را وارد کنید .");
        }
        if (file_product == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا عکس  محصول خود را انتخاب کنید .");
            setFocus("file_product");
        }
        if (count == ""){
            EndOfMinus();
            $("#msg-m").html("تعداد محصول خود را وارد کنید .");
            setFocus("count");
        }
    }
})
/********* End add-product *************/

/**** Start-info-product *****/
$(".info-product").click(function () {
    var id = $(this).attr("id");
    $.post("add-info-product-form.php",{id:id},function(data){

        if (data !=="no")
        {
            $("#jadval").html();
            $("#jadval").html(data);
        }

    });
})

    $(".a_post").click(function () {
        var id = $(this).attr("id");
        $.post("add-info-product-form.php",{id:id},function(data){

            if (data !=="no")
            {
                $("#jadval").html();
                $("#jadval").html(data);
            }

        });
    })

/**** End-info-product *****/
/**** Start-info-product-form *****/
$("#btn-info-product").click(function () {
    var question = $("#question").val();
    var answer = $("#answer").val();
    $.post("add-info-product-check.php",{question:question,answer:answer},function (data) {
        if (data=="ok"){
            EndOfPlus();
            $("#msg-p").html("اطلاعات شما با موفقیت اضافه شد. <br> اطلاعات بعدی را اضافه کنید .");
            $("#question").val("");
            $("#answer").val("");
        }else {
            EndOfMinus();
            $("#msg-m").html("خطا در ثبت اطلاعات دوباره تلاش کنید .");
        }
    })
})


/**** End-info-product-form *****/


/*** Start Show-info-product ***/
$(".show-info-product").click(function () {
    var id = $(this).attr("id");
    $.post("show-info-product-form.php",{id:id},function(data){

        if (data !=="no")
        {
            $("#jadval").html();
            $("#jadval").html(data);
        }

    });
})
/*** End Show-info-product ***/


/*** Start Delete-info-product ***/
$(".btn-delete-info-product").click(function(){
    $.post("delete-info-product-check.php",function(data){

        if (data !=="no")
        {
            $("#jadval").html();
            $("#jadval").html(data);
        }
    });
});
/*** End Delete-info-product ***/



/****** Start Delete-product.php ******/
$(".delete_product").click(function(){
    var id=$(this).attr("id");
    $.post("delete-product-check.php",{id:id},function(data){

        if (data !=="no")
        {
            $("#jadval").html();
            $("#jadval").html(data);
        }
    });
});
/****** End Delete-product.php *******/

/**** Start Update-product.php *******/
$(".update-product").click(function () {
    var id = $(this).attr("id");
    $.post("update-product-form.php",{id:id},function(data){

        if (data !=="no")
        {
            $("#jadval").html();
            $("#jadval").html(data);
        }

    });
})

    /** Start Update-form **
    /** End Update-form **/
/**** End Update-product.php ****/

/********** Start Slider Page ************/

/**** Start _add_first_slider_one ****/
$("#btn_add_first_slider_one").click(function () {

    var name =$("#name-slider").val();
    var select = $("#select-slider").val();
    var state = $("#state").val();
    if (name == ""){
        EndOfMinus();
        $("#msg-m").html("لطفا نام دسته را انتخاب کنید .");
    }
    if (name !== ""){
        $.post("add-slider-check.php",{name:name,select:select,state:state},function (data) {
            if (data == "ok"){
                EndOfPlus();
                $("#msg-p").html("اسلایدر شما با موفقیت اضافه شد .");

                $("#name-slider").val("");
                $("#select-slider").val("");
                $("#state-slider").val("");

            }else {
                EndOfMinus();
                $("#msg-m").html("تعداد محصول شاخه شما کمتر از 6 تا است .");
            }
        })
    }
})
/**** End _add_first_slider_one *****/
/**** Start delete-slider ****/
$(".delete-slider").click(function () {
    var id=$(this).attr("id");
    $.post("delete-slider-check.php",{id:id},function(data){

        if (data !=="no")
        {
            $("#jadval").html();
            $("#jadval").html(data);
        }
    })
})
/**** End delete-slider ****/
/********** End Slider Page *****-*******/


/******* Start vote-manager *******/
/*** Start delete-vote ***/
$(".delete-vote").click(function () {
    var id=$(this).attr("id");
    $.post("delete-vote-check.php",{id:id},function(data){

        if (data !=="no")
        {
            $("#jadval").html();
            $("#jadval").html(data);
        }
    })
})
/*** End delete-vote ***/

/*** Start success-vote ***/
$(".success-vote").click(function () {
    var id = $(this).attr("id");
    $.post("update-vote-check.php",{id:id},function(data){

        if (data !=="no")
        {
            $("#jadval").html();
            $("#jadval").html(data);
        }

    });
})
/*** End success-vote ***/
/******* End vote-manager *******/

/*** Start btn_add_contact ***/
$("#btn_add_contact").click(function () {
    var phone = $("#phone").val();
    var email = $("#email").val();
    var address = $("#address").val();
    if (phone !== "" && email !== "" && address !== ""){
        $.post("add-contact-check.php",{phone:phone,email:email,address:address},function (data) {
            if (data == "ok"){
                EndOfPlus();
                $("#msg-p").html("اطلاعات شما با موفقیت ثبت شد .");
            }else {
                EndOfMinus();
                $("#msg-m").html("خطا در ثبت اطلاعات");
            }
        })
    }else {
        if (phone == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا کادر شماره تلفن را پر کنید .");
            setFocus("phone");
        }
        if (email == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا کادر  ایمیل را پر کنید .");
            setFocus("email");
        }
        if (address == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا کادر  آدرس را پر کنید .");
            setFocus("address");
        }
    }
})
/*** End btn_add_contact ***/

/*** update btn_update_contact ***/
$("#btn_update_contact").click(function () {
    var phone = $("#phone").val();
    var email = $("#email").val();
    var address = $("#address").val();
    if (phone !== "" && email !== "" && address !== ""){
        $.post("update-contact-check.php",{phone:phone,email:email,address:address},function (data) {
            if (data == "ok"){
                EndOfPlus();
                $("#msg-p").html("اطلاعات شما با موفقیت بروز رسانی شد شد .");
            }else {
                EndOfMinus();
                $("#msg-m").html("خطا در ثبت اطلاعات");
            }
        })
    }else {
        if (phone == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا کادر شماره تلفن را پر کنید .");
            setFocus("phone");
        }
        if (email == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا کادر  ایمیل را پر کنید .");
            setFocus("email");
        }
        if (address == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا کادر  آدرس را پر کنید .");
            setFocus("address");
        }
    }
})
/*** update btn_update_contact ***/

/*** add Exclusive_product ***/
$(".Exclusive_product").click(function () {
    var id = $(this).attr("id");
    $.post("add-slider-check.php",{id:id},function (data) {
        if (data !=="no")
        {
            $("#jadval").html();
            $("#jadval").html(data);
        }
    })
})

/*** add Exclusive_product ***/

/*** delete delete_Exclusive_product ***/
$(".delete_Exclusive_product").click(function () {
    var id = $(this).attr("id");
    $.post("delete-slider-check.php",{id:id},function (data) {
        if (data !=="no")
        {
            $("#jadval").html();
            $("#jadval").html(data);
        }
    })
})
/*** delete delete_Exclusive_product ***/

    /******* Start All Function ********/
    function setFocus(id){
        document.getElementById(id).focus();
    }

    function Validation_of_product() {
        if (name_product == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا نام محصول خود را وارد کنید .");
        }
        if (price_product == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا قیمت محصول خود را وارد کنید .");
        }
        if (Discount_product == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا میزان تخفیف را وارد کنید .");
        }
        if (Explanation_mini_product == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا توضیحات مختصر محصول خود را وارد کنید .");
        }
        if (Explanation_All_product == ""){
            EndOfMinus();
            $("#msg-m").html("لطفا توضیحات کامل محصول خود را وارد کنید .");
        }
    }
    /******* End All Function ********/
    /**** Start delete_contact ****/
    $(".delete_contact").click(function () {
            $.post("delete-contact-check.php",function(data){
                    $("#jadval").html();
                    $("#jadval").html(data);
            });
    })
    /**** End delete_contact ****/

/******** Start msg Box *************/
    /******** Start msg Box *************/
    /*** static noti **/
    $(".close-icon").click(function () {
        $(".new_validation").animate({
            "height":"0"
        },{
            duration:1100,
            done:function () {
                $(".new_validation").removeClass("d-flex");
            }
        })
    })
    /*** static noti **/
    
    /****** datails_order_before *******/
    $(".datails_order_before").click(function () {
        var id_before = $(this).attr("id");
        $.post("send_update_order_state.php",{id_before:id_before},function (data) {
            if (data !=="no")
            {
                $("#jadval").html(data);
            }
        });
    })

    $(".datails_order_after").click(function () {
        var id_after = $(this).attr("id");
        $.post("send_update_order_state.php",{id_after:id_after},function (data) {
            if (data !=="no")
            {
                $("#jadval").html(data);
            }
        });
    })

    $(".details_order").click(function () {
        var id = $(this).attr("id");
        $.post("details-order-form.php",{id:id},function (data) {
            if (data !=="no")
            {
                $("#jadval").html(data);
            }
        });
    })
    /****** datails_order_before *******/
    /**** color-product ****/
    $(".color-product").click(function () {
        var id = $(this).attr("id");
        $.post("add-color-product.php",{id:id},function (data) {
            if (data !=="no")
            {
                $("#jadval").html(data);
            }
        });
    })
    /**** color-product ****/
    /*** send color-product ***/
    $("#btn_add_color").click(function () {

        if ($("#checkbox-1").is(':checked')){
            var black_attr = $("#checkbox-1").val();
        }else {
            var black_attr = '';
        }
        if ($("#checkbox-2").is(':checked')){
            var white_attr = $("#checkbox-2").val();
        }else {
            var white_attr = '';
        }
        if ($("#checkbox-3").is(':checked')){
            var gold_attr = $("#checkbox-3").val();
        }else {
            var gold_attr = '';
        }
        if ($("#checkbox-4").is(':checked')){
            var brown_attr = $("#checkbox-4").val();
        }else {
            var brown_attr = '';
        }
        if ($("#checkbox-5").is(':checked')){
            var cream_attr = $("#checkbox-5").val();
        }else {
            var cream_attr= '';
        }
        if ($("#checkbox-6").is(':checked')){
            var bony_attr = $("#checkbox-6").val();
        }else {
            var bony_attr = '';
        }


        $.post("add-color-product-check.php",{black_attr:black_attr,white_attr:white_attr,gold_attr:gold_attr,brown_attr:brown_attr,cream_attr:cream_attr,bony_attr:bony_attr},function (data) {
            if (data == "ok"){
                EndOfPlus();
                $("#msg-p").html("اطلاعات شما با موفقیت ثبت شد .");
            $("#btn_add_color").addClass("d-none");
            $("#back_to").addClass("d-flex");
            }else {
                EndOfMinus();
                $("#msg-m").html("اطلاعات این محصول قبلا ذخیره شده است .");
                $("#btn_add_color").addClass("d-none");
                $("#back_to").addClass("d-flex");
            }
        })
    })
    /*** send color-product ***/
    /*** CaptCha Code ***/
    $("#btn_captcha_refresh").click(function () {
        document.getElementById("captcha_refresh").src="captcha.php  ?r="+ Math.random();
    })
    $("#captcha_refresh").click(function () {
        document.getElementById("captcha_refresh").src="captcha.php  ?r="+ Math.random();
    })
    /*** CaptCha Code ***/
    /***** btn_add_slider_banner ******/
        $("#form_add_slider_banner").submit(function (e) {
            var mini_txt = $("#mini_title").val();
            var title_txt = $("#txt_title").val();
            var mini_explanation = $("#mini_explanation").val();
            var images = $("#image_slide").val();
            var slide_banner = $("#slide_banner").val();

            if (title_txt !== "" && images !== ""){
                return;
            }else {
                e.preventDefault();
                if (title_txt == "") {
                    e.preventDefault();
                    EndOfMinus();
                    $("#msg-m").html("متن اصلی را وارد کنید .");
                    setFocus("title_txt");
                }
                if (images == ""){
                    e.preventDefault();
                    EndOfMinus();
                    $("#msg-m").html("عکس بنر را انتخاب کنید .");
                    setFocus("images");
                }
            }


            })
    /***** btn_add_slider_banner ******/
    /***** btn delete-slider-banner *******/
    $(".delete_slider_banner").click(function () {
        var id = $(this).attr("id");
        $.post("delete-slider-check.php",{id:id},function (data) {
            if (data !=="no")
            {
                $("#jadval").html(data);
            }
        });
    })
    /***** btn delete-slider-banner *******/
    /**** btn update-slider-banner ******/
    $(".update_slider_banner").click(function () {
        var id = $(this).attr("id");
        $.post("update-slider-form.php",{id:id},function (data) {
            if (data !=="no")
            {
                $("#jadval").html(data);
            }
        });
    })
    /**** btn update-slider-banner ******/
    /****** update-color-product ********/
    $(".update-color-product").click(function () {
        var id = $(this).attr("id");
        $.post("update-color-product-form.php",{id:id},function (data) {
            if (data !=="no")
            {
                $("#jadval").html(data);
            }
        });
    })
    /****** update-color-product ********/
    /****** btn_update_color_product ******/
    $("#btn_update_color_product").click(function () {
        var id = $("#btn_update_color_product").attr("data-id-product");

        if ($("#checkbox-1").is(':checked')){
            var black_attr = $("#checkbox-1").val();
        }else {
            var black_attr = '';
        }
        if ($("#checkbox-2").is(':checked')){
            var white_attr = $("#checkbox-2").val();
        }else {
            var white_attr = '';
        }
        if ($("#checkbox-3").is(':checked')){
            var gold_attr = $("#checkbox-3").val();
        }else {
            var gold_attr = '';
        }
        if ($("#checkbox-4").is(':checked')){
            var brown_attr = $("#checkbox-4").val();
        }else {
            var brown_attr = '';
        }
        if ($("#checkbox-5").is(':checked')){
            var cream_attr = $("#checkbox-5").val();
        }else {
            var cream_attr= '';
        }
        if ($("#checkbox-6").is(':checked')){
            var bony_attr = $("#checkbox-6").val();
        }else {
            var bony_attr = '';
        }


        $.post("update-color-product-check.php",{id:id,black_attr:black_attr,white_attr:white_attr,gold_attr:gold_attr,brown_attr:brown_attr,cream_attr:cream_attr,bony_attr:bony_attr},function (data) {
            if (data == "ok"){
                EndOfPlus();
                $("#msg-p").html("اطلاعات شما با موفقیت ثبت شد .");
                $("#btn_add_color").addClass("d-none");
                $("#back_to").addClass("d-flex");
            }else {
                EndOfMinus();
                $("#msg-m").html("اطلاعات این محصول قبلا ذخیره شده است .");
                $("#btn_add_color").addClass("d-none");
                $("#back_to").addClass("d-flex");
            }
        })
    })
    /****** btn_update_color_product ******/
    /**** admin details-order-form (cnc Cut) ****/
    $(".more-cnc-info").click(function () {
        var id=$(this).attr("id");
        var code_follow = $("#code_follow").val();
        $.post("more-cnc-info.php",{id:id,code_follow:code_follow},function(data){

            if (data !=="no")
            {
                $("#jadval").html();
                $("#jadval").html(data);
            }

        });
    });
    $(".more-cut-info").click(function () {
        var id=$(this).attr("id");
        var code_follow = $("#code_follow").val();
        $.post("more-cut-info.php",{id:id,code_follow:code_follow},function(data){

            if (data !=="no")
            {
                $("#jadval").html();
                $("#jadval").html(data);
            }

        });
    });
    /**** admin details-order-form (cnc Cut) ****/
    /******** Start msg Box *************/

    function EndOfMinus (){
        $(".MSG_ALL_NOTI_MINUS").css("display" , "flex");
        $(".full_bottom_Border_validation").css("width" , "0px");

        $(".full_bottom_Border_validation").animate({
            "width":"100%"
        },{
            duration:2500,
            done:function EndOfValidation() {
                $(".MSG_ALL_NOTI_MINUS").fadeOut();
            }
        })
    }

    function EndOfPlus (){
        $(".MSG_ALL_NOTI_PLUS").css("display" , "flex");
        $(".full_bottom_Border_validation").css("width" , "0px");

        $(".full_bottom_Border_validation").animate({
            "width":"100%"
        },{
            duration:2500,
            done:function () {
                $(".MSG_ALL_NOTI_PLUS").fadeOut();
            }
        })
    }
    /******** End msg Box *************/
})