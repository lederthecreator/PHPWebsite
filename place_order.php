<?php
// start session
session_start();
//unset($_SESSION['cart']);
// set page title
$page_title="Спасибо за покупку!";
 
// include page header HTML
include_once 'layout_header.php';
 
echo "<div class='col-md-12'>";
 
    // tell the user order has been placed
    echo "<div class='alert alert-success'>";
        echo "<strong>Вы успешно приобрели товар, в скором времени мы приедем к вам за деньгами</strong> Спасибо за выбор нашей компании!";
    echo "</div>";

    $ids = array_keys($_SESSION['cart']);
    $count_of_ids = count(array_keys($_SESSION['cart']));
    for($i = 0; $i < $count_of_ids; $i +=1){
        echo "<div class='card'>";
            echo "<div class='card-body'>";
                echo "<a class='btn btn-primary w-100-pct' href='uploads/files/" . $ids[$i] . ".rar'>Скачать файл</a>";
            echo "</div>";
        echo "</div>";
    }

    unset($_SESSION['cart']);
 
echo "</div>";
 
// include page footer HTML
include_once 'layout_footer.php';
?>