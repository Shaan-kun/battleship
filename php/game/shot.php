<?php
	/*
		Скрипт для взаимодействия с таблицей выстрелов (Shoot).

		GET-запрос с переданным player_id возвращает список координат всех выстрелов игрока.
		
		Пример:
		[
		    {
		        "axis_x": "А",
		        "axis_y": "10"
		    },
		    ...
		]


		POST-запрос с переданным player_id и координатами выстрела производит выстрел по ячейке.
		
		Пример тела запроса:
		{
			"player_id": 1,
			"axis_x": "Г",
			"axis_y": "1"
		}

		Пример ответа:
		{
			"is_hit": false,
			"status": true
		}
	*/
	
	header('Content-Type: application/json; charset=utf-8');

	require_once "../connect.php";


	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		// получаем список выстрелов игрока

		$sql = "
			SELECT
				axis_x, axis_y
			FROM Shot
			WHERE player_id = {$_GET['player_id']}
		";
		$query = $connect->query($sql)->fetch_all(MYSQLI_ASSOC);

		echo json_encode($query);
	}
	elseif ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		// стреляем в ячейку

		$data = isset($_POST['player_id']) ? $_POST : json_decode(file_get_contents('php://input'), true);

		$player_id = $data['player_id'];
		$axis_x = $data['axis_x'];
		$axis_y = $data['axis_y'];

		$status = true;

		// стреляем

		$sql = "
			INSERT INTO
				Shot(player_id, axis_x, axis_y)
			VALUES
				({$player_id}, \"{$axis_x}\", \"{$axis_y}\")
		";
		$connect->query($sql);

		$status = $status and !$connect->error;

		// теперь надо проверить, есть ли попадание
		// если да, то топим клетки
		// если все клетки потоплены, то и корабль тоже

		// получить ID противника по player_id

		$sql = "
			SELECT player_id
			FROM Player
			JOIN Game USING (game_id)
			WHERE
				game_id = (SELECT game_id FROM Player WHERE player_id = {$player_id})
				AND player_id != {$player_id}
		";
		$query = $connect->query($sql)->fetch_assoc();

		$status = $status and $query;

		$enemy_id = $query['player_id'];

		// проверить, есть ли попадание

		$sql = "
			SELECT
				cell_id, axis_x, axis_y, Cell.is_hit
			FROM Cell
			JOIN Ship USING (ship_id)
			WHERE player_id = {$enemy_id}
		";
		$query = $connect->query($sql)->fetch_assoc();

		$status = $status and $query;

		$cells = $query;

		$cell_id = 0;
		foreach ($cells as $cell)
		{
			// если попали, то сохраняем ID ячейки
			if ($cell['axis_x'] == $axis_x and $cell['axis_y'] == $axis_y)
				$cell_id = $cell['cell_id'];
		}

		
		if ($cell_id)
		{
			// если попали

			$sql = "UPDATE Cell SET is_hit = TRUE WHERE cell_id = {$cell_id}";
			$connect->query($sql);

			$status = $status and !$connect->error;

			// проверяем, потоплен ли корабль

			$sql = "SELECT ship_id FROM Cell WHERE cell_id = {$cell_id}";
			$query = $connect->query($sql)->fetch_assoc();

			$status = $status and $query;

			$ship_id = $query;

			$sql = "SELECT is_hit FROM Ship WHERE ship = {$ship_id}";
			$query = $connect->query($sql)->fetch_assoc();

			$status = $status and $query;

			$ship_cells = $query;

			$is_hit = true;
			foreach ($ship_cells as $cell)
			{
				$is_hit = $is_hit and $cell['is_hit'];
			}

			if ($is_hit)
			{
				// если все ячейки корабля подбиты, то подбит и корабль

				$sql = "UPDATE Ship SET is_hit = TRUE WHERE ship_id = {$ship_id}";
				$connect->query($sql);

				$status = $status and !$connect->error;
			}
		}

		echo json_encode([
			"is_hit" => $cell_id ? true : false,
			"status" => $status
		]);
	}
	else
	{
		echo 'метод не существует';
	}
