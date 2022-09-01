<?php 
    $_SESSION['login'] = "FALSE";
    ob_start();
    $new_url = '../Comments/comments.php';
    header('Location: '.$new_url);
    ob_end_flush();
?>