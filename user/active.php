<html>
<head>
    <script src="../assets/js/java.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/rtl-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Josefin+Sans:300,400,600,700|Nunito:300,400,600,700"
        rel="stylesheet">

</head>
<body>
<?php
include "../connect.php";
if (isset($_GET["email"])){
    $sql="UPDATE `users` SET `state`= 1 where `email` = ?";
    $result=$connect->prepare($sql);
    $result->bindValue(1,$_GET["email"]);
    if ($result->execute()){
        echo '
        <div class="noti_All">
    <div class="check_active_div"><i class="fas fa-check-circle check_active_user"></i></div>
    <div class="dis_center">
        <div class="noti_title">حساب شما با موفقیت فعال شد .</div>
        <div class="noti_txt">از هم اکنون میتوانید خرید های خود را انجام دهید .</div>
    </div>
    <div><a href="../login.php" class="a_link">ورود به پنل کاربری</a></div>
    <div><a href="../index.php" class="a_link">صفحه اصلی</a></div>
</div>
        ';
    }
    else{
        echo '
        <div class="noti_All">
    <div class="check_active_div"><i class="fas fa-times-circle check_active_user"></i></div>
    <div class="dis_center">
        <div class="noti_title">خطا در فعال سازی حساب .</div>
        <div class="noti_txt">لطفا بعدا تلاش کنید .</div>
    </div>
    <div><a href="../login.php" class="a_link">ورود به پنل کاربری</a></div>
    <div><a href="../index.php" class="a_link">صفحه اصلی</a></div>
</div>
        ';
    }
}
else{
    header("location: ../signup.php?Active_Error=2060");
    die();
}
?>

</body>
</html>