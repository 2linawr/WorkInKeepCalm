<?php 
include '../Connect/ConnectDB.php';

//Если JS у пользователя включен

	if($_POST['login'] != '' && $_POST['password'] != ''){ // Если поля не пустые
		$author = $_POST['login'];
        $message = $_POST['password'];	
        
        $sql = "SELECT `login`FROM `users`WHERE `login` = '$author'";
        $res = mysqli_query($link,$sql);
        if(mysqli_num_rows($res) > 0){
            $err[] = 'К сожалению Логин: <b>'. $_POST['email'] .'</b> занят!';
        }
        else
        {
           /*Если все хорошо, пишем данные в базу*/
            $sql = "INSERT INTO `users`(`Login`,`Password`)VALUES('$author','$message')";
            $res = mysqli_query($link,$sql);
        }
    }
    else{
		echo 2; //Нельзя отправлять пустые сообщения
	}
   ob_start();
    $new_url = '../Vhod/vhod.php';
    header('Location: '.$new_url);
    ob_end_flush();
?>