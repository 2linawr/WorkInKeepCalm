<?php 
include '../Connect/ConnectDB.php';

//Если JS у пользователя включен

	if($_POST['message'] != '' && $_POST['author'] != ''){ // Если поля не пустые
		$author = $_POST['author'];
        $message = $_POST['message'];
        $result = ("INSERT INTO `comments` (`Author`, `Comments`) VALUES ('$author', '$message')"); // Передаем в БД значения
		if(mysqli_query($link, $result)){
			echo 0; //Ваше сообшение успешно отправлено
		}else{
			echo 1; //Сообщение не отправлено. Ошибка базы данных
		}
	}else{
		echo 2; //Нельзя отправлять пустые сообщения
	}
?>