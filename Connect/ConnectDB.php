<?
$file = new SplFileObject('../Connect/host.txt');
$file->seek(0);
$host = trim($file->current(), " \n.");
$file->seek(1);
$username = trim($file->current(), " \n.");
$file->seek(2);
$password = trim($file->current(), " \n.");


  $link = mysqli_connect($host, $username,$password, 'commentsV');
?>