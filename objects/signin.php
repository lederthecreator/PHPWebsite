<?php
    session_start();
    require_once "../config/database.php";
    $database = new Database();
    $db = $database->getConnection();
    
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $stmt = $db->prepare("SELECT * FROM users WHERE login = '$login' AND password = '$password'");
    $stmt->execute();
    $count = $stmt->rowCount();
    if($count > 0){
       $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);
       
       $_SESSION['user'] = [
        "id" => $user[0]['id'],
        "full_name" => $user[0]['fullname'],
        "login" => $user[0]['login'],
        "avatar" => $user[0]['avatar'],
        "email" => $user[0]['email']
    ];
       
        if($user[0]['login'] === "admin"){
            header('Location: ../admin_panel.php');
        }

       header('Location: ../profile.php');
    }
    else{
        $_SESSION['message'] = "Неверный логин или пароль"; 
        header('Location: ../authorization.php');
    }
?>

<pre>
    <?= print_r($user) ?>
    <?= print_r($_SESSION['user']) ?>
</pre>