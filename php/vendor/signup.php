<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {



       $path = 'uploads/' . time() . $_FILES['avatar']['name'];
       if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
           $_SESSION['message'] = 'Ошибка при загрузке сообщения';
           header('Location: ../register.php');
       }

        mysqli_query($connect, "INSERT INTO `user` (user_id, login, password, email, avatar, reg_date, game_count, game_win, game_loss, score) VALUES (NULL,'$login','$password', '$email', '$path','1970-01-01 00:00:00.000000', NULL, NULL, NULL, NULL)");
       
        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../index.php');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../registr.php');
    }

?>
