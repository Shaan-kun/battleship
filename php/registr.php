<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">

</head>
<body>

<!--Форма Регистрации -->
<form action="vendor/signup.php" method="post" enctype="multipart/from-data">

        <label>Логин</label>
        <input type="text" name = "login" placeholder ="Введите свой логин"> 
        <label>Пароль</label>
        <input type="password" name = "password" placeholder ="Введите свой пароль">
        <label>Почта</label>
        <input type="email" name = "email" placeholder ="Введите электронную почту">
        <label>Подтверждение пароля</label>
        <input type="password" name = "password_confirm" placeholder ="Подтвердите пароль">
        <label>Изображение профиля</label>
        <input type="file" name = "avatar" placeholder ="Введите свой логин"> 
        <button>Войти</button>



        <p>
           Уже есть аккаунт? - <a href = 'index.php' > Войти </a>
</p>

<?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>



</body>
</html>