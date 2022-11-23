<?php

	require_once "../connect.php";

	// создание игры

	$query = "
		INSERT INTO
			Game(start_date, move_count)
		VALUES
			(NOW(), 0)
	";

	mysqli_query($connect, $query);

	// создание игрока

	$user_id = $_POST["user_id"];
	$game_id = mysqli_insert_id($connect);

	$query = "
		INSERT INTO
			Player(user_id, game_id)
		VALUES
			({$user_id}, {$game_id})
	";

	mysqli_query($connect, $query);

	// подтверждение, что игра создана

	$player_id = mysqli_insert_id($connect);

	echo json_encode([
		"game_id" => $game_id,
		"player_id" => $player_id,
	]);

	// header("Location: ../php/game/my_games.php");
