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
<?php
	include ("bd.php"); //Поключаемся к базе данных

$sql = "SELECT * FROM `Applications`";
	if($result = $con->query($sql)){
    	echo "<table class='waitApl' valign='top' width='100%' rules='rows' frame='border'><tr><th width='10%'>Улица</th><th width='10%'>Номер телефона</th><th width='10%'>Когда приехать</th><th width='auto'>Описание заявки</th></tr>";
    foreach($result as $row){
        echo "<tr>";
        echo "<td>" . $row["abonAdress"] . "</td>";
        echo "<td>" . $row["abonTel"] . "</td>";
        echo "<td>" . $row["days"] . "</td>";
        echo "<td class='appD' maxlength='30'>" . $row["AppDescription"] . "</td>";
        echo "</tr>";
    }
		echo "</table>";
		mysqli_free_result($result);
	}
?>
    </div>
</body>
</html>	