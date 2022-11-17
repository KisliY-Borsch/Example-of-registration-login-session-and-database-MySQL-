<?php 
	
	include ("bd.php"); //Подключаем БД

	if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {   //Если мы приняли куки от пользователя

	    $result = mysqli_query($con, "SELECT * FROM `Users` WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");	//Получаем все данные о нашем пользователе
	    $userdata = mysqli_fetch_assoc($result);	//Записываем все данные пользователя в массив


	    if(($userdata['userHash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id']) or (($userdata['userIP'] !== $_SERVER['REMOTE_ADDR']) and ($userdata['userIP'] !== "0"))) {	//Если хоть что-то не подходит - выдаем юзеру ошибку и кидаем на страницу авторизации

	        setcookie("id", "", time() - 3600*24*30*12, "/");

	        setcookie("hash", "", time() - 3600*24*30*12, "/");

	        print "Хм, что-то не получилось";

	    }
	}
	else{
	    header("Location: /login");
	}
?>