<?php
    if (isset($_POST['userLogin'])) { $Login = htmlspecialchars_decode(htmlentities(strip_tags(trim($_POST["userLogin"]))));}   //Добавляем переменные
    if (isset($_POST['userPass'])) { $Password = htmlspecialchars_decode(htmlentities(strip_tags(trim($_POST["userPass"]))));}  //и сразу проверяем на скрипты и прочее

    include ("bd.php"); //Подключаемся к базе данных

    $loginCheck = mysqli_query ($con, "SELECT `id` FROM `Users` WHERE Login='".$_POST['userLogin']."' ");  //Проверяем существует ли логин, который ввел пользователь
    $loginID = mysqli_fetch_array($loginCheck);

    if (!empty($loginID['id'])) { //Если есть ID с таким логином, то...
        $passCheck = mysqli_query($con,"SELECT `id` FROM `Users` WHERE Password='".md5(md5($_POST['userPass']))."' ");    //Проверяем совпадение паролей, если логины совпали
        $passID = mysqli_fetch_array($passCheck);
    }  

    else{   
        die("Пользователя с таким логином не существует!"); //Если такого логина нет в базе
    }

    if(!empty($passID['id'])){  //Если есть ID с таким паролем, то работаем выдаем хэш сессии и работаем дальше
        function generateCode($length=6) { //Генератор рандомного хэша
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
            $code = "";
            $clen = strlen($chars) - 1;  
            while (strlen($code) < $length) {
                $code .= $chars[mt_rand(0,$clen)];  
            }
            return $code;
        }

        $ip = $_SERVER['REMOTE_ADDR'];  //Узнаем ip клиента
        $postIP = mysqli_query($con, "UPDATE `Users` SET userIP='".$ip."' WHERE Login='".$_POST['userLogin']."' "); // Сохраняем ip в базу
        
        $sessionHash = md5(generateCode(10)); //Создаем хэш сессии
        $postHash = mysqli_query ($con, "UPDATE `Users` SET userHash='".$sessionHash."' WHERE Login='".$_POST['userLogin']."' "); //Записываем хэш сессии в БД

        setcookie("id", $passID['id'], time()+60*60*24*30);     //Сохраняем куки ID пользователя
        setcookie("hash", $sessionHash, time()+60*60*24*30);    //Сохраняем куки хэша пользователя

        header("Location: /index"); //После выполнения кода редиректим человека на главную 
    }

    else{
        die("Вы ввели неправильный пароль"); //Пароль не подошел
    }

?>              