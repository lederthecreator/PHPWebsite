<?php 
session_start();
$page_title = "Регистрация";
include 'layout_header.php';
?>

<form action="objects/signup.php" method="POST" enctype="multipart/form-data">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example1">Полное имя</label>
    <input type="text" id="form2Example1" name="full_name" class="form-control" />
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Логин</label>
    <input type="text" id="form2Example2" name="login" class="form-control" />
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example3">Адрес электронной почты</label>
    <input type="text" id="form2Example3" name="email" class="form-control" />
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example4">Изображение профиля</label>
    <input type="file" id="form2Example4" name="avatar" class="form-control" />
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example5">Пароль</label>
    <input type="password" id="form2Example5" name="password" class="form-control" />
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example5">Повторите пароль</label>
    <input type="password" id="form2Example5" name="password_confirm" class="form-control" />
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example5"></label>
    <!--<input type="password" id="form2Example5" class="form-control" /> -->
  </div>

  <button class="btn btn-primary btn-block mb-4">Зарегистрироваться</button>

  <div class="text-center">
    <p>Уже зарегистрированы? <a href="authorization.php">Авторизуйтесь!</a></p>
  </div>

  <?php
    if(array_key_exists('message', $_SESSION)){
        echo "<div class='alert alert-danger'>";
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        echo "</div>";
      }
      
      if(array_key_exists('success', $_SESSION)){
        echo "<div class='alert alert-success'>";
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        echo "</div>";
      } 
  
  ?>
</form>

<?php
include 'layout_footer.php';
?>