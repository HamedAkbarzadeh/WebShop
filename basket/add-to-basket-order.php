<?php
session_start();
if (isset($_SESSION["email_Login"])){
    include '../connect.php';

    $sql="INSERT INTO `cut_order`(`id`, `id_basket`, `user`, `count`, `width`, `height`, `fa_width`, `fa_height`, `na_width`, `na_height`, `r_code`) VALUES (NULL , ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)";
    $result=$connect->prepare($sql);
    $result->bindValue(1,$_SESSION["id_basket"]);
    $result->bindValue(2,$_SESSION["email_Login"]);
    $result->bindValue(3,$_POST["count"]);
    $result->bindValue(4,$_POST["width"]);
    $result->bindValue(5,$_POST["height"]);
    $result->bindValue(6,$_POST["fa_width"]);
    $result->bindValue(7,$_POST["fa_height"]);
    $result->bindValue(8,$_POST["na_width"]);
    $result->bindValue(9,$_POST["na_height"]);
    $result->bindValue(10,$_POST["r_code"]);
    if ($result->execute()){

        $sql2 = "SELECT * FROM `cut_order` where `user` = ? and `id_basket` = ? and `r_code`= ?";
        $result2 = $connect->prepare($sql2);
        $result2->bindValue(1, $_SESSION["email_Login"]);
        $result2->bindValue(2, $_SESSION["id_basket"]);
        $result2->bindValue(3, $_POST["r_code"]);
        $i=0;
        if ($result2->execute()) {
            $rows2 = $result2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows2 as $row2) {
                $i++;
                echo '
                                <tr class="tr-recorde-cut">
                                    <td class="number-cut">'.$i.'</td>
                                    <td>'.$row2["count"].'</td>
                                    <td>'.$row2["width"].'</td>
                                    <td>'.$row2["height"].'</td>
                                    <td>'.$row2["fa_width"].'</td>
                                    <td>'.$row2["fa_height"].'</td>
                                    <td>'.$row2["na_width"].'</td>
                                    <td>'.$row2["na_height"].'</td>
                                    </tr>
                                            ';
            }
        }
    }

}else{
    header("location: ../404.php");
    die();
}