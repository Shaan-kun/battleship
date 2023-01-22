<?
session_start();
require_once './connect.php';

if (!isset($_SESSION['user'])) {
    die('forbidden');
}

$user_id = $_SESSION['user']['user_id'];


if (isset($_POST['recipient'])) {
    $recipient = $_POST['recipient'];
}

if (isset($_POST['act'])){
    $act = $_POST['act'];
    switch ($act) {
        case 'add':
            $r = mysqli_query($connect, "SELECT * FROM friendship WHERE friendship_sender = {$user_id} AND friendship_recipient = {$recipient}");
            if (mysqli_num_rows($r) == 1) {
                header('Location: /friends');
                exit();
            } else {
                mysqli_query($connect, "INSERT INTO `friendship`(`friendship_sender`, `friendship_recipient`) VALUES ('{$user_id}','{$recipient}')");
                header('Location: /friends');
                exit();
            }
        case 'add-name':
            $r = mysqli_query($connect, "SELECT `user_id` FROM `user` WHERE `login` = '{$recipient}'");
            if (mysqli_num_rows($r) == 1){
                $recipient = mysqli_fetch_array($r)[0];
            } else {
                header('Location: /friends');
                exit();
            }

            $r = mysqli_query($connect, "SELECT * FROM friendship WHERE friendship_sender = {$user_id} AND friendship_recipient = {$recipient}");
            if (mysqli_num_rows($r) == 1) {
                header('Location: /friends');
                exit();
            } else {
                mysqli_query($connect, "INSERT INTO `friendship`(`friendship_sender`, `friendship_recipient`) VALUES ('{$user_id}','{$recipient}')");
                header('Location: /friends');
                exit();
            }
        case 'remove':
            mysqli_query($connect, "DELETE FROM `friendship` WHERE (friendship_sender = {$user_id} AND friendship_recipient = {$recipient}) OR (friendship_sender = {$recipient} AND friendship_recipient = {$user_id})");
            header('Location: /friends');
            exit();
        default:
            header('Location: /friends');
            exit();
    }
}

exit();
