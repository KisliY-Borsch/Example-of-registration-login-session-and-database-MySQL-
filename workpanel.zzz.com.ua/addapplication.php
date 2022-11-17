<?php

    $abonAdress=$abonTel=$days=$AppDescription="";


//добавляем переменные
    if (isset($_POST['adress'])) { $abonAdress = htmlspecialchars_decode(htmlentities(strip_tags(trim($_POST["adress"])))); }
    if (isset($_POST['AppDescription'])) { $AppDescription = htmlspecialchars_decode(htmlentities(strip_tags(trim($_POST["AppDescription"])))); }
    if (isset($_POST['telNumb'])) { $abonTel=htmlspecialchars_decode(htmlentities(strip_tags(trim($_POST["telNumb"])))); }
    if (isset($_POST['daysForWork'])) { $days=htmlspecialchars_decode(htmlentities(strip_tags(trim($_POST["daysForWork"]))));}



// подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 
// сохраняем данные
    $result = mysqli_query ($con, "INSERT INTO `Applications` (`abonAdress`, `abonTel`, `days`, `AppDescription`) VALUES('".$abonAdress."', '".$abonTel."', '".$days."', '".$AppDescription."')");
    // Проверяем, есть ли ошибки
    if ($result) {
       header("Location: /addapl.php");
    }
    else {
        echo "Ошибка! Что-то не так!";
    }
    
//проверяем переменные на заполненность
//    if (empty($abonAdress) or empty($abonTel) or empty($AppDescription)) //если пользователь не ввел всю инфу, то выдаем ошибку и останавливаем скрипт
//    {
//    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
//   }
/*
            $sql="SELECT * FROM `ip_blocks` WHERE 1";
            $resg = mysqli_query($con, $sql);
            while ($rowvarg=$resg->fetch_assoc()) {
                $record_hash=$rowvarg["rec_id"];
                $block_name=$rowvarg["abonAdress"];
                $block_base=$rowvarg["abonTel"];
                $block_mask=$rowvarg["days"];
                //$prepare_arr[$record_hash]=array("type"=>"block","parent_hash"=>"root_entry", "block_name"=>$block_name,"block_base"=>$block_base);
                ;; your todo

            }


*/
//если данные введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
/*    $abonAdress = stripslashes($abonAdress);
    $abonAdress = htmlspecialchars($abonAdress);
    $abonTel = stripslashes($abonTel);
    $abonTel = htmlspecialchars($abonTel);
    $days = stripslashes($days);
    $days = htmlspecialchars($days);*/              

?>