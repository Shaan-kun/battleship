<?php
	$title = 'Рейтинг игроков';

	include 'templates/header.php'; 
?>


<table class = "table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Логин</th>
			<th>Дата регистрации</th>
			<th>Всего игр</th>
			<th>Победы</th>
			<th>Поражения</th>
			<th>Счёт</th>
		</tr>
	</thead>
	<tbody class = "rating-tbody">
	</tbody>
</table>
<script src="js/rating.js"></script>



<?php include 'templates/footer.php'; ?>

