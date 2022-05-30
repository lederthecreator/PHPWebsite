<?php
    session_start();
    require_once '../config/database.php';
    $database = new Database();
    $db = $database->getConnection();

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm  = $_POST['password_confirm'];

    if($password === $password_confirm){
        //$_FILES['avatar']['name']
        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if(!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)){
            $_SESSION['message'] = "Ошибка при загрузке изображения"; 
            header('Location: ../registration.php');
        }
        
        $password = md5($password);

        $query = "INSERT INTO `users` (`id`, `fullname`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')";
        $stmt = $db->prepare($query);
        $stmt->execute();

        $_SESSION['success'] = "Регистрация прошла успешно"; 
        header('Location: ../authorization.php');
    }
    else{
        $_SESSION['message'] = "Пароли не совпадают"; 
        header('Location: ../registration.php');
    }
?>