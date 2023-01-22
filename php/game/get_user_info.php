<?php
	require_once '../connect.php';

    if (isset($_GET['id'])){
        $request_user = $_GET['id'];
    
        $query = "
            SELECT
                user_id, login, reg_date, avatar, description, game_count, game_win, game_loss, score
            FROM User
            WHERE user_id = '$request_user'
        ";
    
        $user = mysqli_fetch_assoc(mysqli_query($connect, $query));
    
        echo json_encode($user);
    } else {
        echo 'error';
    }
    