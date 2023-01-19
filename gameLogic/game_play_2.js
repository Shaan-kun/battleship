function get_table_2() //Вторая таблица соперника
{
    cells2 = []; // тут все ячейки в таблице
    const $tableBody = document.createElement('tbody');
    $tableBody.className = "game-tbody_2";

    for(let y = 0; y<10;y++)
    {
        const row = [];
        const $tr = document.createElement('tr');
        $tr.className = "game-tr";
        $tr.dataset.y=y;
        for (let x=0;x<10;x++)
        {
            const $td = document.createElement('td');
            $td.className = "game-td2";
            $td.dataset.y=y;
            $td.dataset.x=x;

            $tr.append($td);
            row.push($td);
        }

        cells2.push(row);
        $tableBody.append($tr);

    }

    for (let x = 0; x < 10; x++) {
        const cell = cells2[0][x];
        const marker = document.createElement("div");

        marker.classList.add("marker", "marker-column");
        marker.textContent = "АБВГДЕЖЗИК"[x];

        cell.append(marker);
    }

    for (let y = 0; y < 10; y++) {
        const cell = cells2[y][0];
        const marker = document.createElement("div");

        marker.classList.add("marker", "marker-row");
        marker.textContent = y + 1;

        cell.append(marker);
    }
    

    return $tableBody;


}
function update_table_2() {
		let tbody = document.querySelector(".game-tbody_2");
		tbody.replaceWith(get_table_2());
	};

update_table_2();