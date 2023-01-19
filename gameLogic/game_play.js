function get_table()
{
    cells = []; // тут все ячейки в таблице
    const $tableBody = document.createElement('tbody');
    $tableBody.className = "game-tbody";

    for(let y = 0; y<10;y++)
    {
        const row = [];
        const $tr = document.createElement('tr');
        $tr.className = "game-tr";
        $tr.dataset.y=y;
        for (let x=0;x<10;x++)
        {
            const $td = document.createElement('td');
            $td.className = "game-td";
            $td.dataset.y=y;
            $td.dataset.x=x;

            $tr.append($td);
            row.push($td);
        }

        cells.push(row);
        $tableBody.append($tr);

    }

    for (let x = 0; x < 10; x++) {
        const cell = cells[0][x];
        const marker = document.createElement("div");

        marker.classList.add("marker", "marker-column");
        marker.textContent = "АБВГДЕЖЗИК"[x];

        cell.append(marker);
    }

    for (let y = 0; y < 10; y++) {
        const cell = cells[y][0];
        const marker = document.createElement("div");

        marker.classList.add("marker", "marker-row");
        marker.textContent = y + 1;

        cell.append(marker);
    }
    

    return $tableBody;


}
function update_table() {
		let tbody = document.querySelector(".game-tbody");
		tbody.replaceWith(get_table());
	};


update_table();

