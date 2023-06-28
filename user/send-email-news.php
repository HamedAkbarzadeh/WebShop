<?php
session_start();
if (isset($_SESSION["email_Login"])) {

    include "../jdf.php";
    include "../connect.php";

    $sql = "INSERT INTO `email_news`(`id`, `user`, `email`) VALUES (NULL , ? , ?)";
    $result = $connect->prepare($sql);
    $result->bindValue(1,$_SESSION["email_Login"]);
    $result->bindValue(2,$_POST["email_news"]);
    $result->execute();

}else{
    echo 'no';
}

