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
		<a href="actbranches">Активные ветки</a>
		<input type="text" name="search" placeholder="Поиск абонента...">
	</div>
	<div class="content">
		<form id="addApl" action="/addapplication" method="POST">
			<table>
				<tr>
				<td><a>Введите адрес абонента: </a><input id="abonAdress" type="text" name="adress"  placeholder="Пример: Болгарская, 8"></td>
				</tr>
				<tr>
				<td><a>Введите номер телефона абонента: </a><input id="abonTel" type="tel" name="telNumb"  placeholder="Пример: 0668583475"></td>
				</tr>
				<td><a>В какой день нужно приехать: </a><select id="days" name="daysForWork">
					<option value="Понедельник">Понедельник</option>
					<option value="Вторник">Вторник</option>
					<option value="Среда">Среда</option>
					<option value="Четверг">Четверг</option>
					<option value="Пятница">Пятница</option>
				</select></td>
				<tr>
					<td><textarea id="AppDesc" name="AppDescription"  type="text" rows="10" cols="45" placeholder="Опишите проблему или все что может помочь в работе..."></textarea></td>
				</tr>
				<tr>
				<td><input id="SubApp" type="submit" onclick="validateForm()" value="Создать заявку"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>