<?php
    if (isset($_POST['userName'])) { $Name = htmlspecialchars_decode(htmlentities(strip_tags(trim($_POST["userName"]))));}          //
    if (isset($_POST['userSurname'])) { $Surname = htmlspecialchars_decode(htmlentities(strip_tags(trim($_POST["userSurname"]))));} //
    if (isset($_POST['userEmail'])) { $Email = htmlspecialchars_decode(htmlentities(strip_tags(trim($_POST["userEmail"]))));}       // Добавляем переменные
    if (isset($_POST['userLogin'])) { $Login = htmlspecialchars_decode(htmlentities(strip_tags(trim($_POST["userLogin"]))));}       //
    if (isset($_POST['userPass'])) { $Password = htmlspecialchars_decode(htmlentities(strip_tags(trim($_POST["userPass"]))));}      //

    include ("bd.php");    //подключаемся к базе

    $verLog = mysqli_query($con, "SELECT `id` FROM `Users` WHERE Login='".$_POST['userLogin']."' ");//Проверяем Логин на уникальность
    $userID = mysqli_fetch_array($verLog);

    if (!empty($userID['id'])) {
        die("Пользователь с таким логином уже существует!");
    }
    else{
        $passwordHash = md5(md5($_POST['userPass']));   //шифруем пароль
        $result = mysqli_query ($con, "INSERT INTO `Users` (`Name`, `Surname`, `Email`, `Login`, `Password`,`Date`) VALUES ('".$Name."','".$Surname."','".$Email."','".$Login."','".$passwordHash."', NOW())"); // сохраняем данные
    }
    // Проверяем, есть ли ошибки при подключении
    if ($result) {
       header("Location: /login");
    }
    else {
        die("Что-то пошло не так(");
    }
?>              