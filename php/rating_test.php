<?php

    $users = [
    	[
    		'login' => 'shaan',
			'reg_date' => '2022-10-02 15:31:22',
			'game_count' => 1,
			'game_win' => 1,
			'game_loss' => 0,
			'score' => 10
    	],
    	[
    		'login' => 'Nagibator',
			'reg_date' => '2022-10-25 00:00:01',
			'game_count' => 100,
			'game_win' => 99,
			'game_loss' => 1,
			'score' => 100500
    	],
    	[
    		'login' => 'shaan',
			'reg_date' => '2022-10-26 08:12:13',
			'game_count' => 10,
			'game_win' => 1,
			'game_loss' => 9,
			'score' => 49.5
    	],
    ];

    echo json_encode($users);
