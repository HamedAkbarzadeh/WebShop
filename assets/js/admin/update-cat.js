$(document).ready(function () {

    /****** Start update-user ********/

    $("#btn-update-cat").click(function () {
        var name = $("#name").val();
        var cat = $("#cat").val();

        if (name==""){
            EndOfMinus();
            $("#msg-m").html("لطفا نام دسته را وارد کنید .");
        }

        if (name !== ""){
            $.post("update-categories-check.php",{name:name,cat:cat},function (data) {
                if (data == "ok"){
                    EndOfPlus();
                    $("#msg-p").html("اطلاعات دسته با موفقیت بروز رسانی شد.");
                }
                else {
                    EndOfMinus();
                    $("#msg-m").html("خطا در بروز رسانی اطلاعات دسته .");
                }
            })
        }
    })

    /****** End update-user ********/











/******** Start msg Box *************/
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
/******** End msg Box *************/
})