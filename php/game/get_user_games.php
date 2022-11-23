<?php

	require_once "../connect.php";

	$user_id = $_GET['user_id'];

	$query = "
		SELECT
			game_id, start_date, is_moved
		FROM player
		JOIN game USING(game_id)
		WHERE user_id = {$user_id}
	";

	$games = mysqli_fetch_all(mysqli_query($connect, $query), MYSQLI_ASSOC);

	echo json_encode($games);
