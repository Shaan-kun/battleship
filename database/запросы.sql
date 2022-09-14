CREATE TABLE User (
	user_id INT PRIMARY KEY AUTO_INCREMENT,
	login VARCHAR(32) NOT NULL UNIQUE,
	password VARCHAR(32),
	email VARCHAR(32),
	reg_date DATETIME DEFAULT "1970-01-01 00:00:00",
	avatar VARCHAR(256),
	description VARCHAR(300),
	game_count INT DEFAULT 0,
	game_win INT DEFAULT 0,
	game_loss INT DEFAULT 0,
	score DECIMAL(16, 2) DEFAULT 0
);

CREATE TABLE Game (
	game_id INT PRIMARY KEY AUTO_INCREMENT,
	start_date DATETIME,
	move_count INT DEFAULT 0
);

CREATE TABLE Player (
	player_id INT PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	game_id INT NOT NULL,
	is_moved BOOL DEFAULT false,
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
	type_id INT NOT NULL,
	player_id INT NOT NULL,
	is_hit BOOL DEFAULT false,
	FOREIGN KEY (type_id) REFERENCES Type (type_id),
	FOREIGN KEY (player_id) REFERENCES Player (player_id) ON DELETE CASCADE
);

CREATE TABLE Cell (
	cell_id INT PRIMARY KEY AUTO_INCREMENT,
	ship_id INT NOT NULL,
	axis_x VARCHAR(2) CHECK(axis_x != ''),
	axis_y VARCHAR(2) CHECK(axis_y != ''),
	is_hit BOOL DEFAULT false,
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