CREATE TABLE User (
	user_id INT PRIMARY KEY AUTO_INCREMENT,
	login VARCHAR(32) NOT NULL UNIQUE,
	password VARCHAR(32) NOT NULL,
	email VARCHAR(32),
	reg_date DATETIME DEFAULT NOW(),
	avatar VARCHAR(256) DEFAULT "user.png",
	description VARCHAR(300),
	game_count INT DEFAULT 0,
	game_win INT DEFAULT 0,
	game_loss INT DEFAULT 0,
	score DECIMAL(16, 2) DEFAULT 0
);

CREATE TABLE Game (
	game_id INT PRIMARY KEY AUTO_INCREMENT,
	start_date DATETIME DEFAULT NOW(),
	is_start BOOL DEFAULT FALSE,
	is_end BOOL DEFAULT FALSE,
	move_count INT DEFAULT 0
);

CREATE TABLE Player (
	player_id INT PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	game_id INT NOT NULL,
	is_moved BOOL DEFAULT FALSE,
	FOREIGN KEY (user_id) REFERENCES User (user_id) ON DELETE CASCADE,
	FOREIGN KEY (game_id) REFERENCES Game (game_id) ON DELETE CASCADE,
	UNIQUE(user_id, game_id)
);

CREATE TABLE Type (
	type_id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(32) NOT NULL UNIQUE,
	hp INT CHECK(hp > 0)
);

CREATE TABLE Ship (
	ship_id INT PRIMARY KEY AUTO_INCREMENT,
	player_id INT NOT NULL,
	type_id INT NOT NULL,
	is_hit BOOL DEFAULT FALSE,
	FOREIGN KEY (type_id) REFERENCES Type (type_id),
	FOREIGN KEY (player_id) REFERENCES Player (player_id) ON DELETE CASCADE
);

CREATE TABLE Cell (
	cell_id INT PRIMARY KEY AUTO_INCREMENT,
	ship_id INT NOT NULL,
	axis_x VARCHAR(2) CHECK(axis_x != ''),
	axis_y VARCHAR(2) CHECK(axis_y != ''),
	is_hit BOOL DEFAULT FALSE,
	FOREIGN KEY (ship_id) REFERENCES Ship (ship_id) ON DELETE CASCADE
);

CREATE TABLE Shot (
	shot_id INT PRIMARY KEY AUTO_INCREMENT,
	player_id INT NOT NULL,
	axis_x VARCHAR(2) CHECK(axis_x != ''),
	axis_y VARCHAR(2) CHECK(axis_y != ''),
	FOREIGN KEY (player_id) REFERENCES Player (player_id) ON DELETE CASCADE,
	UNIQUE(player_id, axis_x, axis_y)
);

INSERT INTO
	Type(name, hp)
VALUES
	('катер', 1),
	('эсминец', 2),
	('крейсер', 3),
	('линкор', 4);


-- ТЕСТОВЫЕ ДАННЫЕ

-- пароль такой же как логин
INSERT INTO
	User(login, password, email, reg_date)
VALUES
	('nagibator', 'c7de91b186b220b026c590ebb4306d6c', 'nagibator@battleship.ru', '2022-11-23 19:14:52'),
	('Dominator', '53dd6b930ddc5060576d038d0a139804', 'dominator@battleship.ru', '2022-11-23 19:15:28');


-- игра началась и идёт
INSERT INTO
	Game(start_date, is_start, move_count)
VALUES
	('2022-11-23 19:14:53', TRUE, 6);


-- игры, доступные для присоединения

INSERT INTO
	Game(start_date)
VALUES
	('2022-11-23 19:15:30'),
	('2022-11-23 19:15:32');

INSERT INTO
	Player(user_id, game_id)
VALUES
	(2, 2),
	(2, 3);


-- данные игры, идущей в данный момент

INSERT INTO
	Player(user_id, game_id)
VALUES
	(1, 1),
	(2, 1);

-- корабли первого игрока

INSERT INTO
	Ship(player_id, type_id)
VALUES
	(1, 1),
	(1, 1),
	(1, 1),
	(1, 1),
	(1, 2),
	(1, 2),
	(1, 2),
	(1, 3),
	(1, 3),
	(1, 4);

-- катеры
INSERT INTO
	Cell(ship_id, axis_x, axis_y)
VALUES
	(1, 'А', '8'),
	(2, 'Б', '5'),
	(3, 'Д', '10'),
	(4, 'И', '7');

-- эсминцы
INSERT INTO
	Cell(ship_id, axis_x, axis_y)
VALUES
	(5, 'Б', '2'),
	(5, 'Б', '3'),
	(6, 'В', '8'),
	(6, 'Г', '8'),
	(7, 'З', '4'),
	(7, 'З', '5');

-- крейсеры
INSERT INTO
	Cell(ship_id, axis_x, axis_y)
VALUES
	(8, 'Д', '1'),
	(8, 'Е', '1'),
	(8, 'Ж', '1'),
	(9, 'Ж', '10'),
	(9, 'З', '10'),
	(9, 'И', '10');

-- линкор
INSERT INTO
	Cell(ship_id, axis_x, axis_y)
VALUES
	(10, 'Г', '3'),
	(10, 'Г', '4'),
	(10, 'Г', '5'),
	(10, 'Г', '6');


-- корабли второго игрока

INSERT INTO
	Ship(player_id, type_id)
VALUES
	(2, 1),
	(2, 1),
	(2, 1),
	(2, 1),
	(2, 2),
	(2, 2),
	(2, 2),
	(2, 3),
	(2, 3),
	(2, 4);

-- катеры
INSERT INTO
	Cell(ship_id, axis_x, axis_y)
VALUES
	(11, 'А', '7'),
	(12, 'А', '9'),
	(13, 'Е', '5'),
	(14, 'З', '5');

-- эсминцы
INSERT INTO
	Cell(ship_id, axis_x, axis_y)
VALUES
	(15, 'В', '4'),
	(15, 'Г', '4'),
	(16, 'Ж', '3'),
	(16, 'З', '3'),
	(17, 'К', '2'),
	(17, 'К', '3');

-- крейсеры
INSERT INTO
	Cell(ship_id, axis_x, axis_y)
VALUES
	(18, 'А', '1'),
	(18, 'А', '2'),
	(18, 'А', '3'),
	(19, 'Г', '8'),
	(19, 'Г', '9'),
	(19, 'Г', '10');

-- линкор
INSERT INTO
	Cell(ship_id, axis_x, axis_y)
VALUES
	(20, 'Ж', '9'),
	(20, 'З', '9'),
	(20, 'И', '9'),
	(20, 'К', '9');


-- выстрелы первого игрока

INSERT INTO
	Shot(player_id, axis_x, axis_y)
VALUES
	(1, 'А', '10'), -- промах
	(1, 'А', '7'),
	(1, 'Г', '4');

-- убили катер

UPDATE Cell SET is_hit = True WHERE cell_id = 21;
UPDATE Ship SET is_hit = True WHERE ship_id = 11;

-- ранили эсминец

UPDATE Cell SET is_hit = True WHERE cell_id = 26;

-- выстрелы второго игрока

-- все "в молоко"
INSERT INTO
	Shot(player_id, axis_x, axis_y)
VALUES
	(2, 'А', '1'),
	(2, 'А', '2'),
	(2, 'А', '3');
