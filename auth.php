<?php
    session_start();

    if (isset($_SESSION['user']))
    {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="styles/auth.css">
</head>
<body>
    <!--Форма авторизации -->
    <form action="php/auth/signin.php" method="post">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">

        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите свой пароль">
        
        <button type="submit">Войти</button>

        <p>
            У вас нет аккаунта? <a href="reg.php">Зарегистрируйтесь</a>!
        </p>
        <p>
            Забыли пароль? Нажмите <a href="password_recovery.php">сюда</a>!
        </p>
        <?php
            if ($_SESSION['message'])
            {
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            }

            unset($_SESSION['message']);
        ?>
    </form>
</body>
</html>