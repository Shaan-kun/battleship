<?php
	
	// возможно, стоит передавать user_id

	require_once "../connect.php";

	$query = "
		SELECT
			game_id, login, start_date
		FROM Player
		LEFT JOIN Game USING(game_id)
		LEFT JOIN User USING(user_id)
		WHERE move_count = 0
	";

	$games = mysqli_fetch_all(mysqli_query($connect, $query), MYSQLI_ASSOC);

	echo json_encode($games);
