<meta charset="utf-8">
<?php
session_start();
 
include_once 'config.php';
include_once 'ConnectDb.php';
   if (file_exists ('install.php')){
      ob_start();
      $new_url = 'install.php';
      header('Location: '.$new_url);
      ob_end_flush();
      }
      else{
      ob_start();
      $new_url = 'Comments/comments.php';
      header('Location: '.$new_url);
      ob_end_flush();
      }
?>
