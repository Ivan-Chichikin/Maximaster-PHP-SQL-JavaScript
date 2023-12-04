<?php
date_default_timezone_set('Europe/Moscow');

// запись в csv
if ($_POST['message'] != ""){
    if(isset($_POST['send'])){
        if ($_POST['name'] == "")
            $_POST["name"] = "Анонимно";
        $fp = fopen('gb.csv', 'a');
        $array = array(date('d.m.Y H:i'), $_POST['name'], $_POST['message']);
        fputcsv($fp, $array);
        fclose($fp);
    }
}

// чтение csv
$row = 1;
if (($handle = fopen("gb.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br>";
        }
        echo "<br>";
    }
    fclose($handle);
}

?>

<!doctype html>

<html Lang="en">
<html>
<head>
    <meta charset ="UTF-8">
    <title>Гостевая книга</title>
</head>
<body>
<form action="index.php" method="post">
    <p><input type="text" name="name" id="name" placeholder="Имя"></p>
    <p><textarea name="message" id="message" placeholder="Ваше сообщение"></textarea></p>
    <button type="submit" name="send"> Отправить </button>
</form>
</body>
</html>

