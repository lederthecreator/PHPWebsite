<?php
session_start();

$page_title="Спасибо за покупку!";
 
include_once 'layout_header.php';
require 'config/database.php';
$database = new Database();
$db = $database->getConnection();
 
echo "<div class='col-md-12'>";
 
    echo "<div class='alert alert-success'>";
        echo "<strong>Вы успешно приобрели товар, в скором времени мы приедем к вам за деньгами</strong> Спасибо за выбор нашей компании!";
    echo "</div>";

    $ids = array_keys($_SESSION['cart']);
    $count_of_ids = count(array_keys($_SESSION['cart']));
    for($i = 0; $i < $count_of_ids; $i +=1){
        echo "<div class='panel'>";
            echo "<div class='panel-body'>";
                echo "<a class='btn btn-primary w-100-pct' href='uploads/files/" . $ids[$i] . ".rar'>Скачать файл</a>";
            echo "</div>";
        echo "</div>";

        $stmt = $db->prepare("SELECT * FROM users WHERE id=" . $_SESSION['user']['id']);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(str_contains(strval($user[0]['links']) ,$ids[$i])) continue;
        $link_to_add = $ids[$i];
        $result_link = $user[0]['links'] . $link_to_add . ";";

         $query = "UPDATE users SET links = '$result_link' WHERE id =" . $_SESSION['user']['id'];
         $stmt = $db->prepare($query);
         $stmt->execute();
    }

    unset($_SESSION['cart']);
 
echo "</div>";
 
include_once 'layout_footer.php';
?>