<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BattleShip</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
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
				<h2>Рейтинг</h2>

				<table class="table">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>ZIP</th>
							<th>Birthday</th>
							<th>Points</th>
							<th>Average</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Gloria</td>
							<td>Reeves</td>
							<td>67439</td>
							<td>10/18/1985</td>
							<td>4</td>
							<td>0.1</td>
							<td>$50</td>
						</tr>
						<tr>
							<td>Graham</td>
							<td>Bonner</td>
							<td>90727</td>
							<td>12/07/1983</td>
							<td>4</td>
							<td>0.9</td>
							<td>$90</td>
						</tr>
						<tr>
							<td>Warren</td>
							<td>Wheeler</td>
							<td>99134</td>
							<td>11/11/1984</td>
							<td>2</td>
							<td>0.7</td>
							<td>$50</td>
						</tr>
						<tr>
							<td>Zena</td>
							<td>Hale</td>
							<td>19803</td>
							<td>06/17/1987</td>
							<td>9</td>
							<td>0.3</td>
							<td>$90</td>
						</tr>
						<tr>
							<td>Julia</td>
							<td>Haupt</td>
							<td>24116</td>
							<td>03/15/1991</td>
							<td>10</td>
							<td>1.0</td>
							<td>$40</td>
						</tr>
						<tr>
							<td>Rachel</td>
							<td>English</td>
							<td>58951</td>
							<td>02/25/1982</td>
							<td>7</td>
							<td>0.3</td>
							<td>$20</td>
						</tr>
						<tr>
							<td>Lionel</td>
							<td>Barry</td>
							<td>65036</td>
							<td>02/17/1980</td>
							<td>7</td>
							<td>0.5</td>
							<td>$50</td>
						</tr>
						<tr>
							<td>Zena</td>
							<td>Spears</td>
							<td>16874</td>
							<td>12/13/1981</td>
							<td>5</td>
							<td>0.6</td>
							<td>$20</td>
						</tr>
						<tr>
							<td>Dillon</td>
							<td>Bradford</td>
							<td>91543</td>
							<td>01/20/1985</td>
							<td>7</td>
							<td>0.4</td>
							<td>$100</td>
						</tr>
						<tr>
							<td>Haley</td>
							<td>Mcleod</td>
							<td>99321</td>
							<td>04/12/1980</td>
							<td>4</td>
							<td>0.1</td>
							<td>$20</td>
						</tr>
					</tbody>
				</table>
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