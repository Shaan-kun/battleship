<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Многопользовательская игра</title>
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
				<h2>Многопользовательская игра</h2>

				<ul class="choice">
					<li class="choice-li">
						<a class="choice-a" href="#">Мои игры</a>
					</li>
					<li class="choice-li">
						<a class="choice-a" href="#">Создать</a>
					</li>
					<li class="choice-li">
						<a class="choice-a" href="#">Присоединиться</a>
					</li>
				</ul>
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