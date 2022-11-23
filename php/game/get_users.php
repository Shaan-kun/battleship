<?php

	require_once '../connect.php';

	$query = "
		SELECT
			user_id, login, reg_date, game_count, game_win, game_loss, score
		FROM User
	";

	$users = mysqli_fetch_all(mysqli_query($connect, $query), MYSQLI_ASSOC);

	echo json_encode($users);
	