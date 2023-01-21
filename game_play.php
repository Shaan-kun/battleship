<head>
	<script>
		var boats = [];
		var lines = [];
		var lines2 = [];
		var cells = [];
		var cells2 = [];

		var ship_id = 0; // id кораблей
		var canMove = false;
		var startGame = false;
		var canAttack = false;
		var wating = true;
		var count =1; //порядковый номер корабля
		var my_hod = false;
		var count_for_player = 1;

		var bot_hod = false;

		var pos_x1=0;
        var pos_y1=0;

        var pos_x2=0;
        var pos_y2=0;

		var bot_kills = 0;
		var my_kills = 0;


		var UpDown = false;
		var LeftRight = false;
	</script>
	
</head>
<body>
	<link rel="stylesheet" type="text/css" href="gameLogic/gameLogic.css">

		<div class = "my_info">
			Я
			</br></br>
			<div class = "instukciya-1">Вода</div></br>
			<div class = "instukciya-2">Ваши корабли</div></br>
			<div class = "instukciya-3">Попадание</div></br>
			<div class = "instukciya-4">Молоко</div>
		</div>
		<div class = "vrag_info">
			Противник
		</div>

	<div class = "container_table_1">
		<table class = "table_1">
			<tbody class = "game-tbody"></tbody>
		</table>
	</div>
	<div class = "container_table_2">
		<table class = "table_2">
			<tbody class = "game-tbody_2"></tbody>
		</table>
	</div>
	<script src=  "gameLogic/game_play.js"></script>
	<script src=  "gameLogic/game_play_2.js"></script>
	<script src = "gameLogic/addEventListener.js"></script>
	<script src = "gameLogic/bot_addEventListener.js"></script>
	<script>game();//var timeAll = setInterval(logic, 100);</script>
</body>