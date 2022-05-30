<?php
session_start();
$id = isset($_GET['id']) ? $_GET['id'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

$quantity = $quantity <= 0 ? 1 : $quantity;

$cart_item = array(
    'quantity' => $quantity  
);

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

if(array_key_exists($id, $_SESSION['cart'])){
    header('Location: product.php?id=' . $id);
}else{
    $_SESSION['cart'][$id] = $cart_item;
    header('Location: product.php?id='. $id);
}
?>