<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title>Случайный цвет</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container" align="center">
    <br>
    <label>
        Ширина: <input type="text" class="inputWidth" id="inputWidth" placeholder="120"> px
    </label>
    <br><br>
    <label>
        Высота: <input type="text" class="inputHeight" id="inputHeight" placeholder="120"> px
    </label>
    <br><br>
    <button class="button">Случайный цвет</button>
    <hr>

    <div class="block" id="block"></div>
<!--    <div class="block" id="block" style="width: 150px"></div>-->

</div>

<script src="script.js"></script>

</body>
</html>