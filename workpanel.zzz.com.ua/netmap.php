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
		<a class="active" href="netmap">Карта сети</a>
		<a href="actbranches">Активные ветки</a>
		<input type="text" name="search" placeholder="Поиск абонента...">
	</div>
	<iframe width="80%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=30.694019794464115%2C46.46896061778325%2C30.708181858062748%2C46.47571416369242&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/>
</body>
</html>