<?php
session_start();
if (isset($_SESSION["admin_Login"])){
?>


<body>
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
<div id="jadval">
    <table class="table table-hover table-bordered">
        <tr class="tbl_tr">
            <td>#</td>
            <td>کد دسته</td>
            <td>نام دسته</td>
            <td>زیر شاخه</td>
            <td>بروزرسانی</td>
        </tr>
        <?php
        include "../connect.php";
        $i=1;
        $sql="SELECT * FROM `cat` ORDER BY `cat`.`id` DESC";
        $result=$connect->query($sql);
        $rows=$result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row)
        {
            echo '
            <tr class="border-warning">
            <td>'.$i.'</td>
            <td>'.$row["id"].'</td>
            <td>'.$row["name"].'</td>
           ';
            if ($row["subcat"] == 0){
                echo '<td class="empty_td">زیر شاخه ندارد .</td>';
            }
            else{
                echo '<td> زیر شاخه کد :  '.$row["subcat"].'</td>';
            }
            echo '
            <td><a href="#" class="update-cat stClass" id='.$row["id"].'>بروز رسانی <i class="fas fa-file-signature"></i></a></td>
            </tr>
            ';
            $i++;
        }

        ?>
    </table>
</div>
</body>


    <?php
}else{
    header("location: ../../404.php");
    die();
}