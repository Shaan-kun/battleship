<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Правила игры</title>
	<link rel="stylesheet" type="text/css" href="styles/site.css">
</head>
<body>
	<header>
		<h1>BattleShip</h1>
	</header>
	<div class="container">
		<section>
			<nav>
				<?php include 'templates/menu.php'; ?>
			</nav>
			<div class="main">
				<h2>Правила</h2>
				<p>
					Морской бой — игра для двух участников, в которой игроки по очереди называют координаты на неизвестной им карте соперника. Если у соперника по этим координатам имеется корабль (координаты заняты), то корабль или его часть «топится», а попавший получает право сделать ещё один ход. Цель игрока — первым потопить все корабли противника.
				</p>
				<p>
					Подробные правила читать <a href="https://ru.wikipedia.org/wiki/%D0%9C%D0%BE%D1%80%D1%81%D0%BA%D0%BE%D0%B9_%D0%B1%D0%BE%D0%B9_(%D0%B8%D0%B3%D1%80%D0%B0)">здесь</a>.
				</p>
			</div>
		</section>
		<aside>
			<?php include 'templates/player.php'; ?>
		</aside>
	</div>
	<footer>
		<?php include 'templates/footer.php'; ?>
	</footer>
</body>
</html>