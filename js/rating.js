function get_rating(users)
{
    const $tableBody = document.createElement('tbody');
    $tableBody.className = "rating-tbody";

    for(let user of users)
    {
        const $tr = document.createElement('tr');

        for (let field in user)
        {
            let $td = document.createElement('td');
            $td.textContent = user[field];

            $tr.append($td);
        }


        $tableBody.append($tr);

        
    }
    return $tableBody;
}


function update_table() {
	let xhr = new XMLHttpRequest();
	xhr.open('GET', "php/game/get_users.php");
	xhr.responseType = 'json';
	xhr.send();

	xhr.onload = function() {
		let users = xhr.response;
		let tbody = document.querySelector(".rating-tbody");
		tbody.replaceWith(get_rating(users));
	};


}

update_table(); // первичное построение таблицы
setInterval(update_table, 5000); // обновление таблицы каждые 5 секунд