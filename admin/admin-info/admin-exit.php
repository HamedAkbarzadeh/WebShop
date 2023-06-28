<?php
session_start();
unset($_SESSION["admin_Login"]);
header("location: ../admin-login.php");
die();