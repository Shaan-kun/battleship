<?php
    session_start();

    if (isset($_SESSION['user']))
    {
        header('Location: ../rating.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="other/main.css">
</head>
<body>
    <!--Форма Регистрации -->
    <form action="vendor/signup.php" method="post" enctype="multipart/form-data">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">

        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите электронную почту">

        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> ограничение на размер файла -->
        <label>Изображение профиля</label>
        <input type="file" name="avatar"> 

        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите свой пароль">
        
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder ="Подтвердите пароль">
        
        <button type="submit">Создать аккаунт</button>
        
        <p>
            Уже есть аккаунт? <a href='index.php'>Авторизируйтесь</a>!
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