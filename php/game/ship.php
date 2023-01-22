<?php
	
	/*
		Скрипт для взаимодействия с таблицей кораблей (Ship).

		GET-запрос с переданным player_id возвращает список кораблей игрока и
		ячеек, из которых те состоят.

		Пример:
		[
		    {
		        "ship_id": "1",
		        "name": "катер",
		        "is_hit": "0",
		        "cells": [
		            {
		                "axis_x": "А",
		                "axis_y": "8",
		                "is_hit": "0"
		            }
		        ]
		    },
		    ...
		]

		POST-запрос позволяет добавлять корабли в БД.
		Передаётся palyer_id и список кораблей. Каждый корабль должен быть
		списком объектов с ключами axis_x и axis_y.
		Возвращает статус.

		Пример тела запроса:
		{
		    "player_id": 1,
		    "ships": [
		        [
		            {
		                "axis_x": "А",
		                "axis_y": "1"
		            }
		        ],
		        [
		            {
		                "axis_x": "А",
		                "axis_y": "1"
		            },
		            {
		                "axis_x": "Б",
		                "axis_y": "1"
		            }
		        ]
		    ]
		    ...
		}

		Пример ответа:
		{"status": true}
	*/

	header('Content-Type: application/json; charset=utf-8');

	require_once "../connect.php";


	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		// получить список кораблей игрока

		$sql = "
			SELECT
				ship_id, name, is_hit
			FROM Ship
			JOIN Type USING (type_id)
			WHERE player_id = {$_GET['player_id']}
		";
		$ships = $connect->query($sql)->fetch_all(MYSQLI_ASSOC);

		for ($i = 0; $i < count($ships); $i++)
		{
			$sql = "
				SELECT
					axis_x, axis_y, is_hit
				FROM Cell
				WHERE ship_id = {$ships[$i]['ship_id']}
			";
			$cells = $connect->query($sql)->fetch_all(MYSQLI_ASSOC);

			$ships[$i]['cells'] = $cells;
		}
		
		echo json_encode($ships);
	}
	elseif ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		// добавить корабли в БД

		$data = isset($_POST['player_id']) ? $_POST : json_decode(file_get_contents('php://input'), true);

		$player_id = $data['player_id'];
		$ships = $data['ships'];

		$status = true;
		
		foreach ($ships as $ship)
		{
			// узнаём id типа корабля по количеству его ячеек

			$count_cells = count($ship);
			$sql = "SELECT type_id FROM Type WHERE hp = {$count_cells}";
			$query = $connect->query($sql)->fetch_assoc();

			$status = $status and $query;

			$type_id = $query['type_id'];

			// создаём корабль

			$sql = "
				INSERT INTO
					Ship(type_id, player_id)
				VALUES
					({$type_id}, {$player_id})
			";
			$query = $connect->query($sql);

			$status = $status and !$query->error;

			$ship_id = $connect->insert_id;

			// создаём клетки, из которых состоит корабль
			foreach ($ship as $cell)
			{
				$sql = "
					INSERT INTO
						Cell(ship_id, axis_x, axis_y)
					VALUES
						({$ship_id}, \"{$cell['axis_x']}\", \"{$cell['axis_y']}\")
				";

				$query = $connect->query($sql);

				$status = $status and !$query->error;
			}
		}

		echo json_encode(['status' => $status]);
	}
	else
	{
		echo 'метод не существует';
	}