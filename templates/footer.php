			</div>
		</section>
		<aside>
			<div class="avatar">
				<img src="https://takamakiokerar.files.wordpress.com/2021/10/haruhibd0091.jpg" width="150px">
			</div>
			<div class="nickname">Никнейм</div>
			<ul class="games">
				<li class="game">
					<ul class="game-data">
						<li>Игра: <span class="game-number">1</span></li>
						<li>Статус: <span class="game-status">ход противника</span></li>
						<li><a class="game" href="#">Ссылка</a></li>
					</ul>
				</li>
				<li class="game">
					<ul class="game-data">
						<li>Игра: <span class="game-number">2</span></li>
						<li>Статус: <span class="game-status wait">ваш ход</span></li>
						<li><a class="game" href="#">Ссылка</a></li>
					</ul>
				</li>
				<li class="game">
					<ul class="game-data">
						<li>Игра: <span class="game-number">3</span></li>
						<li>Статус: <span class="game-status">ход противника</span></li>
						<li><a class="game" href="#">Ссылка</a></li>
					</ul>
				</li>
			</ul>
			<div class="chat">
				<?php
					if (!isset($_SESSION['user']))
					{
						echo "ЧАТ НЕДОСТУПЕН";
					}
					else
					{
						foreach ($messages as $msg)
						{
							echo '<div class="message">';
							echo '<div class="time">' . date("d.m.Y H:i", $msg['time']) . '</div>';
							echo '<div class="login">' . $msg['login'] . '</div>';
							echo '<div class="message-text">' . $msg['message'] . '</div>';
							echo '</div>';
						}
					}
				?>
			</div>
			<form method="POST">
				<input type="text" name="user_message">
				<input type="submit">
			</form>
		</aside>
	</div>
	<footer>
		<div class="company">super puper team</div>
		<div class="devs">Даниил, Денис, Дмитрий, Роман</div>
		<div class="description">2022, ол райтс ризёрвд</div>
	</footer>
</body>
</html>