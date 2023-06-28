<?php
session_start();
if (isset($_SESSION["admin_Login"])){
    ?>

    <head>
        <script src="../../assets/js/admin/jquery.js"></script>
        <script src="../../assets/js/admin/Admin-All.js"></script>
        <link rel="stylesheet" href="../../assets/css/admin/admin-All.css">
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/css/rtl-style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Josefin+Sans:300,400,600,700|Nunito:300,400,600,700" rel="stylesheet">
    </head>
<?php

include "../connect.php";
$sql="delete from users where id= ?";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["id"]);
if($result->execute())
{
    echo '
    <table class="table table-hover table-bordered">
        <tr class="tbl_tr">
            <td>#</td>
            <td>نام و نام خانوادگی</td>
            <td>نام کاربری</td>
            <td>ایمیل</td>
            <td>حذف</td>
        </tr>';

    $i=1;
    $sql="select * from users";
    $result=$connect->query($sql);
    $rows=$result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row)
    {
        echo '
            <tr class="border-warning">
            <td>'.$i.'</td>
            <td>'.$row["fname"].' '.$row["lname"].'</td>
            <td>'.$row["username"].'</td>
            <td>'.$row["email"].'</td>
            <td><a href="#" class="delete stClass" id='.$row["id"].'>حذف <i class="fas fa-user-minus"></i></a></td>
            </tr>
            ';
        $i++;
    }

    echo '
    </table>
            ';
}
else
{
    echo 'no';
}

}else{
    header("location: ../../404.php");
    die();
}
?>