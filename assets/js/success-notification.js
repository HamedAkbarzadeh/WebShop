$(document).ready(function () {
    EndOfPlus();
    $("#msg-p").html(" عملیات با موفقیت انجام شد . ");

    function EndOfPlus() {
        $("#msg-plus").css("display" , "flex");

        $(".full_bottomBorder").css("width" , "0px");
        $(".full_bottomBorder").animate({
            "width":"100%"
        },{
            duration:2000,
            done:function () {
                $("#msg-plus").fadeOut(500);
            }
        })
    }
})