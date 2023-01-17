<?php
	session_start();

    if (!isset($_SESSION['user']))
    {
        header('Location: ../index.php');
    }

    $theme = $_SESSION["theme"] ?? "light";
    $style = ($theme == "dark") ? "site_dark.css" : "site.css";

    // создаём и читаем сообщения из файла чата

	const FILE_NAME = "chat.json";

	if (!file_exists(FILE_NAME))
		file_put_contents(FILE_NAME, "{}");

	$messages = json_decode(file_get_contents(FILE_NAME), true);

	if (isset($_SESSION['user']) and isset($_POST["user_message"]))
	{
		$message = htmlspecialchars($_POST["user_message"]);

		if ($message == "/set dark")
		{
			// устанавливаем тёмную тему
			$_SESSION["theme"] = "dark";
			$theme = "dark";
			$style = ($theme == "dark") ? "site_dark.css" : "site.css";
		}
		elseif ($message == "/set light")
		{
			// устанавливаем светлую тему
			$_SESSION["theme"] = "light";
			$theme = "light";
			$style = ($theme == "dark") ? "site_dark.css" : "site.css";
		}
		else
		{
			$messages[] = [
				"message" => $message,
				"login" => $_SESSION["user"]["login"],
				"time" => time(),
			];

			file_put_contents(FILE_NAME, json_encode($messages));
		}
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="styles/<?= $style ?>">
</head>
<body>
	<header>
		<h1>BattleShip</h1>
	</header>
	<div class="container">
		<section>
			<nav>
				<ul class="menu">
					<li class="menu-li">
						<a class="menu-a" href="plug.php">Одиночная игра</a>
					</li>
					<li class="menu-li">
						<a class="menu-a" href="multiplayer.php">Многопользовательская игра</a>
					</li>
					<li class="menu-li">
						<a class="menu-a" href="rating.php">Рейтинг</a>
					</li>
					<li class="menu-li">
						<a class="menu-a" href="rules.php">Правила</a>
					</li>
					<li class="menu-li">
						<a class="menu-a" href="plug.php">Настройки</a>
					</li>
					<li class="menu-li">
						<a class="menu-a" href="php/auth/logout.php">Выход</a>
					</li>
				</ul>
			</nav>
			<div class="main">
				<h2><?= $title ?></h2>