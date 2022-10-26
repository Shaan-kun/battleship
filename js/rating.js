// функция возвращает узел - тело таблицы рейтинга
function get_rating(users) {
	// создаём элемент tbody
	let rating = document.createElement('tbody');

	// user - объект, хранящий данные о пользователе (запись)
	for (let user of users) {
		let row = document.createElement('tr');

		// fiel - поле (столбец)
		for (let field in user) {
			let column = document.createElement('td');
			column.innerHTML = user[field];

			row.append(column)
		}

		rating.append(row);
	}

	return rating;
}

// функция делает GET-запрос и обновляет таблицу рейтинга
function update_table() {
	let xhr = new XMLHttpRequest();
	xhr.open('GET', "php/rating_test.php");
	xhr.responseType = 'json';
	xhr.send();

	xhr.onload = function() {
		let users = xhr.response;
		let tbody = document.querySelector('tbody');
		tbody.replaceWith(get_rating(users));
	};

	console.log('+'); // проверка работоспособности (см. консоль браузера)
}

update_table(); // первичное построение таблицы
setInterval(update_table, 5000); // обновление таблицы каждые 5 секунд