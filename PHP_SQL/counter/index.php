<?php
date_default_timezone_set('Europe/Moscow');

$file = file("count.txt");
$count = implode("", $file); // получаем значение
$count++;
$myfile = fopen("count.txt","w"); // открываем на запись
fputs($myfile,$count); // записываем
fclose($myfile); // закрываем
?>
<title>Счётчик хитов</title>
<span><i>Страница была загружена <?=$count?> раз. Текущее время <?=date('h:i');?></i></span>
