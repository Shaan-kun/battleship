<?php

	require_once '../connect.php';

	// Логин, дата регистрации, общее число игр, число побед, число поражений, счёт.
	$query = 'SELECT * FROM User';

	$users = mysqli_query($connect, $query);

	// превратить в массив

	return json_encode($users);
