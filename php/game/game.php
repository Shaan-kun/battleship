<?php
	/*
		Скрипт для взаимодействия с таблицей игр (Game).


		Простой GET-запрос возвращает список всех игр,
		к которым можно присоединиться.

		Пример:
		[
		    {
		        "game_id": "1",
		        "start_date": "2022-11-23 19:14:53",
		        "login": "nagibator"
		    },
		    ...
		]


		GET-запрос с переданным game_id возвращает данные конкретной игры

		Пример:
		{
		    "game_id": "1",
		    "is_start": "0",
		    "is_end": "0",
		    "move_count": "0"
		}


		POST-запрос с переданным user_id создаёт игру, добавляет в неё
		пользователя и возвращает данные и статус.

		Пример тела запроса:
		{"user_id": 1}

		Пример ответа:
		{
		    "game_id": 24,
		    "player_id": 27,
		    "status": true
		}


		POST-запрос с переданным user_id и game_id добавляет пользователя
		в игру, если она создана, и возвращает статус.
		
		Пример тела запроса:
		{
		    "user_id": 1,
		    "game_id": 2
		}

		Пример ответа:
		{"status": true}
	*/

	header('Content-Type: application/json; charset=utf-8');

	require_once "../connect.php";


	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$data = isset($_POST['user_id']) ? $_POST : json_decode(file_get_contents('php://input'), true);

		$status = true;

		// если передан game_id, то это запрос на присоединение к игре
		if (isset($data['game_id']))
		{
			// присоединяем пользователя к игре

			$sql = "
				INSERT INTO
					Player(user_id, game_id)
				VALUES
					({$data['user_id']}, {$data['game_id']})
			";
			$connect->query($sql);

			$status = $status and !$connect->error;

			echo json_encode(['status' => $status]);

			return null;
		}

		// если передан только user_id, то создаём игру

		$sql = "INSERT INTO Game(start_date) VALUES (NOW())";
		$connect->query($sql);

		$game_id = $connect->insert_id;

		// теперь создаём игрока

		$sql = "
			INSERT INTO
				Player(user_id, game_id)
			VALUES
				({$data['user_id']}, {$game_id})
		";
		$connect->query($sql);

		$status = $status and !$connect->error;

		$player_id = $connect->insert_id;

		echo json_encode([
			'game_id' => $game_id,
			'player_id' => $player_id,
			'status' => $status,
		]);
	}
	elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		if (isset($_GET['game_id']))
		{
			// данные конкретной игры

			$sql = "
				SELECT
					game_id, is_start, is_end, move_count
				FROM Game
				WHERE game_id = {$_GET['game_id']}
			";
			$query = $connect->query($sql)->fetch_assoc();

			echo json_encode($query);
		}
		else
		{
			// список всех неначатых игр и логин их создателя

			$sql = "
				SELECT
					game_id, start_date, login
				FROM Player
				LEFT JOIN Game USING(game_id)
				LEFT JOIN User USING(user_id)
				WHERE is_start = FALSE
			";
			$query = $connect->query($sql)->fetch_all(MYSQLI_ASSOC);

			echo json_encode($query);
		}
	}
	else
	{
		echo 'метод не существует';
	}
