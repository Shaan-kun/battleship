			</div>
		</section>
		<aside>
			<div class="setting-button"></div>
			<div class="avatar">
				<img src="/images/avatars/<?= $_SESSION['user']['avatar']?>" width="150px">
			</div>
			<div class="nickname"><?= $_SESSION['user']['login'];?></div>
			<div class="user-description"><?= $_SESSION['user']['description'];?></div>
			<a href="/friends" class="friends-link">Друзья</a>
			<ul class="games">
				<!-- <li class="game">
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
				</li> -->
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
			<form method="POST" class="send-message">
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

	<div class="setting-window hide">
		<form action="php/edit.php" method="post" enctype="multipart/form-data">
			<p>Изменение данных пользователя</p>
			<p class="nickname"><?= $_SESSION['user']['login'];?></p>

			<input type="hidden" name="url" value="<?= $_SERVER['REQUEST_URI'];?>">
			<label>Описание</label>
        	<textarea type="text" name="description" placeholder="Расскажите о себе"><?= $_SESSION['user']['description']?></textarea>

			<label>Изменить изображение профиля</label>
        	<input type="file" name="avatar"> 

			<div class="buttons">
				<button type="submit">Сохранить</button>
				<button type="button" act="close">Отмена</button>
			</div>
		</form>
	</div>

	<div class="user-info-window hide">
		<div class="avatar">
			<img src="">
			<p class="nickname"></p>
			<p class="user-description"></p>
			<div class="user-stat">
				<div><p>Дата регистрации</p> <p class="reg-date"></p></div>
				<div><p>Всего игр</p> <p class="count"></p></div>
				<div><p>Победы</p> <p class="wins"></p></div>
				<div><p>Поражения</p> <p class="loses"></p></div>
				<div><p>Счет</p> <p class="score"></p></div>
			</div>
		</div>
	</div>

	<script src="/js/profile.js"></script>
</body>
</html>