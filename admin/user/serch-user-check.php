<?php
session_start();
if (isset($_SESSION["admin_Login"])){
?>

<html>
<head>

    <script src="../../assets/js/admin/jquery.js"></script>
    <script src="../../assets/js/admin/Admin-All.js"></script>
    <link rel="stylesheet" href="../../assets/css/admin/admin-All.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/rtl-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Josefin+Sans:300,400,600,700|Nunito:300,400,600,700" rel="stylesheet">


</head>
<body>
<?php
include '../connect.php';
$sql="select * from `users` where `email` = ?";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["data"]);
if ($result->execute()){
    echo '';
}
$tedad=$result->rowCount();
$data=$result->fetch(PDO::FETCH_OBJ);

if ($tedad == 0)
{
?>
    <div class="msg-minus minus" id="msg-minus">
        <span id="msg-m"></span>
        <div class="full_bottomBorder"></div>
    </div>
    <table class="table table-hover table-bordered">
        <tr class="tbl_tr">
            <td>#</td>
            <td>نام و نام خانوادگی</td>
            <td>نام کاربری</td>
            <td>ایمیل</td>
            <td>شماره تلفن</td>
            <td>تاریخ ثبت نام</td>
        </tr>
        <?php
        $i=1;
        $sql2="select * from users";
        $result2=$connect->query($sql2);
        $rows2=$result2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows2 as $row2)
        {
            echo '
            <tr class="border-warning">
            <td>'.$i.'</td>
            <td>'.$row2["fname"].' '.$row2["lname"].'</td>
            <td>'.$row2["username"].'</td>
            <td>'.$row2["email"].'</td>
            <td>'.$row2["phone"].'</td>
            <td>'.$row2["register_date"].'</td>
            </tr>
            ';
            $i++;
        }

        ?>
    </table>
<?php
}
else{
    $i=1;
    echo '
        <table class="table table-hover table-bordered">
        <tr class="tbl_tr">
            <td>#</td>
            <td>نام و نام خانوادگی</td>
            <td>ایمیل</td>
            <td>شماره تلفن</td>
            <td>تاریخ ثبت نام</td>
        </tr>
        <tr>
            <td>'.$i.'</td>
            <td>'.$data->fname.' '.$data->lname.'</td>
            <td>'.$data->email.'</td>
            <td>'.$data->phone.'</td>
            <td>'.$data->register_date.'</td>

        </tr>
    </table>
    ';
    $i++;
}
?>


</body>
</html>
    <?php
}else{
    header("location: ../../404.php");
    die();
}
