<?php
	/*
		Скрипт для взаимодействия с таблицей игроков (Player).

		GET-запрос с переданными user_id (ID пользователя) и game_id (ID игры) возвращает player_id (ID игрока).

		Пример:
		{"player_id": 3}
	*/

	header('Content-Type: application/json; charset=utf-8');

	require_once "../connect.php";

	
	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$sql = "
			SELECT player_id
			FROM Player
			WHERE user_id = {$_GET['user_id']} and game_id = {$_GET['game_id']}";
		$query = $connect->query($sql)->fetch_assoc();

		echo json_encode($query);
	}
	else
	{
		echo 'метод не существует';
	}