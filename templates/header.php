<?php
	session_start();

    if (!isset($_SESSION['user']))
    {
        header('Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="styles/site.css">
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