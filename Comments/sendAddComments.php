<?
include '../Connect/ConnectDB.php';

$result = mysqli_query($link,"SELECT * FROM comments"); /*Получаем все данные из таблицы*/
$comment = $result->fetch_assoc(); /* В результирующий массив */
echo $comment;
    ?>