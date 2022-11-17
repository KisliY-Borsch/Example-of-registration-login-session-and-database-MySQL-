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
	<title>Панель монтажника</title>
</head>
<body>
	<div class="topbar">
		<a href="index">Главная</a>
	 	<div class="dropdown">
			<button class="dropbtn">Заявки</button>
			<div class="dropdown-content">
				<a href="waitapl">Активные заявки</a>
				<a href="closeapl">Закрыть заявку</a>
				<a href="addapl">Создать заявку</a>
			</div>
		</div>
		<a href="netmap">Карта сети</a>
		<a class="active" href="actbranches">Активные ветки</a>
		<input type="text" name="search" placeholder="Поиск абонента...">
</body>
</html>