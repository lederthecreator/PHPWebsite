
<?php 
    session_start();
    $page_title = "Авторизация";
    include 'layout_header.php';
 ?>

<form action="objects/signin.php" method="post">
  <div class="form-outline mb-4">
      <label class="form-label" for="form2Example1">Логин</label>
    <input type="text" name="login" id="form2Example1" class="form-control" />
  </div>

  <div class="form-outline mb-4">
      <label class="form-label" for="form2Example2">Пароль</label>
    <input type="password" name="password" id="form2Example2" class="form-control" />
  </div>

  <!-- 2 column grid layout for inline styling -->

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Войти</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Не зарегистрированы?<a href="registration.php">Регистрация</a></p>
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
include 'layout_footer.php'
?>