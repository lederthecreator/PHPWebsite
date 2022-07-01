<?php
session_start();
require 'config/database.php';
$id = isset($_GET['id']) ? $_GET['id'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

$quantity = $quantity <= 0 ? 1 : $quantity;

$cart_item = array(
    'quantity' => $quantity  
);

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

$database = new Database();
$db = $database->getConnection();
if(array_key_exists('user', $_SESSION)){
    $stmt = $db->prepare("SELECT * FROM users WHERE id=" . $_SESSION['user']['id']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $check = false;
    $links = explode(';',$user['links']);
    $count = count($links) - 1;
    for($i = 0; $i < $count; $i+=1){
        if($links[$i] == $id) {
            $check = true;
            break;
        }
    }
}
if(array_key_exists('user', $_SESSION) && $check == 1){
    echo "check is true";
    header('Location: product.php?action=purchased&id=' . $id);
} else if(array_key_exists($id, $_SESSION['cart'])){
    header('Location: product.php?id=' . $id);
}else{
    $_SESSION['cart'][$id] = $cart_item;
    header('Location: product.php?id='. $id);
}
?>