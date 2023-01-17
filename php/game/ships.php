<?php

	require_once "../connect.php";


	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		/*
			Обработчик GET-запроса.
			
			Параметр: player_id.

			Пример: http://battleship/php/game/ships.php?player_id=1
		*/
		$sql = "
			SELECT name, ship_id, is_hit
			FROM Player
			JOIN Ship USING (player_id)
			JOIN Type USING (type_id)
			WHERE player_id = {$_GET['player_id']}
		";

		$result = $connect->query($sql);

		$ships = [];
		foreach ($result as $player_ship)
		{
			$sql = "
				SELECT axis_x, axis_y, Cell.is_hit
				FROM Cell
				LEFT JOIN Ship USING (ship_id)
				WHERE ship_id = {$player_ship['ship_id']};
			";

			$cells = $connect->query($sql);

			$ship = [
				"type" => $player_ship["name"],
				"is_hit" => $player_ship["is_hit"],
				"cells" => $cells->fetch_all(MYSQLI_ASSOC),
			];

			$ships[] = $ship;
		}

		echo json_encode($ships);
	}
	elseif ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		/*
			Обработчик POST-запроса.
			
			Тело (player_id и набор координат кораблей):
			"player_id",
			"ships" =>  ["A1", "A2", "A3", "A4"], ["Б7"]
		*/

	    foreach ($ships as $ship)
	    {
	    	// создаём корабли из переданных координат

	    	$sql = "SELECT * FROM Type WHERE hp = {count($ship})";
	    	$type_id = $connect->query($sql)->fetch_assoc()["type_id"];

	    	$sql = "
	    		INSERT INTO
	    			Ship(type_id, player_id)
	    		VALUES
	    			({$type_id}, {$_POST['player_id']})
	    	";
	    	$connect->query($sql);

	    	$ship_id = $connect->insert_id;

	    	foreach ($ship as $coords)
	    	{
	    		// создаём ячейки кораблей
	    		$sql = "
	    			INSERT INTO
	    				Cell(ship_id, axis_x, axis_y)
	    			VALUES
	    				({$ship_id}, {$coords[0]}, {substr($coords[0], 1})
	    		";
	    		$connect->query($sql);
	    	}
	    }

	    // проверяем, что корабли действительно добавлены

	    $sql = "
			SELECT name, ship_id
			FROM Player
			JOIN Ship USING (player_id)
			WHERE player_id = {$_POST['player_id']}
		";

		echo json_encode($connect->query($sql)->fetch_all(MYSQLI_ASSOC));
		
	}