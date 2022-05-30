<?php
// start session
session_start();
 
// connect to database
include 'config/database.php';
 
// include objects
include_once "objects/product.php";
include_once "objects/product_image.php";
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);
 
// set page title
$page_title="Заказ";
 
// include page header html
include 'layout_header.php';


if(count($_SESSION['cart'])>0 && array_key_exists('user', $_SESSION)){
 
    // get the product ids
    $ids = array();
    foreach($_SESSION['cart'] as $id=>$value){
        array_push($ids, $id);
    }
 
    $stmt=$product->readByIds($ids);
 
    $total=0;
    $item_count=0;
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $quantity=$_SESSION['cart'][$id]['quantity'];
        $sub_total=$price*$quantity;
        echo "<div class='cart-row'>";
            echo "<div class='col-md-8'>";
 
                echo "<div class='product-name m-b-10px'><h4>{$name}</h4></div>";
                echo $quantity>1 ? "<div>{$quantity} items</div>" : "<div>{$quantity} item</div>";
 
            echo "</div>";
 
            echo "<div class='col-md-4'>";
                echo "<h4>$" . number_format($price, 2, '.', ',') . "</h4>";
            echo "</div>";
        echo "</div>";
        
        $item_count += $quantity;
        $total+=$sub_total;
    }
 
    // echo "<div class='col-md-8'></div>";
    echo "<div class='col-md-12 text-align-center'>";
        echo "<div class='cart-row'>";
            if($item_count>1){
                echo "<h4 class='m-b-10px'>Всего ({$item_count} товаров)</h4>";
            }else{
                echo "<h4 class='m-b-10px'>Всего ({$item_count} товар)</h4>";
            }
            echo "<h4>$" . number_format($total, 2, '.', ',') . "</h4>";
            echo "<a href='payment_form.php' class='btn btn-lg btn-success m-b-10px'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Купить!";
            echo "</a>";
        echo "</div>";
    echo "</div>";
 
}
else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
            echo "Не выполнен вход в аккаунт или в корзине нет товаров!";
        echo "</div>";
    echo "</div>";
}
 
include 'layout_footer.php';
?>