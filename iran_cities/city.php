<?php
include "../connect.php";
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];
    $sqlcities = "select * from city where province_id= ?";
    $cities = $connect->prepare($sqlcities);
    $cities->bindValue(1,$id);
    $cities->execute();
    while ($result = $cities->fetch(PDO::FETCH_ASSOC)) {
        echo '  <option value=' . $result['id'] . '>' . $result['name'] . '</option>';
    }
} else {
    header('location:../index.php');
    die();
}