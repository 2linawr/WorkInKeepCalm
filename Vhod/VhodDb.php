<?php 
include '../Connect/ConnectDB.php';

//Если JS у пользователя включен

	if($_POST['login'] != '' && $_POST['password'] != ''){ // Если поля не пустые
		$author = $_POST['login'];
        $message = $_POST['password'];
        $sql = "SELECT `login`FROM `users` WHERE `login` = '$author' AND `password` = '$message'";
        $res = mysqli_query($link,$sql);
        if(mysqli_num_rows($res) > 0){
            $_SESSION['login'] = "TRUE";
        }
	}else{
		echo 2; //Нельзя отправлять пустые сообщения
	}
    ob_start();
    $new_url = '../Comments/comments.php';
    header('Location: '.$new_url);
    ob_end_flush();
?>