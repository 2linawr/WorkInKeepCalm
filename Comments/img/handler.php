<?
$result = $mysqli->query("SELECT * FROM summ WHERE 1 LIMIT {$_POST['range']}");
while ($row = $result->fetch_assoc())
    $string .= $row['some_value'].'<br>';//формируем строку для вывода, лучше делать на стороне клиента
if($string)
    $range = (explode(',',$_POST['range'])[1] .',').(explode(',',$_POST['range'])[1]+10);//формируем новый диапазон
exit(json_encode(['rows' => $string, 'range' => $range]));//возвращаем данные?>