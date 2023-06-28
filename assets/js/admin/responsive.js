$(document).ready(function () {
    /**** show-admin-name ****/
    function show_admin_name (){
        $.post("admin-info/name-admin.php",function (data) {
            $(".admin_name").html(data);
        })
    }
    setTimeout(show_admin_name,100);
    /**** show-admin-name ****/

    document.getElementById('home_page').click();
    $(".all_fixed_Page").hide();
$("#th_large_nav").click(function () {
    $(".all_fixed_Page").slideDown("slow");
})
    $(".left_manager_admin").click(function () {
        $(".all_fixed_Page").slideUp("slow");
    })
})