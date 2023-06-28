<?php

session_start();
if (isset($_SESSION["admin_Login"])){


include "../connect.php";
session_start();
$sql="UPDATE `cat` SET `name`=?,`subcat`=? WHERE `id`=?";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["name"]);
$result->bindValue(2,$_POST["cat"]);
$result->bindValue(3,$_SESSION["id-cat"]);
if ($result->execute()){
    echo 'ok';
}else{
    echo 'no';
}

}else{
    header("location: ../../404.php");
    die();
}
?>