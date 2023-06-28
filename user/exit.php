<?php
session_start();
unset($_SESSION["email_Login"]);
header("location: ../index.php");
die();
?>