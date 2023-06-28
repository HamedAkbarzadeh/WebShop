$(document).ready(function () {

    $(".fade_out").animate({
        "height":"0"
    },{
        duration:1100,
        done:function () {
            $(".fade_out").removeClass("d-flex");
        }
    })
    // End_Of_Minus_Validation();
    // $("#msg-validation-m").html("کد امنیتی درست وارد نشده است .");
    //
    //
    // function End_Of_Minus_Validation (){
    //     $(".MSG_ALL_NOTI_MINUS").css("display" , "flex");
    //     $(".full_bottom_Border_validation").css("width" , "0px");
    //
    //     $(".full_bottom_Border_validation").animate({
    //         "width":"100%"
    //     },{
    //         duration:2500,
    //         done:function EndOfValidation() {
    //             $(".MSG_ALL_NOTI_MINUS").fadeOut(500);
    //         }
    //     })
    // }

});