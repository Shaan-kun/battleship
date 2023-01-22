<?php
session_start();
require_once './connect.php';

if (!isset($_SESSION['user'])) {
    die();
}

$id = $_SESSION['user']['user_id'];
$description = mysqli_real_escape_string($connect, $_POST['description']);
$avatar = null;

$query = '';

if ($_FILES['avatar']['name']) { //Аналогично регистрации
    $path = '../images/avatars/'; 
    $avatar = time() . '.' . pathinfo($_FILES['avatar']['name'],  PATHINFO_EXTENSION);

    move_uploaded_file($_FILES['avatar']['tmp_name'], $path . $avatar);

    $query = "UPDATE user SET avatar = '{$avatar}', `description` = '{$description}' WHERE user_id = {$id}";

    $_SESSION['user']['avatar'] = $avatar;

} else {
    $query = "UPDATE user SET `description` = '{$description}' WHERE user_id = {$id}";
}

$_SESSION['user']['description'] = $_POST['description'];

mysqli_query($connect, $query);

header('Location: ' . $_POST['url']);