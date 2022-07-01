<?php
session_start();
 
include_once "config/database.php";
include_once "objects/product.php";
include_once "objects/product_image.php";
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
$product_image = new ProductImage($db);
 
$id = isset($_GET['id']) ? $_GET['id'] : die('ОШИБКА СТОП НОЛЬ НОЛЬ НОЛЬ.');
 
$product->id = $id;
 
$product->readOne();

$page_title = $product->name;

$product_image->product_id=$id;

$stmt_product_image = $product_image->readByProductId();

$num_product_image = $stmt_product_image->rowCount();

include_once 'layout_header.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";
if($action=='purchased'){
    echo "</div>";
    echo "<div class='alert alert-info'>";
        echo "Вы уже приобрели этот товар. Перейти в <a href='profile.php'>профиль.</a>";
    echo "</div>";
}
 
echo "<div class='col-md-1'>";
    if($num_product_image>0){
        while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
            $product_image_name = $row['name'];
            $source="uploads/images/{$product_image_name}";
            echo "<img src='{$source}' class='product-img-thumb' data-img-id='{$row['id']}' />";
        }
    }else{ echo "Нет изображений."; }
echo "</div>";
 
echo "<div class='col-md-4' id='product-img'>";
 
    $stmt_product_image = $product_image->readByProductId();
    $num_product_image = $stmt_product_image->rowCount();
 
    if($num_product_image>0){
        $x=0;
        while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
            $product_image_name = $row['name'];
            $source="uploads/images/{$product_image_name}";
            $show_product_img=$x==0 ? "display-block" : "display-none";
            echo "<a href='{$source}' target='_blank' id='product-img-{$row['id']}' class='product-img {$show_product_img}'>";
                echo "<img src='{$source}' style='width:100%;' />";
            echo "</a>";
            $x++;
        }
    }else{ echo "Нет изображений."; }
echo "</div>";
 
echo "<div class='col-md-5'>";
 
    echo "<div class='product-detail'>Цена:</div>";
    echo "<h4 class='m-b-10px price-description'>$" . number_format($product->price, 2, '.', ',') . "</h4>";
 
    echo "<div class='product-detail'>Описание товара:</div>";
    echo "<div class='m-b-10px'>";
        $page_description = htmlspecialchars_decode(htmlspecialchars_decode($product->description));
         echo $page_description;
         if($id != 5){
             echo "<br><a href='https://developer.microsoft.com/ru-ru/windows/downloads/windows-sdk/' class='btn btn-info'>Скачать SDK</a>";
         }else{
             echo "<br><a href='https://www.python.org/downloads/' class='btn btn-info'>Скачать Python3</a>";
         }
    echo "</div>";
 
echo "</div>";

echo "<div class='col-md-2'>";
 
    if(array_key_exists($id, $_SESSION['cart'])){
        echo "<div class='m-b-10px'>Товар уже в вашей корзине.</div>";
        echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
            echo "Изменить корзину";
        echo "</a>";
 
    }
    else{
 
        echo "<form class='add-to-cart-form' action='product_add_to_cart.php' method='GET'>";
            echo "<div class='product-id display-none'>{$id}</div>";
            echo "<input type='hidden' name='id' value='$id' />";
            echo "<div class='m-b-10px f-w-b'>Количество:</div>";
            echo "<input type='number' name='quantity' value='1' class='form-control m-b-10px cart-quantity' min='1' />";
 
            echo "<button style='width:100%;' class='btn btn-primary add-to-cart m-b-10px'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Купить";
            echo "</button>";
 
        echo "</form>";
    }
echo "</div>";

include_once 'layout_footer.php';
?>