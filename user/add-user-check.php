<html>
<head>
    <script src="../assets/js/java.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/rtl-style.css">
</head>
<body>


<?php
session_start();
include "../connect.php";
include "../jdf.php";
include '../PHPMailer-5.2-stable/class.phpmailer.php';

$sql = "INSERT INTO `users`(`id`, `fname`, `lname`, `email`, `password`, `phone`, `register_date`, `state`) VALUES (NULL , ?, ?, ?, ?, 0, ?, 1)";
$result = $connect->prepare($sql);
$result->bindValue(1, $_POST["fname"]);
$result->bindValue(2, $_POST["lname"]);
$result->bindValue(3, $_POST["email"]);
$result->bindValue(4, md5($_POST["password"]));
$result->bindValue(5, jdate("j F y"));

if ($_SESSION["code"] == $_POST["captcha"]) {
    if ($result->execute()) {
        header("location:../my-account.php");
        die();
//
//        $_SESSION["email"] = $_POST["email"];
//
//        //فایل بارگذاری خودکار
//
////فراخوانی کلاس
//        $mail = new PHPMailer(true);
//
////استفاده از SMTP
//        $mail->IsSMTP();
//
//        try {
//            //آدرس سرور ایمیل
//            $mail->Host = "smtp.gmail.com";
//
//            //استفاده از پروتکل های رمزنگاری
//            $mail->SMTPSecure = 'ssl';
//
//            //پورت ارسال ایمیل
//            $mail->Port = 587;
//
//            //استفاده از SMTP Authentication
//            $mail->SMTPAuth = true;
//
//            //نام کاربری و کلمه عبور حساب گوگل
//            $mail->Username = "hwow110@gmail.com";
//            $mail->Password = "DRhamed132";
//
//            //افزودن قسمت پاسخ به ایمیل
//            $mail->AddReplyTo('hwow110@gmail.com', 'Reply Name');
//
//            //تنظیم اطلاعات گیرنده ایمیل
//            $mail->AddAddress($_POST["email"]);
//
//            //تنظیم اطلاعات ارسال کننده ایمیل
//            $mail->SetFrom('hwow110@gmail.com', 'وب شاپ ');
//
//            //موضوع ایمیل ارسالی
//            $mail->Subject = 'فعال سازی حساب کاربری';
//
//            //متن برای کاربرانی که به دلایل فنی نمی توانند ایمیل را به درستی مشاهده کنند
//            $mail->AltBody = 'برنامه شما از این ایمیل پشتیبانی نمی کند، برای مشاهده آن لطفا از برنامه دیگری استفاده نمائید';
//
//            //یونیکد برای پشتیبانی از زبان فارسی
//            $mail->CharSet = 'UTF-8';
//
//            //امکان استفاده از تگ های HTML
//            $mail->ContentType = 'text/html';
//
//            //متن پیام به صورت HTML
//            $mail->MsgHTML('
//            <div style="width: 60%;height: auto;margin: 90px auto;border-radius: 5px;border: 2px solid rgba(0, 154, 194, 0.57);padding-bottom: 30px; ">
//    <div style="font-size: 22px;color: #0E93D8;margin: 25px;font-weight: bold;"> فعال سازی حساب کاربری  .</div>
//    <div style="font-size: 17px;color: #005b89;margin: 40px 25px;font-weight: bold;">جهت فعال سازی حساب خود روی لینک زیر کلیک کنید .</div>
//    <div><a href="http://localhost/webshop/user/active.php?email=' . $_POST["email"] . '" style="font-size: 16px;color: #003b57;font-weight: bold;margin: 40px 25px;">لینک فعال سازی حساب کاربری</a></div>
//</div>
//            ');
//
//            // ضمیمه کردن فایل به ایمیل
//            //$mail->AddAttachment('path/to/file/phpbook.zip');
//
//            //ارسال ایمیل
//            $mail->Send();
//
//            //چاپ نتیجه موفقیت آمیز
//
//            ?>
<!--            <div class="noti_All">-->
<!--                <div class="noti_title">حساب شما با موفقیت ساخته شد .</div>-->
<!--                <div class="noti_title">ایمیل فعال سازی حساب کاربری به ایمیل شما ارسال شد .</div>-->
<!--                <div class="noti_txt">جهت فعال سازی به ایمیل خود مراجعه کنید و روی لینک فعال سازی حساب کاربری کلیک کنید-->
<!--                    .-->
<!--                </div>-->
<!--                <div><a href="../login.php" class="a_link">ورود به پنل کاربری</a></div>-->
<!--                <div><a href="../index.php" class="a_link">صفحه اصلی</a></div>-->
<!--            </div>-->
<!--            --><?php
//        } catch (phpmailerException $e) {
//            //پیام خطا از PHPMailer
//            echo $e->errorMessage();
//        } catch (Exception $e) {
//            //سایر خطاها
//            echo $e->getMessage();
//        }
//

    } // execute
    else {
        header("location:../signup.php?failed_insert=3060");
        die();
    }

} /** $_SESSION["code"] */
else {
    header("location:../signup.php?captchaError=4060");
    die();
}
?>
</body>
</html>
