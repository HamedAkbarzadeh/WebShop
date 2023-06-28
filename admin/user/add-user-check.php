<?php
session_start();
if (isset($_SESSION["admin_Login"])){

include "../connect.php";
include "../../jdf.php";

$passowrd = md5($_POST["password"]);
$sql = "INSERT INTO `users`(`id`, `fname`, `lname`, `email`, `password`, `phone`, `register_date`, `state`) VALUES (NULL ,?,?,?,?,'09',?,1)";
$result = $connect->prepare($sql);
$result->bindValue(1, $_POST["fname"]);
$result->bindValue(2, $_POST["lname"]);
$result->bindValue(3, $_POST["email"]);
$result->bindValue(4, $passowrd);
$result->bindValue(5,jdate("j F y"));
if ($result->execute()) {
    echo 'ok';
}
else{
    echo 'no';
}

}else{
    header("location: ../../404.php");
    die();
}