<?php
session_start();
if (isset($_SESSION["admin_Login"])){
?>

<html lang="en">
<head>
    <script src="../../assets/js/admin/jquery.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/admin/admin-All.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Josefin+Sans:300,400,600,700|Nunito:300,400,600,700" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="All-user-manager">
    <ul>
        <a href="add-contact.php">
            <li>
                <i class="fas fa-file-medical"></i>
                اضافه نمودن راه ارتباطی
            </li>
        </a>
        <a href="delete-contact.php">
            <li>
                <i class="fas fa-file-excel"></i>
                حذف نمودن نمودن راه ارتباطی
            </li>
        </a>
        <a href="update-contact.php">
            <li>
                <i class="fas fa-file-signature"></i>
                ویرایش نمودن اطلاعات راه ارتباطی
            </li>
        </a>
        <a href="show-contact.php">
            <li>
                <i class="fas fa-file-alt"></i>
                مشاهده اطلاعات راه ارتباطی با ما
            </li>
        </a>
    </ul>
</div>
</body>
</html>

    <?php
}else{
    header("location: ../../404.php");
    die();
}

