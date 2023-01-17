<?php
	$title = 'Мои игры';

	include 'templates/header.php'; 
?>



<form>
	<h3>Создать свободную игру</h3>
	<a href = "game_play.php">Создать игру</a>
</form>
<h2>Список моих игр</h2>
<table class="table">
	<thead>
		<tr>
			<th>Номер игры</th>
			<th>Дата создания</th>
			<th>Is_moved</th>
            <th>Вернуться</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
<script src = "js/my_games.js"></script>

</form>

<?php include 'templates/footer.php'; ?>