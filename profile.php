<?php
session_start();
$page_title = $_SESSION['user']['login'];
include 'layout_header.php';
require 'config/database.php';
require 'objects/product.php';
require 'objects/product_image.php';
?>
<section>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?= $_SESSION['user']['avatar'] ?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
            <h5 class="my-3"><?= $_SESSION['user']['login'] ?></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">ФИО</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $_SESSION['user']['full_name'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $_SESSION['user']['email'] ?></p>
              </div>
            </div>
            <div class="row">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>Покупки</h1>
        </div>
      </div>
    </div>
      <?php 
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare("SELECT * FROM `users` WHERE `id` =".$_SESSION['user']['id']);
        $stmt->execute();
        $count = $stmt->rowCount();
        $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $links = explode(';',$user[0]['links']);
        $count = count($links);
        for($i = 0; $i < $count - 1; $i+=3){
          
          //echo "<div class='card' style='width = 18rem;'>$product->name</div>";
          //echo "<a class='btn btn-primary ' href='uploads/files/" . $links[$i] . ".rar'>Товар " . $links[$i] . "</a>";
          echo "<div class='row'>";
          $j_count = (count($links) - 1 > 3) ? 3 : count($links) - 1;
          for($j = 0; $j < $j_count; $j+=1){
            if($i + $j  == $count - 1) break;
            $product = new Product($db);
            $product->id = $links[$i + $j];
            $product->readOne();
            echo "<div class='col-sm-4'>";
              echo "<div class='panel'>";
                echo "<div class='panel-body'>";
                  echo "<h5 class='panel-title'><strong>" . $product->name . "</strong></h5>";
                  echo "<div class='row'><div class='col-sm-4'></div></div>";
                  echo "<p class='panel-text'>" . htmlspecialchars_decode(htmlspecialchars_decode($product->description)) . "</p>";
                  echo "<a class='btn btn-primary' href='uploads/files/" . $links[$i + $j] . ".rar'> Скачать </a>";
                echo "</div>";
              echo "</div>";
            echo "</div>";
          }
          echo "</div>";
        }
      ?>
</section>
<?php
include 'layout_footer.php';
?>