<?php
session_start();
include "../connect.php";

$sql = "SELECT * FROM `users` where email= ? and password= ?";
$result = $connect->prepare($sql);
$result->bindValue(1, $_POST["email"]);
$result->bindValue(2, md5($_POST["password"]));
$result->execute();
$count = $result->rowCount();

if ($_SESSION["code"] == $_POST["captcha"]) {
    if ($count == 1) {

        $_SESSION["email_Login"] = $_POST["email"];

        header("location: ../my-account.php");
        die();
    } else {
        header("location: ../login.php?failed_Login=2080");
        die();
    }

} else {
    header("location: ../login.php?captchaError=2060");
    die();
}
//{
//    header("location: ../my-account.php");
//    die();
//}else{
//    header("location: ../login.php?failed=2060");
//    die();
//}