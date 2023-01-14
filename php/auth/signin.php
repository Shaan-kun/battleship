<?php

    session_start();
    require_once '../connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM User WHERE login = '$login' AND password = '$password'");

    if (mysqli_num_rows($check_user) > 0)
    {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            'user_id' => $user['user_id'],
            'login' => $user['login'],
            'email' => $user['email'],
            'reg_date' => $user['reg_date'],
            'avatar' => $user['avatar'],
            'description' => $user['description'],
            'game_count' => $user['game_count'],
            'game_win' => $user['game_win'],
            'game_loss' => $user['game_loss'],
            'score' => $user['score'],
        ];

        header('Location: ../../index.php');

    }
    else
    {
        $_SESSION['message'] = 'Неверный логин или пароль!';
        header('Location: ../../index.php');
    }
