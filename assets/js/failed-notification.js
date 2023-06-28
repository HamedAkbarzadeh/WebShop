$(document).ready(function () {

    EndOfMinus();
    $("#msg-m").html("خطا در انجام عملیات , لطفا دوباره امتحان کنید .");

    function EndOfMinus (){
        $("#msg-minus").css("display" , "flex");
        $(".full_bottomBorder").css("width" , "0px");

        $(".full_bottomBorder").animate({
            "width":"100%"
        },{
            duration:2000,
            done:function EndOf() {
                $("#msg-minus").fadeOut(500);
            }
        })
    }
})