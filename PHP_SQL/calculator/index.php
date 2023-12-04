<?php
const CACHE_PATH = __DIR__ . '/cache.json';
$time = time();

if (!file_exists(CACHE_PATH) || (filectime(CACHE_PATH) - $time + $time % 86400) < 0) {
    $jsonCities = file_get_contents('http://exercise.develop.maximaster.ru/service/city/');
    $buffer = fopen(CACHE_PATH, 'w');
    fputs($buffer, $jsonCities);
    $cities = json_decode($jsonCities);
} else $cities = json_decode(file_get_contents(CACHE_PATH));
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор доставки</title>
    <style>
        .OK {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
<div class="container" align="center">
    <form class="deliveryCalc" method="get" action="handler.php">
        <select class="citySelect" name="city">
            <?php foreach ($cities as $city) { ?>
                <option value="<?=$city?>"><?=$city?></option>
            <?php } ?>
        </select>
        <br><br>
        <input class="weightInput" type="text" name="weight" placeholder="Вес, кг" width="20000"/>
        <br><br>
        <button class="submitBtn" type="submit">Рассчитать</button>
    </form>
    <p class="result"></p>
</div>
<script src="script.js"></script>
</body>
</html>