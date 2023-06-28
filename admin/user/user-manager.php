<?php
session_start();
if (isset($_SESSION["admin_Login"])){
?>
<html>
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
            <a href="add-user.php">
                <li>
                    <i class="fas fa-user-plus"></i>
                    اضافه نمودن کاربر
                </li>
            </a>
            <a href="delete-user.php">
                <li>
                    <i class="fas fa-user-minus"></i>
                    حذف نمودن نمودن کاربر
                </li>
            </a>
            <a href="update-user.php">
                <li>
                    <i class="fas fa-user-edit"></i>
                    ویرایش نمودن اطلاعات کاربر
                </li>
            </a>
            <a href="show-user.php">
                <li>
                    <i class="fas fa-users"></i>
                    مشاهده همه کاربران
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
