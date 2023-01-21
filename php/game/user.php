<?php
	/*
		Скрипт для взаимодействия с таблицей пользователей (User).

		Простой GET-запрос возвращает список данных пользователей.
		Пример:
		[
		    {
		        "user_id": "1",
		        "login": "nagibator",
		        "reg_date": "2022-11-23 19:14:52",
		        "game_count": "0",
		        "game_win": "0",
		        "game_loss": "0",
		        "score": "0.00"
		    },
		    ...
		]

		GET-запрос с переданным user_id возвращает данные этого пользователя.
		Пример:
		{
		    "user_id": "2",
		    "login": "Dominator",
		    "reg_date": "2022-11-23 19:15:28",
		    "game_count": "0",
		    "game_win": "0",
		    "game_loss": "0",
		    "score": "0.00"
		}
	*/

	header('Content-Type: application/json; charset=utf-8');

	require_once '../connect.php';


	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		if (isset($_GET['user_id']))
		{
			// получаем данные конкретного пользователя

			$sql = "
				SELECT
					user_id, login, reg_date, game_count, game_win, game_loss, score
				FROM User
				WHERE user_id = {$_GET['user_id']}
			";
			$query = $connect->query($sql)->fetch_assoc();
		}
		else
		{
			// получаем данные всех пользоваталей

			$sql = "
				SELECT
					user_id, login, reg_date, game_count, game_win, game_loss, score
				FROM User
			";
			$query = $connect->query($sql)->fetch_all(MYSQLI_ASSOC);
		}

		echo json_encode($query);
	}
	else
	{
		echo 'метод не существует';
	}