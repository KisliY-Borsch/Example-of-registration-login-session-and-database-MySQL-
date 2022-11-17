<?php 
	
	include ("bd.php"); //Подключаем БД

	if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {   //Если мы приняли куки от пользователя

	    $result = mysqli_query($con, "SELECT * FROM `Users` WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");
	    $userdata = mysqli_fetch_assoc($result);


	    if(($userdata['userHash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id']) or (($userdata['userIP'] !== $_SERVER['REMOTE_ADDR']) and ($userdata['userIP'] !== "0"))) {

	        setcookie("id", "", time() - 3600*24*30*12, "/");

	        setcookie("hash", "", time() - 3600*24*30*12, "/");

	        print "Хм, что-то не получилось";

	    }
	    else{
	        header("Location: /index");
	    }
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="Style/Images/favicon.ico" type="image/x-icon">
	<link href="Style/style.css" rel="stylesheet" type="text/css">
	<title>Вход в панель монтажника</title>
</head>
<body class="backlog">
	<div class="divLogForm">
		<form id="logForm" action="/log.php" method="POST">
			<table>
				<tr>
					<td><input id="login" type="text" name="userLogin" placeholder="Введите Ваш логин" required ></td>
				</tr>
				<tr>
					<td><input id="password1" type="password" name="userPass" placeholder="Введите Ваш пароль" required ></td>
				</tr>
				<tr>
					<td><input id="loginbtn" type="submit" value="Войти"></td>
				</tr>
				<tr>
					<td><a onclick='regShow()'>Еще не зарегистрированы?<br>Давайте исправим это!</a></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="divRegForm">
		<form id="regForm" action="/reg.php" method="POST">
			<table>
				<tr><td><a>Ваше имя:</a></td></tr>
				<tr>
					<td><input id="userNameReg" type="text" name="userName" placeholder="Гарри" required ></td>
				</tr>
				<tr><td><a>Ваша фамилия:</a></td></tr>
				<tr>
					<td><input id="userSurnameReg" type="text" name="userSurname" placeholder="Поттер" required ></td>
				</tr>
				<tr><td><a>Ваш имейл:</a></td></tr>
				<tr>
					<td><input id="userEmailReg" type="email" name="userEmail" placeholder="example@email.com" required ></td>
				</tr>
				<tr><td><a>Придумайте логин для входа:</a></td></tr>
				<tr>
					<td><input id="loginReg" type="text" name="userLogin" placeholder="AndreyBOBOyobo" required ></td>
				</tr>
				<tr><td><a>Придумайте пароль для входа:</a></td></tr>
				<tr>
					<td><input id="password1Reg" type="password" name="userPass" placeholder="*****" required ></td>
				</tr>
				<tr><td><a>Повторно введите пароль:</a></td></tr>
				<tr>
					<td><input id="password2Reg" type="password" name="userPass" placeholder="*****" required ><a class="checkText">Пароли не совпадают!</a></td>
				</tr>
				<tr>
					<td><input id="regbtn" type="submit" value="Зарегистрироваться"></td>
				</tr>
				<tr>
					<td><a class="alreadyReg" onclick="logShow()">Уже зарегистрированы?</a></td>
				</tr>
			</table>
		</form>
	</div>
	<script src="Style/script.js"></script>
</body>
</html>