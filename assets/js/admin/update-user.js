$(document).ready(function () {

    /****** Start update-user ********/

    $("#btn-update").click(function (e) {
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var phone = $("#phone").val();
        var email = $("#email").val();

            if (fname ==""){
                EndOfMinus();
                $("#msg-m").html("لطفا نام کاربر را وارد کنید .");
    }
    if (lname==""){
        EndOfMinus();
        $("#msg-m").html("لطفا نام خانوادگی کاربر را وارد کنید .");
    }
    if (username==""){
        EndOfMinus();
        $("#msg-m").html("لطفا نا کاربری کاربر را وارد کنید .");
    }
    if (password==""){
        EndOfMinus();
        $("#msg-m").html("لطفا رمز عبور کاربر را وارد کنید .");
    }

    if (phone==""){
        EndOfMinus();
        $("#msg-m").html("لطفا شماره تلفن کاربر را وارد کنید .");
    }

    if (email==""){
        EndOfMinus();
        $("#msg-m").html("لطفا ایمیل کاربر را وارد کنید .");
    }


    if (fname !=="" && lname !=="" && username !=="" && password !=="" && phone !=="" && email !==""){
        $.post("update-user-check.php",{fname:fname,lname:lname,username:username,password:password,phone:phone,email:email},function(data){

            if (data=="ok"){
                EndOfPlus();
                $("#msg-p").html(" اطلاعات کاربر با موفقیت بروز رسانی شد .");


            }
            else{
                EndOfMinus();
                $("#msg-m").html("خطا در ثبت اطلاعات");
            }
        })
    }
});
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