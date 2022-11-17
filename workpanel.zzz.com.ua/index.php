<?php 
	include ("session.php"); //Проверка на наличие кук и авторизации
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="Style/Images/favicon.ico" type="image/x-icon">
	<link href="Style/style.css" rel="stylesheet" type="text/css">
	<script src="Style/script.js" type="module"></script>
	<title>Панель монтажника</title>
</head>
<body>
	<div class="topbar">
		<a class="active" href="index">Главная</a>

	 	<div class="dropdown">
			<button class="dropbtn">Заявки</button>
			<div class="dropdown-content">
				<a href="waitapl">Активные заявки</a>
				<a href="closeapl">Закрыть заявку</a>
				<a href="addapl">Создать заявку</a>
			</div>
		</div>

		<a href="netmap">Карта сети</a>
		<a href="actbranches">Активные ветки</a>
		<input type="text" name="search" placeholder="Поиск абонента...">

		<div class="myprofdown">
			<button class="myprofbtn"></button>
			<div class="myprofdown-content">
					<a href="/profile?id=<?= $userdata['id']?>">Мой профиль</a>
					<a href="">Настройки профиля</a>
					<a href="">Мои достижения</a>
					<form action="/logout"><input id="logout" type="submit" value="Выход"></form>
				</div>
		</div>
	</div>
</body>
</html>