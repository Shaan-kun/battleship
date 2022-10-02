<?php

    session_start();
    require_once '../connect.php';

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password !== $password_confirm)
    {
        $_SESSION['message'] = 'Пароли не совпадают!';
        header('Location: ../../reg.php');
    }
    else
    {
        $path = '../../images/avatars/'; // путь для сохранения аватарок
        $avatar = time() . '.' . pathinfo($_FILES['avatar']['name'],  PATHINFO_EXTENSION); // даём аватарке уникальное имя

        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $path . $avatar))
        {
           $_SESSION['message'] = 'Ошибка при загрузке сообщения';
           header('Location: ../../reg.php');
        }

        $password = md5($password); // хэшируем пароль

        $query = "
            INSERT INTO User
                (login, password, email, reg_date, avatar)
            VALUES
                ('$login', '$password', '$email', NOW(), '$avatar')
        ";

        mysqli_query($connect, $query);

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../../index.php');
    }
